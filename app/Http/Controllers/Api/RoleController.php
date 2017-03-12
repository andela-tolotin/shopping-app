<?php

namespace App\Http\Controllers\Api;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function createRole(Request $request)
    {
    	if ($request->get('name') != '') {
    		$role = Role::create([
    			'name' => $request->get('name'),
    		]);

    		return response()->json($role, 200);
    	}

    	return response()->json(['message' => 'Error Creating Role']);
    }

    public function updateRole(Request $request, $id)
    {
    	if ($request->get('name') != '') {
    		$role = Role::findOneById($id);

    		if ($role instanceof Role) {
    			$role->update([
    				'name' => $request->get('name'),
    			]);

    			return response()->json($role, 200);
    		}

    		return response()->json(['message' => 'Role not found'], 404);
    	}

    	return response()->json(['message' => 'Error Creating Role'], 400);
    }

    public function getRoles()
    {
    	$roles = Role::findAll();

    	if ($roles->count() > 0) {
    		return response()->json($roles, 200);
    	}

    	return response()->json(['message' => 'Roles not found'], 404);
    }

    public function getRole(Request $request, $id)
    {
    	$role = Role::findOneById($id);

    	if ($role instanceof Role) {
    		return response()->json($role, 200);
    	}

    	return response()->json(['message' => 'Role not found'], 404);
    }
}
