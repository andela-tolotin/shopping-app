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

        $userPointWallet = Auth::user()->pointWallet()->first();
        $userOrders     = Auth::user()->orders;
        $userOrdersCount = $userOrders->count();

        foreach ($userOrders as $key => $value) {
            $totalRatings += $value->ratings;
        }

        $averageRatings = $totalRatings/$userOrdersCount;
        if (!is_null($userPointWallet)) {
            $remainingPoints = $userPointWallet->point - $userPointWallet->balance;
        }
        
        $totalUnapprovedOrder = Order::where('status', 0)->count();
        $transaction = Transaction::get();

        foreach ($transaction as $key => $value) {
            $totalTransactionAmount += $value->item_price;
        }

        return view('dashboard.index', compact('averageRatings', 'userOrdersCount', 'remainingPoints', 'totalUnapprovedOrder', 'totalTransactionAmount'));
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();

    	return view('index', compact('products'));
    }
}
