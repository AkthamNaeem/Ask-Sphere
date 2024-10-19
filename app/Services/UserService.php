<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function register($request) {
        $user = User::query()->create([
           'name' => $request['name'],
           'email' => $request['email'],
           'password' => bcrypt($request['password']),
           'photo' => HelperService::get_photo_path($request, 'users'),
        ]);

        $data = $user;
        $data['token'] = $user->createToken("token")->plainTextToken;
        $message = 'success';
        $code = 201;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

    public function login($request) {
        $data = [];
        $user = User::query()->where('email', '=', $request['email'])->first();

        if(!(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))) {
            return ['data' => $data, 'message' => 'Incorrect password. Please try again', 'code' => 401];
        }

        $data = $user;
        $data['token'] = $user->createToken("token")->plainTextToken;
        $message = 'success';
        $code = 200;
        return ['data' => $data, 'message' => $message, 'code' => $code];
    }

}
