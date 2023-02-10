<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class GetImageController extends Controller
{
    public function userImage()
    {
        return auth()->user()->image;
    }
}
