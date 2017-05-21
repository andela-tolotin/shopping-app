<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\User;
use App\Role;
use Exception;
use App\Product;
use App\ServiceManager;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
	const ISADMIN = 'ADMIN';

    public function listUsers()
    {
    	$users = User::orderBy('id', 'DESC')
    	   ->paginate(10);

    	return view('dashboard.manage_user.list_users', compact('users'));
    }

    public function editUser(Request $request, $id) 
    {
    	$authenticatedUser = Auth::user()->role->name;

    	$user = User::findOneById($id);
    	$userRoles = Role::findAll();
        $products = Product::get();

		if ($user instanceof User) {
			return view('dashboard.manage_user.edit_user', compact('user', 'products', 'userRoles'));
		}
		
		abort(404);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		$user->phone = $request->phone;
    		$user->gender = $request->gender;
    		$user->name = $request->name;
    		$user->role_id = $request->role;
    		$user->status = $request->status;
    		$user->save();

            if  (!empty($request['product'])) {
                ServiceManager::firstOrCreate([
                    'user_id'    => $id,
                    'product_id' => $request['product'],
                ]);
            }

            return redirect()->route('manage_user');
    	}

    	abort(404);
    }

    public function deleteUser(Request $request, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		$user->forceDelete();

    		return redirect()->route('manage_user');
    	}

    	abort(404);
    }
}
