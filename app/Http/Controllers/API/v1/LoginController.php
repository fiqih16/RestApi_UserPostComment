<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $email = $request->email;
        $password =$request->password;

        $user = User::where('email', $email)->first();
        if($user)

        {
            if(Hash::check($password, $user->password))
            {
                $user->api_token = Str::random(50);
                $user->save();

                return response(['token' => $user->api_token]);
            }
            return response(['error' => 'Password Salah'], 401);
        }
        else
        {
            return response(['error' => 'Email Tidak Terdaftar'],401);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response(['Success' => true]);
    }
}
