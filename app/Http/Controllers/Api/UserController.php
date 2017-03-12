<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
    	if (
    		$request->get('name') != '' &&
	    	$request->get('email') != '' &&
	    	$request->get('password') != '' &&
	    	$request->get('gender') != '' && 
	    	$request->get('phone') != '' && 
	    	$request->get('address') != '' &&
	    	$request->get('role_id') != ''
    	) {
    		$user = User::findOneByEmail($request->get('email'));

    	    if (! is_null($user)) {
    	    	return response()->json(['message' => 'email already exist'], 200);
    	    }

    	    $role = Role::findOneById($request->get('role_id'));

    	    if (! is_null($role)) {
    	    	return response()->json(['message' => 'Role ID not found'], 404);
    	    }

    	    $user = User::Create([
    	    	'name' => $request->get('name'),
    	    	'email' => $request->get('email'),
    	    	'password' => bcrypt($request->get('password')),
    	    	'gender' => $request->get('gender'),
    	    	'phone' => $request->get('phone'),
    	    	'address' => $request->get('address'),
    	    	'role_id' => $request->get('role_id'),
    	    ]);

    	    return response()->json($user->toArray(), 200);
    	}
    }

    public function getUsers()
    {
    	$users = User::findAll();

    	if (! is_null($users)) {
    		return response()->json($users->toArray(), 200);
    	}

    	return response()->json(['message' => 'Users not found'], 404);
    }

    public function getUser(Request $request, $id)
    {
    	$user = User::findOneById($id);

    	if (! is_null($user)) {
    		return response()->json($user->toArray(), 200);
    	}

    	return response()->json(['message' => 'User not found'], 404);
    }
}
