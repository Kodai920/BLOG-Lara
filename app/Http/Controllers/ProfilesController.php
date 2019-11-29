<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{
    public function index(){
        return view('user.profile')->with('user',Auth::user());
    }

    public function update(UpdateProfileRequest $request){
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->linkedin = $request->linkedin;

        $user->save();
        $user->profile->save();

        if($request->hasFile('avator')){
            $avator = $request->avator;
            $avator_new_name = time().$avator->getClientOriginalName();
            $avator->move('uploads/avator/',$avator_new_name);
            $user->profile->avator = 'uploads/avator/'.$avator_new_name;
            $user->profile->save();
        }

        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Session::flash('success','Account Profile Upload');
        return redirect()->back();
    }
}
