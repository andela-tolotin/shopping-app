<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function addPaymentConfig(Request $request)
    {

    }

    public function loadPaymentConfigForm()
    {
    	return view('dashboard.payment.add_payment');
    }
}
