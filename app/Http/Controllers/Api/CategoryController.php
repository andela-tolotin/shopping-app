<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
    	if ($request->get('name') != '') {
    		$category = Category::create([
    			'name' => $request->get('name'),
    			'description' => $request->get('description'),
    		]);

    		return response()->json($category, 200);
    	}

    	return response()->json(['message' => 'Error Creating Category']);
    }

    public function updateCategory(Request $request, $id)
    {
    	if ($request->get('name') != '') {
    		$category = Category::findOneById($id);

    		if ($category instanceof Category) {
    			$category->update([
    				'name' => $request->get('name'),
    			]);

    			return response()->json($category, 200);
    		}

    		return response()->json(['message' => 'Category not found'], 404);
    	}

    	return response()->json(['message' => 'Error Creating Category'], 400);
    }

    public function getCategories()
    {
    	$categories = Category::findAll();

    	if ($categories->count() > 0) {
    		return response()->json($categories, 200);
    	}

    	return response()->json(['message' => 'Categories not found'], 404);
    }

    public function getCategory(Request $request, $id)
    {
    	$category = Category::findOneById($id);

    	if ($category instanceof Category) {
    		return response()->json($category, 200);
    	}

    	return response()->json(['message' => 'Category not found'], 404);
    }
}
