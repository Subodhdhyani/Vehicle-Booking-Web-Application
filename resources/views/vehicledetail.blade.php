<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vehicle Detail - Corbett Car Booking</title>
    @include('include.favicon')
    @include('include.fontawesome')
    @include('include.bootstrap')
    <link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
    {{--Jquery Carousel Plugin--}}
    <link href="{{url('plugin/jquery.flipster.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
    .custom-container {
            padding: 20px;
        }
        .text-right {
            text-align: right;
        }
        .text-left {
            text-align: left;
        }
    .box {
            background-color: white;
            height: 90px;
            width: 90px;
            margin-right: 10px; /* Add margin between boxes */
            float: left; /* Float the boxes to the left */
            border: 1px solid grey;
        }
        
    .box i {
            font-size: 4rem; /* Adjust as needed */
        }

    .aside {
            background-color: whitesmoke;
            float: left;
            width: 30%;
            padding: 10px;
        }
    .main-content {
            background-color:white;
            float: right;
            width: 70%;
            padding: 10px;
        }
    .vehiover{
            background-color: whitesmoke;
        }

    #coverflow .flip-items li img {
            width: 500px; 
            height: auto; 
        }
        /* Adjust styles for small devices */
    @media (max-width: 576px) {
            .text-right,
            .text-left {
                text-align: center;
            }
            .aside,
    .main-content {
                float: none;
                width: auto;
            }
        }
     </style>
</head>
<body>
     <x-header/>
     <x-navbar/>
     {{--Preloader--}}
    <div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
    
<div id="coverflow">
  <ul class="flip-items">
    <li data-flip-title="Title 1">
      <img src="{{ asset('/storage/postvehicle/'.$vdetail->vimage2) }}">
    </li>
    <li data-flip-title="Title 2">
      <img src="{{ asset('/storage/postvehicle/'.$vdetail->vimage1) }}">
    </li>
    <li data-flip-title="Title 3">
      <img src="{{ asset('/storage/postvehicle/'.$vdetail->vimage2) }}">
    </li>
    <li data-flip-title="Title 4">
      <img src="{{ asset('/storage/postvehicle/'.$vdetail->vimage3) }}">
    </li>
    <li data-flip-title="Title 5">
      <img src="{{ asset('/storage/postvehicle/'.$vdetail->vimage4) }}">
    </li>
  </ul>
</div>


  <div class="container custom-container">
        <div class="row">
            <div class="col-md-6 text-left">
                 <h1>{{$vdetail->vehicletitle}}</h1>
            </div> <!-- Display "5000" on the left for medium and larger devices -->
            <div class="col-md-6 text-right text-danger "><h1>&#x20B9; {{$vdetail->pricezone}}</h1></div> <!-- Display text on the right for medium and larger devices -->
        </div>
    </div>


    <div class="container custom-container">
    <div class="row">
        <div class="col-12">
            <div class="box text-center"><!-- class for icon size fa-3x-->
                <i class="fa-solid fa-gas-pump"></i><br> <!-- Line break to separate icon and text -->
                <span style="display: block;">{{$vdetail->fueltype}}</span> <!-- Use display: block; to force text to a new line -->
            </div> <!-- First box -->
            <div class="box text-center">
                <i class="fa-solid fa-chair"></i><br> <!-- Line break to separate icon and text -->
                <span style="display: block;">{{$vdetail->seatcapacity}}</span> <!-- Use display: block; to force text to a new line -->
            </div> <!-- Second box -->
        </div>
    </div>
