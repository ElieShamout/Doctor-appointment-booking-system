@extends('user.layout')

@section('content')

    @if(session()->has('message'))
        <div style="width:450px;" class="alert alert-success alert-dismissible fade show m-auto d-flex" role="alert">
            {{session()->get('message')}}
            <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
    @endif

    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-hover">
                    <tr>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Controll</th>
                    </tr>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->doctor}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->message}}</td>
                            <td>{{$appointment->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('updateappointment',$appointment->id)}}">Update</a>
                                <a class="btn btn-danger" onclick="return confirm('you are sure to delete this appointment')" href="{{url('cancel_appointment',$appointment->id)}}">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection