<?php

namespace App\Http\Controllers;

use App;
use App\PointWallet;
use App\PaymentGateway;
use Illuminate\Http\Request;

class PointWalletController extends Controller
{
    public function loadPointAmountForm(Request $request)
    {
    	return view('dashboard.point.point_amount');
    }

    public function loadPointBag(Request $request)
    {
    	$point = 0;

    	if ($request->has('point')) {
    		$point = $request->get('point');
    	}

    	if (($point % 1) > 0) {
    		return redirect()
                ->route('load_buy_point')
                ->with('message', 'Enter your point in whole number e.g 1 or 2');
    	}

    	$paymentGateways = PaymentGateway::findAll();

        $amount = $point;

    	return view('dashboard.point.buy_point', compact('paymentGateways', 'amount'));
    }
}
