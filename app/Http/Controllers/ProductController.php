<?php

namespace App\Http\Controllers;

use Auth;
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
        return view('dashboard.product.form', compact('categories'));
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
            'user_id'         => auth()->user()->id,
            'price'           => $request['price'],
            'discount'        => $request['discount'],
            'tax'             => $request['tax'],
            'product_img_url' => $request['photo'] == '' ? '': $this->uploadProductImage($request),
        ]);

        if ($product) {
            return redirect()->route('list_products');
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

        return  Cloudder::getResult()['url'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listProducts()
    {
        $products = Auth::user()->products()->paginate(10);

        return view('dashboard.product.show_products', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editProductForm($id)
    {
        $product      = Auth::user()->products->find($id);
        $categories = Category::all();

        if (is_null($product)) {
            return redirect()->route('home');
        }

        return view('dashboard.product.edit_form', compact('product', 'categories'));
    }

    /**
     * @param $id
     * @param ProductRequest $request
     * @return mixed
     */
    public function updateProduct($id, ProductRequest $request)
    {
        $product = Product::where('id', $request->id)->update([
            'name'            => $request->name,
            'description'     => $request->description,
            'category_id'     => $request->category,
            'price'           => $request->price,
            'discount'        => $request->discount,
            'tax'             => $request->tax,
        ]);

        if (!is_null($request->photo)) {
            $product_img_url = $this->uploadProductImage($request);
            $product = Product::find($id);

            $product->product_img_url = $product_img_url;
            $product->save();
        }

        if ($product) {
            return redirect()->route('list_products');
        }

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $product = Auth::user()->products->find($id);

        if (is_null($product)) {
            return redirect()->back();
        }

        $productDelete = $product->delete();

        if ($productDelete) {
            // code to inform user that it was succesfully
            return redirect()->route('list_products');
        } else {
            // code to user that something went wrong

            return redirect()->route('home');
        }
    }
}
