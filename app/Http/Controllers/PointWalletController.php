<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PointWallet;
use App\PaymentGateway;

class PointWalletController extends Controller
{
    public function loadPointBag()
    {
    	$paymentGateways = PaymentGateway::findAll();

    	return view('dashboard.point.buy_point', compact('paymentGateways'));
    }
}
