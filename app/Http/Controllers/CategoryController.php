<?php

namespace App\Http\Controllers;

use App;
use Auth;
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
        return view('dashboard.category.form', compact('paymentGateways', 'amount'));
    }

    /**
     * Save category to db
     *
     * @param CategoryRequest $request
     */
    public function postCategory(CategoryRequest $request)
    {
        $locale = App::getLocale();

        $category = Category::create([
            'name'        => $request['name'],
            'description' => $request['description'],
            'user_id'     => Auth::user()->id,
        ]);

        if ($category) {
            return redirect()->route('list_categories', ['locale' => $locale]);
        }

        return redirect()->back();
    }

    /**
     * List all categories created by the user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCategories()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(10);

        return view('dashboard.category.show_categories', compact('categories', 'paymentGateways', 'amount'));
    }

    /**
     * display category edit form created by the user
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editCategoryForm(Request $request, $id)
    {
        $category = Auth::user()->categories->find($id);

        if (is_null($category)) {
            abort(400);
        }

        return view('dashboard.category.edit_form', compact('category', 'paymentGateways', 'amount'));
    }

    /**
     * Update category created by the user
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories,name,'.$request->id,
        ]);

        $category = Category::where('id', $request->id)->update([
            'name'            => $request->name,
            'description'     => $request->description,
        ]);

        if ($category) {
            return redirect()->route('list_categories');
        }

        return redirect()->back();
    }

    /**
     * Delete category created by the user
     *
     * @param $id
     * @return mixed
     */
    public function deleteCategory(Request $request, $id)
    {
        $category = Auth::user()->categories->find($id);

        if (is_null($category)) {
            return redirect()->back();
        }

        $categoryDelete = $category->delete();

        if ($categoryDelete) {
            // code to inform user that it was succesfully
            return redirect()->route('list_categories');
        } else {
            // code to user that something went wrong

            return redirect()->route('home');
        }
    }
}
