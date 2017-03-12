<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
    	if ($request->get('name') != '' &&
    		$request->get('price') != '' &&
    		$request->get('description') != '' &&
    		$request->get('category_id') != '' &&
            $request->get('product_img_url') != '' 
    	) {
    	
    	$category = Category::findOneById($request->get('category_id'));

    	if (! $category instanceof Category) {
    		return response()->json(['message' => 'Category not found'], 404);
    	}

		$product = Product::create([
			'name' => $request->get('name'), 
			'price' => $request->get('price'), 
			'description' => $request->get('description'),
			'discount' => $request->get('discount'), 
			'tax' => $request->get('tax'), 
			'category_id' => $request->get('category_id'),
		]);

    		return response()->json($product, 200);
    	}

    	return response()->json(['message' => 'Error Creating Product']);
    }

    public function updateProduct(Request $request, $id)
    {
    	if ($request->get('name') != '' &&
    		$request->get('price') != '' &&
    		$request->get('description') != '' &&
    		$request->get('category_id') != ''
    	) {
    		$product = Product::findOneById($id);

    		if ($product instanceof Product) {
    			$category = Category::findOneById($request->get('category_id'));

    			if (! $category instanceof Category) {
    				return response()->json(['message' => 'Category not found'], 404);
    			}

    			$product->update([
    				'name' => $request->get('name'),
					'price' => $request->get('price'),
					'description' => $request->get('description'),
					'discount' => $request->get('discount'),
					'tax' => $request->get('tax'),
					'category_id' => $request->get('category_id'),
    			]);

    			return response()->json($product, 200);
    		}

    		return response()->json(['message' => 'Product not found'], 404);
    	}

    	return response()->json(['message' => 'Error Updating Product'], 400);
    }

    public function getproducts()
    {
    	$products = Product::findAll();

    	if ($products->count() > 0) {
    		return response()->json($products, 200);
    	}

    	return response()->json(['message' => 'Products not found'], 404);
    }

    public function getproduct(Request $request, $id)
    {
    	$product = Product::findOneById($id);

    	if ($product instanceof Product) {
    		return response()->json($product, 200);
    	}

    	return response()->json(['message' => 'Product not found'], 404);
    }
}
