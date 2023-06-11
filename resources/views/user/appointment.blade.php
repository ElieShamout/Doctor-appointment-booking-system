<div class="page-section">
  <div class="container">
    <h1 class="text-center wow fadeInUp mb-5">Make an Appointment</h1>
    @if(session()->has('message'))
        <div style="width:450px;" class="alert alert-success alert-dismissible fade show m-auto d-flex" role="alert">
            {{session()->get('message')}}
            <button type="button" class="btn-close d-flex align-items-center" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
    @endif
    
    <form class="main-form" action="{{url('appointment')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" name="name" class="form-control" placeholder="Full name">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" name="email" value="{{(Auth::user()) ? Auth::user()->email : ''}}" class="form-control" placeholder="Email address.." {{(Auth::user()) ? 'disabled' : ''}}>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <input type="date" name="date" class="form-control">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="doctor" id="departement" class="custom-select">
            <option value="">---select doctor---</option>
            @foreach($doctors as $doctor)
              <option value="{{$doctor->name}}">{{$doctor->name}} - {{$doctor->speciality}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="number" class="form-control" placeholder="Number..">
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mt-3 wow zoomIn bg-primary">Submit Request</button>
    </form>
  </div>
</div> <!-- .page-section -->