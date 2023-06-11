@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row d-flex align-items-center h-100">
            <div class="col-4 m-auto">
                <h1 class="form-box-title">Add Doctor</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                @endif
                    
                <form class="mt-4" action="{{url('update_doctor',$doctor->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$doctor->name}}" class="form-control bg-light text-dark" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" name="phone" value="{{$doctor->phone}}" class="form-control bg-light text-dark" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Speciality</label>
                        <select id="" class="form-select bg-light text-dark" value="{{$doctor->speciality}}" id="exampleInputEmail1" name="speciality" required>
                            <option>--Select--</option>
                            <option {{$doctor->speciality=='skin'  ? 'selected' : ''}}>skin</option>
                            <option {{$doctor->speciality=='heart' ? 'selected' : ''}}>heart</option>
                            <option {{$doctor->speciality=='eye'   ? 'selected' : ''}}>eye</option>
                            <option {{$doctor->speciality=='nose'  ? 'selected' : ''}}>nose</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Room Number</label>
                        <input type="text" name="room" value="{{$doctor->room}}" class="form-control bg-light text-dark" placeholder="Room Number" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" value="{{$doctor->image}}" class="form-control bg-light text-dark" id="inputGroupFile02" >
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <button type="submit" class="btn btn-success bg-success">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection