<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Exception;
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

    public function editUser(Request $request, $id) 
    {
    	$authenticatedUser = Auth::user()->role->name;

    	$user = User::findOneById($id);
    	$userRoles = Role::findAll();

		if ($user instanceof User) {
			return view('dashboard.manage_user.edit_user', compact('user', 'userRoles'));
		} else {
			throw new Exception('User with this id not found');
		}
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
    	$user = User::findOneById($id);
    	$role = Role::findOneById($request->role);

    	if (!$role instanceof Role) {
    		return redirect('home')
                ->withErrors(['Bo'])
                ->withInput();
    	}
    }
}