</div>


    <div class="container custom-container">
        <div class="row">
                    <div class="col-12">
                <div class="main-content">
                    <!-- Main content here -->
                    <div class="container custom-container">
    <div class="row">
        <div class="col-12">
            <div class="full-width-box vehiover text-Primary text-center">
                <h2>Vehicle Overview</h2>
                    <p>{{$vdetail->textcomment}}</p>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="table-container bg-secondary">
                <!-- Table goes here -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Accessories</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aircondtioner</td>
                            <td>
                            @if($vdetail->airconditioner == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Power Door</td>
                            <td>
                            @if($vdetail->powerdoor == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Anti Breaking</td>
                            <td>
                            @if($vdetail->antibraking == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Brake Assistant</td>
                            <td>
                            @if($vdetail->brakeassist == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Power Stearing</td>
                            <td>
                            @if($vdetail->powersteering == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Driver Airbag</td>
                            <td>
                            @if($vdetail->driverairbag == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Passenger Airbag</td>
                            <td>
                            @if($vdetail->passengerairbag == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Power Window</td>
                            <td>
                            @if($vdetail->powerwindow == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>CD Player</td>
                            <td>
                            @if($vdetail->cdplayer == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Central Locking</td>
                            <td>
                            @if($vdetail->centrallocking == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Crash Sensor</td>
                            <td>
                            @if($vdetail->crashsensor == 1)
                             <p><i class="fa-solid fa-check text-success"></i></p>
                            @else
                            <p><i class="fa-solid fa-xmark text-danger"></i></p>
                             @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        </div>
            <div class="aside">
                    <i class="fa-solid fa-taxi mb-3"></i>

 <strong>Book Now</strong>
                    <!-- Form field inside the aside -->
                    <form method="Post" id="my_form" action ="{{ route('stripe') }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input type="hidden" name="vehicle_id" value="{{$vdetail->id}}">
                    <input type="hidden" name="vehicle_name" value="{{$vdetail->vehicletitle}}">
                    <input type="hidden" name="quantity" value="1">{{--In here at a one time single vehicle book--}}
         <div class="form-floating mb-3">
           <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
           <label for="name">Name</label>
           @error('name')
             <span class="text-danger">{{ $message }}</span>
           @enderror
</div>
<div class="form-floating mb-3">
           <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
           <label for="email">Email address</label>
           @error('email')
             <span class="text-danger">{{ $message }}</span>
           @enderror        
</div>
<div class="form-floating mb-3">
           <input type="number" class="form-control" id="number" name="number" value="{{old('number')}}" placeholder="Mobile No">
           <label for="number">Mobile No</label>
           @error('number')
             <span class="text-danger">{{ $message }}</span>
           @enderror
</div>
<div class="form-floating mb-3">
          <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" placeholder="Date">
          <label for="date">Choose Date</label>
          @error('date')
            <span class="text-danger">{{ $message }}</span>
          @enderror
</div>         
<div class="form-floating mb-3">
          <input type="time" class="form-control" id="time" name="time" value="{{old('time')}}" placeholder="time">
          <label for="time">Choose Time</label>
          @error('time')
            <span class="text-danger">{{ $message }}</span>
          @enderror
</div>
<div class="form-floating mb-3">
           <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" style="height: 100px">{{ old('comment') }}</textarea>
           <label for="floatingTextarea2">Comments</label>
           @error('comment')
             <span class="text-danger">{{ $message }}</span>
           @enderror
</div>
<button class ="bg-success text-light" type="submit" id="button_name" name="button_name" value="{{$vdetail->pricezone}}">Pay &#x20B9; {{$vdetail->pricezone}}</button>
                    </form>
                </div>
            </div>
         </div>
    </div>
<x-whatsapp></x-whatsapp>
<x-footer/>
{{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
    {{--Jquery Plugin File--}}
    <script src="{{url('plugin/jquery.flipster.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var coverflow = $("#coverflow").flipster();
            $("#coverflow").flipster({
                style:'carousel',
                fadeIn: 200,
                touch:true,
                buttons: true,
                loop: false,
                //Multiple other opeartion avilable see the plugin documentaion on website
                });
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
        {{--Payment Successfully--}}
         @if(Session::has('success_status'))
         <script>
         swal("Payment Successful","{!!Session::get ('success_status')!!}","success");
         </script>
         @endif
        {{--Payment Failed--}}
         @if(Session::has('cancel_status'))
         <script>
         swal("Payment Failed","{!!Session::get ('cancel_status')!!}","success");
         </script>
         @endif
</body>
</html>
