<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\Transaction;
use App\PointWallet;
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
        $totalRatings = 0;
        $remainingPoints = 0;
        $totalTransactionAmount = 0;
        $averageRatings = 0;
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

        foreach ($userOrders as $key => $value) {
            $totalRatings += $value->ratings;
        }

        if ($totalRatings > 0 && $userOrdersCount > 0) {
            $averageRatings = $totalRatings / $userOrdersCount;
        }

        if (!is_null($userPointWallet)) {
            $remainingPoints = $userPointWallet->point - $userPointWallet->balance;
        }
        
        $totalUnapprovedOrder = Order::where('status', 0)->count();
        $transaction = Transaction::get();

        foreach ($transaction as $key => $value) {
            $totalTransactionAmount += $value->item_price;
        }

        return view('dashboard.index', compact('averageRatings', 'userOrdersCount', 'remainingPoints', 'totalUnapprovedOrder', 'totalTransactionAmount', 'queueNo'));
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();

    	return view('index', compact('products'));
    }
}
