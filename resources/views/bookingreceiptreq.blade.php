@include('include.bootstrap')
@include('include.favicon')
<link rel="stylesheet" type="text/css" href="{{url('css/loader.css')}}">
{{--Preloader--}}
<div class="car">
    <img src="{{url('assest/preloader_car.png')}}" alt="Preloader_Logo" width="100" height="70">
    </div>
    
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3" style="display: flex; justify-content: center; align-items: center; height: 4vh;margin-top: 20px;">
            <img src="{{url('Business_Logo/Main_logo.png')}}" alt="Our Logo" class="img-fluid" style="max-height: 150px;">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1 class="text-success">Corbett Car Booking Receipt Client Copy</h1>
            <p>Print at {{ date('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-striped table-bordered mx-auto  table-hover">
                <tr>
                   <td>Booking ID</td>
                   <td>{{$data->booking_id}}</td>
               </tr>
               <tr>
                   <td>Name</td>
                   <td>{{$data->name}}</td>
               </tr>
               <tr>
                   <td>Email</td>
                   <td>{{$data->email}}</td>
               </tr>
               <tr>
                   <td>Vehicle ID/Name</td>
                   <td>{{$data->vehicle_id}} / {{$data->vehicle_name}}</td>
               </tr>
               <tr>
                   <td>Mobile</td>
                   <td>{{$data->mobile}}</td>
               </tr>
               <tr>
                   <td>Message</td>
                   <td>{{$data->message}}</td>
               </tr>
               <tr>
                   <td>Schedule Date</td>
                   <td>{{$data->date}}</td>
               </tr>
               <tr>
                   <td>Schedule Time</td>
                   <td>{{$data->time}}</td>
               </tr>
               <tr>
                   <td>Total Amount Pay</td>
                   <td>{{$data->amount}}</td>
               </tr>
               <tr>
                   <td>Payment Method</td>
                   <td>{{$data->payment_method}}</td>
               </tr>
               <tr>
                   <td>Booking Time</td>
                   <td>{{$data->created_at}}</td>
               </tr>
                <tr>
               <td><button id="print" class="btn btn-success" >Print</button></td>
                 <td><a href="{{route('bookingreceipt')}}" id="back" class="btn btn-success">Back</a></td>
               </tr>
            </table>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
               <strong><p class="font-weight-bold">&copy; {{ date('Y') }} Corbett Car Booking. All rights reserved. | All legal matters subject to Corbett City Judiciary jurisdiction.</p></strong>
            </div>
        </div>
    </div>
</footer>
{{--For Preloader car--}}
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{url('js/loader.js')}}"></script>

<script>
        document.getElementById("print").addEventListener("click", function() {
           // Hide the button after printing is triggered
            this.style.display = 'none';
            // Hide the back button
            document.getElementById('back').style.display = 'none';
            // Simulate Ctrl+P (Print) keyboard shortcut
            window.print();
           // Show the print button
            document.getElementById('print').style.display = 'block';
            // Show the back button
            document.getElementById('back').style.display = 'inline-block';
            });
    </script>
