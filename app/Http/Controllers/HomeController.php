<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\Transaction;
use App\PointWallet;
use App\Notification;
use App\ServiceManager;
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
        $good = [];
        $excellent = [];

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
        $userId = Auth::user()->id;

        $serviceManager = ServiceManager::where('user_id', $userId)->get();
        $unapprovedOrders = [];
        $totalUnapprovedOrder = 0;


        if ($serviceManager->count() > 0) {
            foreach ($serviceManager as $key => $value) {
                $unapproveOrders = Order::where([
                    ['status', 0], 
                    ['product_id', $value->product_id]
                ])->groupBy('id', 'created_at')
                ->orderBy('created_at', 'DESC')
                ->get();

                array_push($unapprovedOrders, $unapproveOrders);
            }

            foreach ($unapprovedOrders as $key => $value) {
                $totalUnapprovedOrder += count($value);
            }

        } else {
            $unapproveOrders = Order::Where([
                ['status', 0], 
                ['admin_id', Auth::user()->role_id]
            ])->groupBy('id', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->count();

            $totalUnapprovedOrder += $unapproveOrders;
        }

        $totalTransactionAmount = Transaction::get()->count();

        return view('dashboard.index', compact('good', 'excellent', 'userOrdersCount', 'remainingPoints', 'totalUnapprovedOrder', 'totalTransactionAmount', 'queueNo'));
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();

    	return view('index', compact('products'));
    }
}
