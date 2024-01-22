<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.index');
   
    }//End Method

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('userData'));
   
    }//End Method

    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $Data = User::find($id);
        $Data->username = $request->username;
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->phone = $request->phone;
        $Data->address = $request->address;
        
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$Data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $Data['photo'] = $filename;
        }

        $Data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   
    }//End Method
}
