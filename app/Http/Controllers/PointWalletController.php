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
        $locale = App::getLocale();

    	$amount = 0;

    	if ($request->has('amount')) {
    		$amount = $request->get('amount');
    	}

    	if (($amount % 1000) > 0) {
    		return redirect()
            ->route('load_buy_point', ['locale' => $locale])
            ->with('message', 'Enter your amount in thousands e.g 1000');
    	}

    	$paymentGateways = PaymentGateway::findAll();

    	return view('dashboard.point.buy_point', compact('paymentGateways', 'amount'));
    }
}
