<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers()
    {
    	$users = User::orderBy('id', 'DESC')
    	   ->paginate(20);

    	return view('dashboard.manage_user.list_users', compact('users'));
    }
}
