<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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

    	if ($authenticatedUser == self::ISADMIN) {
    		if ($user instanceof User) {
    			return view('dashboard.manage_user.edit_user', compact('user'));
    		} else {
    			throw new Exception('User with this id not found');
    		}
    	}

    	abort(401);
    }
}
