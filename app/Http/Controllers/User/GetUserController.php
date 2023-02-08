<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class GetUserController extends Controller
{
    public function user_name(){
        return auth()->user()->name;

    }
}
