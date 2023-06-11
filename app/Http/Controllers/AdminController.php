<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function register_doctor(Request $request){
        $doctor=new doctor;
        
        $image=$request->image;
        $imageName=time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctorimage',$imageName);
        $doctor->image=$imageName;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        
        $doctor->save();

        return redirect('show_doctors')->with('doctor_id',$doctor->id);
    }

    public function show_appointment(){
        $appointments=Appointment::all();
        return view('admin.show_appointment',compact('appointments'));
    }

    public function approved_appointment($id){
        $appointment=Appointment::find($id);
        $appointment->status='approved';
        $appointment->save();
        return redirect()->back();
    }

    public function cancel_appointment($id){
        $appointment=Appointment::find($id);
        $appointment->status='Canseled';
        $appointment->save();
        return redirect()->back();
    }

    public function show_doctors(){
        $doctors=Doctor::all();
        return view('admin.show_doctors',compact('doctors'));
    }
    
    public function remove_doctor($id){
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }

    public function updatedoctor($id){
        $doctor=Doctor::find($id);
        return view('admin.update_doctor',compact('doctor'));
    }

    public function update_doctor($id,Request $request){
        $doctor=Doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->image;
        $imageName=time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctorimage',$imageName);
        $doctor->image=$imageName;
        
        $doctor->save();
        
        return redirect('show_doctors');
    }

    public function account_setting(){
        return view('admin.account.account_setting');
    }

    public function update_account(Request $request){

        $user_id=Auth::user()->id;
        $user=User::find($user_id);

        $user->name=$request->name ?? $user->name;
        $user->email=$request->email ?? $user->email;
        $user->address=$request->address ?? $user->address;
        $user->phone=$request->phone ?? $user->phone;

        $user->save();
        return redirect('/home');
    }

    public function change_password_view(){
        return view('admin.account.change_password');
    }

    public function change_password(Request $request){
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

    public function logoutaccount(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

}