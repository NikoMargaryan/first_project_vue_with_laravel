<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(StoreRequest $request){
//        return response()->json([
//            'ss'=>4564654
//        ]);
        $data=$request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::where('email', $data['email'])->first();

        if($user) return response(['message' => 'User email is already exists'],403);

        $url='';
        if($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {

                $extension=$request->image->extension();
                if(!Storage::exists('/public/image'))
                {
                    Storage::makeDirectory('/public/image',0775,true);
                }
                $date=\Carbon\Carbon::now()->format('YM');
                if(!Storage::exists('/public/image/'.$date))
                {
                    Storage::makeDirectory('/public/image/'.$date,0775,true);
                    Storage::setVisibility('/public/image/','public');
                }
                $mt_rand=mt_rand(10000,9999999);
                $imgName=\Carbon\Carbon::now()->format('YMd').$mt_rand;
                $name=$request->image->storeAs('/public/image/'.$date,$imgName.'.'.$extension);
                $url=Storage::url('image/'.$date.'/'.$imgName.'.'.$extension);
                Storage::setVisibility($name,'public');
            }
        }
        $data['image']=$url;
        $user = User::query()->create($data);
        $token = auth()->tokenById($user->id);
        return response(['authorisation_token'=> $token]);
    }
}
