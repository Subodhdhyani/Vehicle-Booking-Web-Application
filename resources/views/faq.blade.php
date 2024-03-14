<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!--the second one is variable and the value comes inside this variable is from ajax-->
    <title>FAQ - Corbett Car Booking</title>
    @include('include.favicon')
    @include('include.fontawesome')
    @include('include.bootstrap')
    <link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
    <style>
        #space{
            height:20vh;
        }
         body {
           
            background-color: #f8f9fa; /* Set background color */
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

{{--Accordian Start here and then used from componenet--}}
<div class="container mt-5">
<div class="accordion" id="accordionExample">
  
{{--Dynamic Component--}}
    <x-faq_dynamic question="Can we Self Drive Cars inside Corbett National Park" answer="No,As Per Park Rules No Private Vehicle can go inside Park, Only Authorized Vehicle from Park can go Inside Park " dividd="first"/>
    <x-faq_dynamic question="Do I need to carry any id proof to avail the Service" answer="Yes,you need to carry any valid photo Id Proof" dividd="second"/>
    <x-faq_dynamic question="Can You Provide Pickup and Drop Facilities" answer="Yes,we provide Pickup and Drop Services But only within the Corbett City " dividd="third"/>
    <x-faq_dynamic question="Doesn't I need any Reservation/Pre-book for entry in the Park" answer="Yes yo have to do so because the park have different zones and the ticket have only available online with limited numbers.  " dividd="fourth"/>
    <x-faq_dynamic question="Is their any Fixed Time Period for Entry in the Park" answer="Yes the time is fixed and the entry is given on fixed time which is available on Morning and Afternoon Shift only" dividd="fifth"/>
    <x-faq_dynamic question="Should I Book Service in Advance ?" answer="Yes, It is recommended that after booking Park ticket online you can also book the car Service Online from us" dividd="sixth"/>
    <x-faq_dynamic question="What types of Car You Provide" answer="As Per Park Norms we provide 4*4 and Open Canters" dividd="seventh"/>
    <x-faq_dynamic question="Can I bring Food inside Park?" answer="No, You cannot bring and open and packed foods etc inside Park" dividd="eight"/>
    
</div>
</div>

<div id="space"></div>
<x-whatsapp></x-whatsapp>
<x-footer/>
{{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
</body>
</html>