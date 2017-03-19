<?php

namespace App\Http\Controllers;

use Cloudder;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Displays product form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProductForm()
    {
        $categories = Category::all();
        return view('product.form', compact('categories'));
    }

    /**
     * Add product to db
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postProduct(ProductRequest $request)
    {
        $product = Product::create([
            'name'            => $request['name'],
            'description'     => $request['description'],
            'category_id'     => $request['category'],
            'price'           => $request['price'],
            'discount'        => $request['discount'],
            'tax'             => $request['tax'],
            'product_img_url' => $request['photo'] == '' ? '': $this->uploadProductImage($request),
        ]);

        if ($product) {
            return redirect('/');
        }

        return redirect()->back();
    }

    /**
     * Upload product image to cloudinary
     *
     * @param $request
     * @return mixed
     */
    public function uploadProductImage($request)
    {
        $productImage = $request->file('photo');
        
        Cloudder::upload($productImage, null, [
            'format' => 'jpg',
            'crop'   => 'fill',
            'width'  => 250,
            'height' => 250,
        ]);

        return  Cloudder::getResult()['product_img_url'];
    }
}
