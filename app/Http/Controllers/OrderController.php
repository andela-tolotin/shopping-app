<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer as Mail;
use App\Http\Requests\ProductRequest;

class OrderController extends Controller
{
    protected $mail;

    public function __construct(Mail $mail) 
    {
        $this->mail = $mail;
    }
    /**
     * List all Orders made by all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listOrders()
    {
        $unapprovedOrders = Order::where('status', 0)->orderBy('created_at', 'DESC')->get();
        $approvedOrders   = Order::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
       
        return view('dashboard.order.show_orders', compact('approvedOrders', 'unapprovedOrders'));
    }

    /**
     * List all Orders made by current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCurrentUserOrders()
    {
        $orders   = Auth::user()->orders()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $orderTotal = 0;

        foreach ($orders as $key => $value) {
            $orderTotal += $value->transaction->item_price;
        }

        return view('dashboard.order.show_user_orders', compact('orders', 'orderTotal'));
    }

    /**
     * Delete order
     *
     * @param $id
     *
     * @return mixed
     */
    public function deleteOrder(Request $request, $locale, $id)
    {
    	$order = Order::find($id);	
        $deleteOrder = $order->delete();

        if ($deleteOrder) {
            // code to inform user that it was succesfully
            return redirect()->route('list_orders', ['locale' => $locale]);
        }
        // code to user that something went wrong
        return redirect()->route('list_orders', ['locale' => $locale]);
        
    }

    /**
     * Approve/Dissaprove order
     *
     * @param $id
     *
     * @return mixed
     */
    public function approveOrder(Request $request, $locale, $id)
    {
    	$order = Order::find($id);

    	if ($order->status === 0) {
        	$order->increment('status');

            $response = $this->mail($order);

        	return redirect()->route('list_orders', ['locale' => $locale])
                ->with('message', $response);
    	} else {
    		$order->decrement('status');

    		return redirect()->route('list_orders', ['locale' => $locale]);
    	}
    }

    protected function mail($order)
    {
        $transaction = $order->transaction()->first()->toArray();

        try {
            $this->mail->send('emails.mailEvent', $transaction, function($message) use ($transaction) {
                $message->from( getenv('SENDER_ADDRESS'), getenv('SENDER_NAME'));
                $message->to($transaction['email'])->subject('Your Order has been approved');
            });
            
            return 'Email sent succesfully to user';
        } catch (\Exception $e) {
            return 'Failure ' . $e->getMessage();
        }
        
    }
}
