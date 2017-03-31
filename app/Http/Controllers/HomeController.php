<?php

namespace App\Http\Controllers;

use App\Product;
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
        return view('dashboard.index');
    }

    public function listProducts(Request $request)
    {
    	$products = Product::findAll();

    	return view('index', compact('products'));
    }
}
