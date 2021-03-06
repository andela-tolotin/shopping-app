<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Cloudder;
use App\User;
use Exception;
use App\Advert;
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
        $assignees = User::where('role_id', 2)->get();

        return view('dashboard.product.form', compact('categories', 'assignees', 'paymentGateways', 'amount'));
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
            'user_id'         => Auth::user()->id,
            'price'           => $request['price'],
            'discount'        => $request['discount'],
            'tax'             => $request['tax'],
            'product_img_url' => $this->uploadProductImage($request),
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
        $cloudinaryWrapper = [];
        $urls = [];

        foreach ($request['images'] as $key => $image) {
            $result = Cloudder::upload($image, null, [
                'format' => 'jpg',
                'crop'   => 'fill',
                'width'  => 500,
                'height' => 500,
            ]);

            array_push($cloudinaryWrapper, $result);
        }

        foreach ($cloudinaryWrapper as $key => $value) {
            array_push($urls, $value->getResult()['url']);
        }

        return json_encode($urls);
    }

    /**
     * List all products created by the user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listProducts()
    {
        $products = Product::orderBy('name', 'DESC')->paginate(10);

        return view('dashboard.product.show_products', compact('products', 'paymentGateways', 'amount'));
    }

    /**
     * display product edit form created by the user
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editProductForm(Request $request, $id)
    {
        $product = Auth::user()->products->find($id);
        $assignees = User::where('role_id', 2)->get();

        if (is_null($product)) {

            abort(404);
        }

        $productImage = json_decode($product->product_img_url);
        $categories   = Category::all();

        return view('dashboard.product.edit_form', compact('product', 'categories', 'productImage', 'assignees', 'paymentGateways', 'amount'));
    }

    /**
     * Update product created by the user
     *
     * @param $id
     * @param ProductRequest $request
     * @return mixed
     */
    public function updateProduct(ProductRequest $request, $id)
    {
        $product = Product::where('id', $request->id)->update([
            'name'        => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'price'       => $request->price,
            'discount'    => $request->discount,
            'tax'         => $request->tax,
        ]);

        if (!is_null($request->images)) {
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

    /**
     * Delete product created by the user
     *
     * @param $id
     * @return mixed
     */
    public function deleteProduct(Request $request, $id)
    {
        $product = Auth::user()->products->find($id);

        if (is_null($product)) {
            return redirect()->back();
        }

        $productDelete = $product->delete();

        if ($productDelete) {
            // code to inform user that it was succesfully
            return redirect()->route('list_products');
        }
        // code to user that something went wrong
        return redirect()->route('home');
    }

    /**
     * View product created by the user
     *
     * @param $id
     * @param $request
     *
     * @return mixed
     */
    public function viewProduct(Request $request, $id)
    {
        $unapprovedOrders = null;

        $product = Product::findOneById($id);
        $productAdvert = Advert::withProduct($product->id);

        // get the orders and queue no
        
        if (!is_null($product->orders)) {
            $unapprovedOrders = $product->orders->where('status', 0);
        }

        if ($product instanceof Product) {
            return view('dashboard.product.product_detail', compact('product', 'productAdvert', 'unapprovedOrders'));
        }

        abort(404);
    }
}
