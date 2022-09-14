<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);

        return RoleResource::collection($roles);
    }
    public function store(RoleCreateRequest $request)
    {
        $role = Role::create($request->only([
            'name'
        ]));

        return (new RoleResource($role));
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'resource deleted successfully'
        ]);
    }
}
