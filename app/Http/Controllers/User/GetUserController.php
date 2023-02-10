<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class GetUserController extends Controller
{
    public function userName(){
        return auth()->user()->name;
    }
}
