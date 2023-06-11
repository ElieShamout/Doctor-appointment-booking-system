@extends('user.layout')

@section('content')
<div class="container pt-5">
        <div class="row">
            <div class="col-4 m-auto">
                <h3 class="form-box-title">Change Password</h3>
                @if(session()->has('message') && session()->get('status')=='301')
                    <div style="font-size:14px" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session()->has('message') && session()->get('status')=='200')
                    <div style="font-size:14px" class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="mt-4" action="{{url('change_password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control bg-light text-dark" value="" placeholder="old password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control bg-light text-dark" value="" placeholder="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control bg-light text-dark" value="" placeholder="confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-success bg-success">Update</button>
                </form>

            </div>

        </div>
    </div>
@endsection