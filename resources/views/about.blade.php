<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!--the second one is variable and the value comes inside this variable is from ajax-->
    <title>About Us - Corbett Car Booking</title>
    @include('include.favicon')
    @include('include.fontawesome')
    @include('include.bootstrap')
    <link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
    <style>
        body {
           
            background-color: #f8f9fa; /* Set background color */
        }
        .container-box {
            width:100%;
            height: 100vh;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff; /* Set background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }
        .space{
            height: 05vh;
        }
        @media (max-width: 768px) {
            .container-box {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
<x-header></x-header>
<x-navbar></x-navbar>
{{--Preloader--}}
<div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
    
<div class="space"></div>
<div class="container">
    <div class="text-center container-box">
        <h1>Corbett Car Booking</h1>
        <p>Welcome to Corbett Car Booking, your reliable and convenient transportation solution for exploring the breathtaking wilderness of Corbett National Park and its surrounding areas.</p>
        
        <h2>Our Mission</h2>
        <p>Our mission is to facilitate safe, comfortable, and eco-friendly transportation options that enable travelers to explore the wonders of Corbett National Park responsibly. We strive to uphold the highest standards of customer service, ensuring that every journey with us is not only convenient but also enriching and enjoyable.</p>
        
        <h2>Our Services</h2>
        <p>At Corbett Car Booking, we offer a range of transportation services tailored to meet the diverse needs of our customers. Whether you're embarking on a thrilling wildlife safari, exploring the scenic trails of the park, or simply enjoying a leisurely drive amidst nature, our fleet of well-maintained cars and experienced drivers are at your service.</p>

        <h2>Contact Us</h2>
        <p>Ready to embark on an unforgettable journey to Corbett National Park? Get in touch with us today to book your car and start planning your adventure amidst the breathtaking wilderness of one of India's most iconic national parks.</p>
    </div>
</div>
<div class="space"></div>
<x-whatsapp></x-whatsapp>
<x-footer/>
{{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
</body>
</html>
