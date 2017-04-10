<?php

namespace App\Http\Controllers;

use App\Product;
use App\PaymentGateway;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
    	return view('cart.checkout');
    }

    public function checkout(Request $request, $locale, $id)
    {
    	$product = Product::findOneById($id);
        $paymentGateways = PaymentGateway::findAll();

        if ($product instanceof Product) {
            return view('cart.checkout', compact('product', 'paymentGateways'));
        }

        abort(404);
    }
}
