<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UsersResource;
use App\Models\User;

class UserController extends Controller
{
    public function user_list(){
        $users= User::all();
        return UsersResource::collection($users);
    }
}
