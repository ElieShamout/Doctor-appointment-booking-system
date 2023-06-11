@extends('user.layout')

@section('content')
  @include('user.start')

  @include('user.doctor')
  
  @include('user.news')

  @include('user.appointment')

  @include('user.mobileapp')

  @include('user.footer')
@endsection