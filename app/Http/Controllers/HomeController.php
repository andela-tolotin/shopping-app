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
        $userPointWallet = Auth::user()->pointWallet()->first();
        $userOrders      = Auth::user()->orders->count();
        $remainingPoints = $userPointWallet->point - $userPointWallet->balance;
        $totalUnapprovedOrder = Order::where('status', 0)->count();
        $transaction = Transaction::get();
        $totalTransactionAmount = 0;

        foreach ($transaction as $key => $value) {
            $totalTransactionAmount += $value->item_price;
        }

        return view('dashboard.index', compact('userOrders', 'remainingPoints', 'totalUnapprovedOrder', 'totalTransactionAmount'));
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();

    	return view('index', compact('products'));
    }
}
