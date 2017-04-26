<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use App\Notification;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display the view for the stock base on passed query
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stock(Request $request)
	{
		if (is_null($request->from) || empty($request->from)) {
			$this->resetOrderStatus();

			return $this->loadStockWithoutQuery();
    	}
    	
        return $this->loadStockWithQuery($request);
    }

    /**
     * Rest order_status in the Transaction table and increment
     * it for where status in Order table equals one
     *
     * @return void
     */
    public function resetOrderStatus()
    {
    	$approvedOrder = Order::where('status', 1)->get();
		$transaction   = Transaction::get();

		foreach ($transaction as $key => $value) {
			$value->order_status = 0;
			$value->save();
		}

		foreach ($approvedOrder as $key => $value) {

			$transaction = Transaction::where('id', $value->transaction_id)->get();
			foreach ($transaction as $k => $v) {
					$v->increment('order_status');
			}
		}
    }

    /**
     * Load stock when query is not passed
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStockWithoutQuery()
    {
    	$approvedTransactions = Transaction::where('order_status', 1)
           ->orderBy('created_at', 'DESC')
           ->paginate(10);

		$approvedTransactionsTotal = 0;

		foreach ($approvedTransactions as $key => $value) {
            $approvedTransactionsTotal += $value->item_price;
        }

        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

	    return view('dashboard.transaction.stock',
            compact('approvedTransactions', 'approvedTransactionsTotal', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount')
        );
    }

    /**
     * load stock when query is passed
     *
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadStockWithQuery($request)
    {
    	$approvedTransactions = Transaction::whereBetween('created_at', [
            $request->from, $request->to
        ])->where('order_status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
		
        $approvedTransactionsTotal = 0;

		foreach ($approvedTransactions as $key => $value) {
            $approvedTransactionsTotal += $value->item_price;
        }

        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

		return view('dashboard.transaction.stock', 
            compact('approvedTransactions', 'approvedTransactionsTotal', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount')
        );
    }
}
