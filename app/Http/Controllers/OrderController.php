<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Order;
use Exception;
use Carbon\Carbon;
use App\Notification;
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
        // $order = order::
        $unapprovedOrders = Order::where('status', 0)->orderBy('created_at', 'DESC')->get();
        $approvedOrders   = Order::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

        return view('dashboard.order.show_orders', compact('approvedOrders', 'unapprovedOrders', 'paymentGateways', 'amount', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
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

        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

        return view('dashboard.order.show_user_orders', compact('orders', 'orderTotal', 'approvedOrders', 'unapprovedOrders', 'paymentGateways', 'amount', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
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
     * Log notification
     *
     * @return bolean
     */
    protected function logNotification()
    {
        return Notification::create([
                'user_id' => Auth::user()->id ?? null,
                'message' => "Your order have been approved",
                'status' => 1,
                'action' => 'Approve Order',
                'date_created' => Carbon::now(),
                'url' => "/en/home",
            ]);
    }

    /**
     * decrement status to 0
     *
     * @return bolean
     */
    protected function decrementMadeOrderStatus()

    {
        $notification = Notification::where('user_id', Auth::user()->id)->orWhere([['status', 1], ['action', 'Made Order']]);

        $notification->decrement('status');
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

            // Log the notification in the notification table
            $this->logNotification();
            $this->decrementMadeOrderStatus();

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
                $message->from(env('SENDER_ADDRESS'), env('SENDER_NAME'));
                $message->to($transaction['email'])->subject('Your Order has been approved');
            });
            
            return 'Email sent succesfully to user';
        } catch (\Exception $e) {
            return 'Failure ' . $e->getMessage();
        }
    }

    public function orderRating(Request $request)
    {
        $order = Order::find($request->id);

        $order->ratings = $request->ratings;
        $order->save();

        return response()->json(['message' => 'Succesfully updated', 'status' => 201]);
    }
}
