<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function add(RoleUserRequest $request,User $user)
    {
        $user->roles()->syncWithoutDetaching($request->only('role_id'));

        return (new UserResource($user));
    }

    public function destroy(RoleUserRequest $request, User $user)
    {
        $user->roles()->detach($request->only('role_id'));

        return (new UserResource($user));
    }
}
