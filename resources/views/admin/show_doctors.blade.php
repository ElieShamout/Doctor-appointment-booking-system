@extends('admin.layout')
@section('style')
    <style>
        table{
            border-collapse:collapse;  
        }
        table tr{
            transition: all 0.2s;
        }
        table tr:nth-child(n+2):hover{  
            background: whitesmoke !important;
        }
        table tr:nth-child(n+2):hover td{
            color:#333
        }
        .target{
            background: rgb(88, 255, 113);
            color:#333;
            animation: targetDisable 2s linear 10s both;
        }
        @keyframes targetDisable {
            from{
                background: rgb(88, 255, 113);
                color:#333;
            }to{
                background: #00000000;
                color:#6c7293;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Speciality</th>
                        <th>Room</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    @foreach($doctors as $doctor)
                        <tr {{(session()->has('doctor_id') && session()->get('doctor_id')==$doctor->id) ? 'class=target' : ''}}>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->speciality}}</td>
                            <td>{{$doctor->room}}</td>
                            <td><img class="doctor-image rounded-1" src="doctorimage/{{$doctor->image}}" alt="" srcset=""></td>
                            <td class="" style="max-width:100px">
                              <a class="btn btn-danger" onclick="return confirm('you are sure to remove this doctor')" href="{{url('remove_doctor',$doctor->id)}}">Remove</a>
                              <a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection