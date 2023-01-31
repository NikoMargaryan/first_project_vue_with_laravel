<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function store(StoreRequest $request){
//        return response()->json([
//            'ss'=>4564654
//        ]);
        $data= $request  -> validated();
        $data['password'] = Hash::make($data['password']);
        User::firstorCreate([
            'email' => $data['email']
        ],$data);
        return response([]);
    }
}
