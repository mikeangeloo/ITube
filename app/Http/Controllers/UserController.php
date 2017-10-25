<?php

namespace ITube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{
    public function profile(){
        return view('user.profile',array('user'=> Auth::user()));
    }

    public function update(Request $request){
        $user = Auth::user();
        // Manejando datos enviados por el usuario
        if($request->hasFile('user_image')){
            $avatar = $request->file('user_image');
            $filename = Auth::user()->id . '_' . date("Y-m-d", time()) . '.' . $avatar->getClientOriginalExtension();
//            Storage::disk('public')->makeDirectory('uploads/usersprofile/');
            Image::make($avatar)->resize(300,300)->save(public_path('uploads/usersprofile/'. $filename));

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return Redirect::to('user/profile')->withInput(array('user'=>Auth::user()));

    }
}
