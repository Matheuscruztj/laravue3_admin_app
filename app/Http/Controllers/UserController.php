<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Exception;
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
        try{
            $user = User::create($request->only('first_name', 'last_name', 'email') + [
                'password' => Hash::make('1234')
            ]);
            
            return response($user, 201);
        }catch(Exception $e) {
            dd($e);
        }
    }

    public function update($id, Request $request) {
        try{
            $user = User::find($id);
    
            $user->update($request->only('first_name', 'last_name', 'email'));

            return response($user, Response::HTTP_ACCEPTED);
        }catch(Exception $e) {
            dd($e);
        }
    }

    public function destroy($id) {
        User::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
