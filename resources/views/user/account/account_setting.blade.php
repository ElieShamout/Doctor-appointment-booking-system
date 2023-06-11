@extends('user.layout')

@section('content')
    <div class="container pt-5">
        <div class="row">

            <div class="col-4 m-auto">
                <h3 class="form-box-title">Update Account Information</h3>
                <form class="mt-4" action="{{url('update_account')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control bg-light text-dark" value="{{Auth::user()->name}}" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control bg-light text-dark" value="{{Auth::user()->phone}}" placeholder="Phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">address</label>
                        <input type="text" name="address" class="form-control bg-light text-dark" value="{{Auth::user()->address}}" placeholder="Phone">
                    </div>
                    <button type="submit" class="btn btn-success bg-success">Update</button>
                </form>

            </div>

        </div>
    </div>
@endsection