<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
    	return view('cart.checkout');
    }

    public function checkout(Request $request, $id)
    {
    	$product = Product::findOneById($id);

        if ($product instanceof Product) {
            return view('cart.checkout', compact('product'));
        }

        abort(404);
    }
}
