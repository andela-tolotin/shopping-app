<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\User;
use App\Role;
use Exception;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
	const ISADMIN = 'ADMIN';

    public function listUsers()
    {
    	$users = User::orderBy('id', 'DESC')
    	   ->paginate(10);

    	return view('dashboard.manage_user.list_users', compact('users'));
    }

    public function editUser(Request $request, $locale, $id) 
    {
    	$authenticatedUser = Auth::user()->role->name;

    	$user = User::findOneById($id);
    	$userRoles = Role::findAll();

		if ($user instanceof User) {
			return view('dashboard.manage_user.edit_user', compact('user', 'userRoles'));
		}
		
		abort(404);
    }

    public function updateUser(UpdateUserRequest $request, $locale, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		$user->phone = $request->phone;
    		$user->gender = $request->gender;
    		$user->name = $request->name;
    		$user->role_id = $request->role;
    		$user->status = $request->status;

    		$user->save();

    		return redirect()->route('manage_user', ['locale' => $locale]);
    	}

    	abort(404);
    }

    public function deleteUser(Request $request, $locale, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		$user->forceDelete();

    		return redirect()->route('manage_user', ['locale' => $locale]);
    	}

    	abort(404);
    }
}
