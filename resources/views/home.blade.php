<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Embark on unforgettable wildlife safaris with our Corbett car booking service. Our expert drivers ensure seamless navigation through the wilderness, while our customizable packages cater to every adventure. With a diverse fleet of vehicles and knowledgeable guides, prioritize safety and comfort as you explore Corbett's majestic landscapes and wildlife treasures.">
    <title>Home - Corbett Car Booking</title>
    @include('include.favicon')
    @include('include.fontawesome')
    @include('include.bootstrap')
    <link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
<style>
        body {
           
           background-color: #f8f9fa; /* Set background color */
       }
        .container1 {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            grid-template-rows: auto;
            row-gap: 35px; 
            column-gap: 15px;
            margin-left:6px;
         }
       .box {
            height: 65vh;
            background-color: red;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            text-align: center;
            color: white;
            width: calc(100% - 20px);
            box-shadow: 0 0 90px rgba(0, 0, 0, 0.1);
        }

        .imagediv {
            height: 39vh;
            background-color: yellow;
        }
        .innerbox {
            height: 06vh;
            background-color:gray;
            color: white;
        }
        .innerbox ul {
             display: flex;
             list-style-type: none;
             justify-content: center;
        }
       .innerbox ul li {
              margin-right: 20px; 
        }
        .bottom {
            height: 20vh;
            background-color: white;
            color: black;
        }
        .box img {
             width: 100%;
            height: 100%; 
        }
        .textformat{
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 20px;
        }
        .textformat a{
            text-decoration: none;
            color: black;
            font-size: 20px;
            font-weight: bold;
        }
        .heading{
            height: auto;
            width: 80%;
            margin:0 auto;
        }
        .heading h1{
            text-align: center;
        }
        #divgap{
            height: 5vh;
            width: 100%;
        }
        @media (max-width: 768px)
    {
        .container1 {
             grid-template-columns: 1fr;
             position: relative;
               top:-150px;
               margin-left:5px;
            }
        .heading{
            position: relative;
            top:-150px;
           }
     }
    </style>
</head>
<body>
    <x-header></x-header>
    <x-navbar></x-navbar>
    <x-carousel></x-carousel>
    {{--Preloader--}}
    <div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
    
    <div class="heading">
    <h1>Explore Wildlife Safaris with Ease!</h1>
    <p>Embark on unforgettable wildlife safaris with our Corbett car booking service. Our expert drivers ensure seamless navigation through the wilderness, while our customizable packages cater to every adventure. With a diverse fleet of vehicles and knowledgeable guides, prioritize safety and comfort as you explore Corbett's majestic landscapes and wildlife treasures.</p>
    </div>
  <div class="container1">
       @forelse ($countrow as $record)
        <div class="box">
          <a href="{{route('vehicledetail',$record->id)}}"><div class="imagediv">
                <img src="{{ asset('/storage/postvehicle/'.$record->vimage1) }}" alt="load">
            </div></a> 
        <div class="innerbox">
            <ul class="list-inline">
                <li><i class="fa fa-car"></i>&nbsp;{{$record->fueltype}}</li>
                <li><i class="fa fa-calendar"></i>&nbsp;{{$record->yearofmfg}} Model</li>
                <li><i class="fa fa-user"></i>&nbsp;{{$record->seatcapacity}} Seats</li>
            </ul>
        </div>
        <div class="bottom">
            <div class="textformat">
                 <h6><a href="{{route('vehicledetail',$record->id)}}">{{$record->vehicletitle}}</a></h6>
                 <span>&#8377;{{$record->pricezone}} /Day</span> 
            </div>
        <p>{{substr($record->textcomment,0,150)}}</p>
        </div>
        </div>
      
        @empty
        <div class="text-center">
           <span class="text-danger">Sorry No Record Found.Please Contact Admin for Update Vehicle</span>
        </div>
@endforelse
   </div>
            <div id="divgap"></div>
                <x-whatsapp></x-whatsapp>
            <x-footer></x-footer>
            {{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
</body>
</html>