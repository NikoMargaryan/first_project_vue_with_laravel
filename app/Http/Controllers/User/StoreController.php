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
        $user = User::where('email', $data['email'])->first();

        if($user) return response(['message' => 'User email is already exists']);

        $user = User::create($data);
        $token = auth()->tokenById($user->id);
        return response(['authorisation_token'=> $token]);
    }
}
