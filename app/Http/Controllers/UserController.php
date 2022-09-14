<?php

namespace App\Http\Controllers;

use App\Events\UserAdded;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->paginate(10);

        return UserResource::collection($users);
    }



    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only([
            'name',
            'email'
        ]));


        return (new UserResource($user));
    }

    public function show(User $user)
    {
        return (new UserResource($user));
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->only(['name','email']));

        return (new UserResource($user));
    }


    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'resource deleted successfully'
        ]);
    }

}
