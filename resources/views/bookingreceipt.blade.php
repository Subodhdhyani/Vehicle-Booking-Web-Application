<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Corbett Car Booking</title>
    @include('include.favicon')
    @include('include.fontawesome')
    @include('include.bootstrap')
    <link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
</head>
<body>
    <x-header/>
    <x-navbar/>
    {{--Preloader--}}
    <div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
    
<div class="container mt-5 mb-5" style=" background-color:whitesmoke;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); ">
{{--Display Message when record not found--}}
@if(session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<form method="post" action="{{route('bookingreceiptrreq')}}" autocomplete="off" enctype="multipart/form-data">
@csrf
<div class="row g-3">
  <div class="col-sm-6 form-floating">
    <input type="email" class="form-control"  id="email" name="email" placeholder="Email" value="{{old('email')}}" aria-label="Email" required>
    <label for="email">Email address</label>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
  </div>
  <div class="col-sm form-floating">
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" aria-label="Name" required>
    <label for="name">Name</label>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
  </div>
  <div class="col-sm form-floating">
    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{old('mobile')}}" aria-label="Mobile" required>
    <label for="mobile">Mobile No.</label>
                    @error('mobile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
  </div>

<div class="text-center"> 
<input type="submit" class="btn btn-outline-success mb-4 mt-4" value="Get Receipt">
</div>
</div>
</form>
<p class="text-danger">*Attempt to fill the form only after successful payment.</p>
</div>
<x-whatsapp></x-whatsapp>
      <x-footer/>
      {{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
    </body>
</html>