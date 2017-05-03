<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\Transaction;
use App\PointWallet;
use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * displays the statistics page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $remainingPoints = 0;
        $queueNo = 0;

        $userPointWallet = Auth::user()->pointWallet()->first();
        $userOrders = Auth::user()->orders;

        $unapprovedOrders = Order::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($unapprovedOrders as $index => $order) {
            if ($order->user_id == Auth::user()->id ) {
                $queueNo = $index + 1;
            }
        }

        $userOrdersCount = $userOrders->count();
        $good = [];
        $excellent = [];

        foreach ($userOrders as $key => $value) {
            if ($value->ratings === 1) {
                array_push($good, $value->ratings);
            }

            if ($value->ratings === 2) {
                array_push($excellent, $value->ratings);
            }
            
        }

        if (!is_null($userPointWallet)) {
            $remainingPoints = $userPointWallet->point - $userPointWallet->balance;
        }
        
        $totalUnapprovedOrder = Order::where('status', 0)->count();
        $totalTransactionAmount = Transaction::get()->count();

        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

        return view('dashboard.index', compact('good', 'excellent', 'userOrdersCount', 'remainingPoints', 'totalUnapprovedOrder', 'totalTransactionAmount', 'queueNo', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();
        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'desc');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'desc');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('index', compact('products', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }
}
