<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}"><!--the second one is variable and the value comes inside this variable is from ajax-->
  <title>Contact - Corbett Car Booking</title>
  @include('include.favicon')
  @include('include.fontawesome')
  @include('include.bootstrap')
<link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
</head>
<body>
   <x-header></x-header>
  <x-navbar></x-navbar>
    {{--Preloader--}}
    <div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
   



<div>
   <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-6 fw-bold">We would love to serve for you!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">For further assistance, please reach/contact us using the details provided </p>
        </div>
        <hr class="my-4">

        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-top g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    
                <iframe width="100%" height="380" frameborder="0" scrolling="no" marginheight="0" 
                      marginwidth="0" id="gmap_canvas"
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27789.847834621927!2d79.12617412931652!3d29.465864978875963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390a110e83fa340f%3A0x56a310a03f889b82!2sDhikuli%2C%20Uttarakhand%20244715!5e0!3m2!1sen!2sin!4v1710184382797!5m2!1sen!2sin"></iframe>
        </div>

            <div class="col-md-10 mx-auto col-lg-5">
               <form class="p-4 p-md-5 border rounded-3 bg-white" name="myForm" method="post" action="{{route('contactreq')}}" autocomplete ="off">
                 @csrf       
               <p>How can we help?</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="strName" value="{{old('strName')}}" placeholder="Name"
                                required>
                            <label for="floatingInput">Name</label>
                            @error('strName')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="strMobile" name="Mobile" placeholder="Mobile No"
                                required>
                            <label for="strMobile">Phone</label>
                            @error('Mobile')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        

                        <div class="form-floating mb-3">
                          <textarea class="form-control" placeholder="Leave a comment here" id="strComment" name="strComment"   style="height: 100px" required>{{old('strComment')}}</textarea>
                          <label for="strComment">Comments</label>
                          @error('strComment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <button class="w-100 btn btn-lg btn-success" type="submit">Send Message</button>
                        <hr class="my-4">

                    </form>
                </div>
            </div>
        </div>
  </div>
  <x-whatsapp></x-whatsapp>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--Successfully send contact form sweetalert--}}
@if(Session::has('status'))
         <script>
         swal("Thank You","{!!Session::get ('status')!!}","success"
         );
        </script>
@endif 

<x-footer></x-footer>
{{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>
</body>
</html>