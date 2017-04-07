<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PointWallet;
use App\PaymentGateway;

class PointWalletController extends Controller
{
    public function loadPointAmountForm(Request $request)
    {
    	return view('dashboard.point.point_amount');
    }

    public function loadPointBag(Request $request)
    {
    	$amount = 0;

    	if ($request->has('amount')) {
    		$amount = $request->get('amount');
    	}

    	if ($amount < 1000) {
    		return redirect()->route('load_buy_point');
    	}

    	$paymentGateways = PaymentGateway::findAll();

    	return view('dashboard.point.buy_point', compact('paymentGateways', 'amount'));
    }
}
