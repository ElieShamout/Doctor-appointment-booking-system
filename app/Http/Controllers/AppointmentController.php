<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function add_appointment(Request $request){
        $data=new appointment;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->number=$request->number;
        $data->doctor=$request->doctor;
        $data->message=$request->message;
        $data->status='In progress';
        if (Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','register appointment successful');
    }

    public function my_appintment(){
        $user_id=Auth::user()->id;
        $appointments=appointment::where('user_id',$user_id)->get();
        return view('user.my_appintment',compact('appointments'));
    }

    public function cancel_appointment($id){
        $appointment=appointment::find($id);
        $appointment->delete();

        return redirect()->back();
    }

    public function updateappointment($id){
        $appointment=appointment::find($id);
        $specialities=Doctor::select('speciality')->get();

        return view('user.update_appintment',compact('appointment','specialities'));
    }

    public function update_appointment($id,Request $request){
        $appointment=appointment::find($id);

        $appointment->name=$request->name;
        $appointment->doctor=$request->doctor;
        $appointment->number=$request->number;
        $appointment->email=$request->email;
        $appointment->date=$request->date;
        $appointment->message=$request->message;

        $appointment->save();

        return redirect('my_appintment');
    }
}
