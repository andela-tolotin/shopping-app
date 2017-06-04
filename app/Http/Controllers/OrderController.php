<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Order;
use App\PointWallet;
use Exception;
use Carbon\Carbon;
use App\Notification;
use App\ServiceManager;
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

    public function viewWaitingList()
    {
        $queueNo = 0;
        $waiters = [];

        $unapprovedOrders = Order::where('status', 0)
            ->orderBy('created_at', 'ASC')
            ->get();

        foreach ($unapprovedOrders as $index => $order) {
            $queueNo = $index + 1;
            
            $name = is_null($order->user) ? 'Guest' : $order->user->name;

            if (!is_null($order->user)) {
                if ($order->user->name == Auth::user()->name) {
                    $name = 'You ('.$order->user->name.')';
                }
            }

            array_push($waiters, [
                'user' => $name,
                'queue_no' => $queueNo
            ]);
        }

        return view('dashboard.waiting_lists.waiters', compact('waiters'));
    }

    /**
     * List all Orders made by all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listOrders()
    {
        $userId = Auth::user()->id;
        $adminId = Auth::user()->role_id;
        $unapprovedOrders = [];
        $approvedOrders = [];
        $serviceManager = ServiceManager::where('user_id', $userId)->get();

        if ($serviceManager->count() > 0) {
            foreach ($serviceManager as $key => $value) {
                $unapproveOrders = Order::where([
                    ['status', 0], 
                    ['product_id', $value->product_id]
                ])->orWhere([
                    ['status', 0], 
                    ['admin_id', $adminId]
                ])->groupBy('id', 'created_at')
                ->orderBy('created_at', 'ASC')
                ->get();

                $approveOrders = Order::where([
                    ['status', 1], 
                    ['product_id', $value->product_id]
                ])->orWhere([
                    ['status', 1], 
                    ['admin_id', $adminId]
                ])->groupBy('id', 'created_at')
                ->orderBy('created_at', 'ASC')
                ->paginate(10);

                array_push($unapprovedOrders, $unapproveOrders);
                array_push($approvedOrders, $approveOrders);
            }
        }

        $unapproveOrders = Order::Where([
            ['status', 0], 
            ['admin_id', $adminId]
        ])->groupBy('id', 'created_at')
        ->orderBy('created_at', 'ASC')
        ->get();

        $approveOrders = Order::Where([
            ['status', 1], 
            ['admin_id', $adminId]
        ])->groupBy('id', 'created_at')
        ->orderBy('created_at', 'ASC')
        ->paginate(10);

        array_push($unapprovedOrders, $unapproveOrders);
        array_push($approvedOrders, $approveOrders);

        return view('dashboard.order.show_orders', compact('approvedOrders', 'unapprovedOrders', 'paymentGateways', 'amount'));
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

        return view('dashboard.order.show_user_orders', compact('orders', 'orderTotal', 'approvedOrders', 'unapprovedOrders', 'paymentGateways', 'amount'));
    }

    /**
     * Delete order
     *
     * @param $id
     *
     * @return mixed
     */
    public function deleteOrder(Request $request, $id)
    {
    	$order = Order::find($id);	
        $deleteOrder = $order->delete();

        if ($deleteOrder) {
            // code to inform user that it was succesfully
            return redirect()->route('list_orders');
        }
        // code to user that something went wrong
        return redirect()->route('list_orders');
        
    }

    /**
     * Log notification
     *
     * @return bolean
     */
    protected function logNotification($userId, $productId)
    {
        return Notification::create([
                'user_id' => $userId ?? null,
                'message' => "Your order have been approved",
                'status' => 1,
                'product_id' => $productId,
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
        $notification = Notification::where('user_id', Auth::user()->id)
            ->orWhere([
                ['status', 1], 
                ['action', 'Made Order']
            ]);

        $notification->decrement('status');
    }

    /**
     * Approve/Dissaprove order
     *
     * @param $id
     *
     * @return mixed
     */
    public function approveOrder(Request $request, $id)
    {
    	$order = Order::find($id);

    	if ($order->status === 0) {
        	$order->increment('status');

            $response = $this->mail($order);
            $userId = $order->user_id;
            $productId = $order->product_id;
            // Log the notification in the notification table
            $this->logNotification($userId, $productId);
            $this->decrementMadeOrderStatus();

            // deduct money from point wallet
            $transactions = array_pluck($order->user->transactions, 'item_price');
            $totalTransactions = (int) array_sum($transactions);
            // find the point wallet and update the balance
            $pWallet = PointWallet::findOneByUser($order->user->id);
            $pWallet->balance = $totalTransactions;
            $pWallet->save();
            // Save the status to 1
            $order->status = 1;
            $order->save();
            // activate the transaction status
            $transaction = $order->transaction;
            $transaction->status = 1;
            $transaction->save();

        	return redirect()->route('list_orders')
                ->with('message', $response);
    	} else {
    		$order->decrement('status');

    		return redirect()->route('list_orders');
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
