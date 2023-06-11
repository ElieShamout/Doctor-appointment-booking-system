<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    
    public function edit_account_view(){
        return view('user.account.account_setting');
    }

    public function edit_account(Request $request){
        $user=User::find(Auth::user()->id);

        $user->name=$request->name;
        $user->address=$request->address;
        $user->name=$request->phone;

        $user->save();
        return redirect('account')->with('message','update account data successfully');
    }


    public function edit_password_view(){
        return view('user.account.change_password');
    }
    public function edit_password(Request $request){
        if ($request->password!==$request->confirmPassword){
            return redirect()->back()->with([
                'message'=>'the password varies from confirm password',
                'status' => 301
            ]);
        }

        $user_id=Auth::user()->id;
        $user=User::find($user_id);

        if (!Hash::check($request->oldPassword,$user->password)){
            return redirect()->back()->with([
                'message'=>'filed old password',
                'status' => 301
            ]);
        }

        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->back()->with([
            'message'=>'change password successfull',
            'status' => 200
        ]);
    }

    
}
