<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $detail = $user->userDetail;
        return response(['user' => $user]);
    }

    public function store(Request $request)
    {
        $userId = $request->user()->id;

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed'
        // ]);
        $detail = new UserDetail;
        $detail ->address = $request->address;
        $detail ->phone = $request->phone;
        $detail ->image_link = $request->image_link;
        $detail ->user_id = $userId;
        $detail ->save();

        return response(['Berhasil Menambahkan ke table user_detail' => true]);
    }

    public function update(Request $request)
    {
        $userId = $request->user()->id;
        $detail = UserDetail::where('user_id', $userId)->first();
        // $request->validate([
        //     'address'=>'',
        //     'phone'=>'numeric'
        // ]);

        if(isset($request->address))
        {
            $detail->address = $request->address;
        }
        if(isset($request->phone))
        {
            $detail->phone = $request->phone;
        }
        $detail ->save();

        return response(['Berhasil Update' => true]);
    }
}
