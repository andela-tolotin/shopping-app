<?php

namespace App\Http\Controllers\Api;

use Hash;
use Auth;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->has('username') && $request->has('password')) {
            $user = User::findOneByEmail($request->username);

            if ($user instanceOf User) {
                if (Hash::check($request->password, $user->password)) {
                    return response()->json([
                        'message' => 'Login Successful!',
                        'data' => $user,
                    ], 200);
                }
            }

            return response()->json(['message' => 'Login Failed!'], 400);
        }

        return response()->json(['message' => 'username or password field is missing']);
    }

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

    	    if ($user instanceof User) {
    	    	return response()->json(['message' => 'email already exist'], 200);
    	    }

    	    $role = Role::findOneById($request->get('role_id'));

    	    if (! $role instanceof Role) {
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

    	return response()->json(['message' => 'Error creating user'], 400);
    }

    public function updateUser(Request $request, $id)
    {
    	$user = User::findOneById($id);

    	if (! $user instanceof User) {
    		return response()->json(['message' => 'User not found'], 404);
    	}

    	$email = User::findOneByEmail($request->get('email'));

    	if ($email instanceof User) {
    		return response()->json(['message' => 'Email already exists'], 404);
    	}

    	$phone = User::findOneByPhone($request->get('phone'));

    	if ($phone instanceof User) {
    		return response()->json(['message' => 'Phone already exists'], 404);
    	}

    	if (
    		$request->get('name') != '' &&
	    	$request->get('email') != '' &&
	    	$request->get('gender') != '' && 
	    	$request->get('phone') != '' && 
	    	$request->get('address') != ''
    	) {
    	    $role = Role::findOneById($request->get('role_id'));

    	    if (! $role instanceof Role) {
    	    	return response()->json(['message' => 'Role ID not found'], 404);
    	    }

	    	$user->update([
	    		'name' => $request->get('name'),
    	    	'email' => $request->get('email'),
    	    	'gender' => $request->get('gender'),
    	    	'phone' => $request->get('phone'),
    	    	'address' => $request->get('address'),
	    	]);

    	    return response()->json($user->toArray(), 200);
    	}
    	return response()->json(['message' => 'Error updating user'], 400);
    }

    public function getUsers()
    {
    	$users = User::findAll();

    	if ($users->count() > 0) {
    		return response()->json($users->toArray(), 200);
    	}

    	return response()->json(['message' => 'Users not found'], 404);
    }

    public function getUser(Request $request, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		return response()->json($user->toArray(), 200);
    	}

    	return response()->json(['message' => 'User not found'], 404);
    }

    public function getUserTransactions(Request $request, $id)
    {
    	$user = User::findOneById($id);

    	if ($user instanceof User) {
    		return response()->json($user->transactions->toArray(), 200);
    	}

    	return response()->json(['message' => 'User not found'], 404);
    }
}
