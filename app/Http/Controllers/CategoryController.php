<?php

namespace App\Http\Controllers;

use App\User;
use Cloudder;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Displays category form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategoryForm()
    {
        return view('dashboard.category.form');
    }

    /**
     * Save category to db
     *
     * @param CategoryRequest $request
     */
    public function postCategory(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        if ($category) {
            return redirect('/');
        }

        return redirect()->back();
    }
}
