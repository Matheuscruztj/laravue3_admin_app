<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return User::paginate();
    }

    public function show($id) {
        return User::find($id);
    }

    public function store(UserCreateRequest $request) {
        $user = User::create($request->only('first_name', 'last_name', 'email') + 
            ['password' => Hash::make('1234')]
        );
        
        return response($user, 201);
    }

    public function update($id, Request $request) {
        $user = User::find($id);

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response($user, Response::HTTP_ACCEPTED);
    }

    public function destroy($id) {
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function user() {
        return \Auth::user();
    }

    public function updateInfo(Request $request) {
        $user = \Auth::user();

        $user->update($request->only('first_name', 'last_name', 'email'));

        return response($user, Response::HTTP_ACCEPTED);
    }

    public function updatePassword(Request $request) {
        $user = \Auth::user();

        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return response($user, Response::HTTP_ACCEPTED);
    }
}
