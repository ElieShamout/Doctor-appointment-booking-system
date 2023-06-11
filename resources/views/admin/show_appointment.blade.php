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
    </style>
@endsection
@section('content')
  <div class="container">
      <div class="row mt-2">
          <div class="col-12">
              <table class="table">
                  <tr>
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Date</th>
                      <th>Message</th>
                      <th>Status</th>
                  </tr>
                  @foreach($appointments as $appointment)
                      <tr>
                          <td>{{$appointment->name}}</td>
                          <td>{{$appointment->email}}</td>
                          <td>{{$appointment->number}}</td>
                          <td>{{$appointment->date}}</td>
                          <td>{{$appointment->message}}</td>
                          <td>{{$appointment->status}}</td>
                          <td>
                              <a class="btn btn-success" href="{{url('approved_appointment',$appointment->id)}}">Approved</a>
                              <a class="btn btn-danger" onclick="return confirm('you are sure to delete this appointment')" href="{{url('cancel',$appointment->id)}}">Cancel</a>
                          </td>
                      </tr>
                  @endforeach
              </table>
          </div>
      </div>
  </div>
@endsection
