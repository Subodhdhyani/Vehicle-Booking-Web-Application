<x-admin_dash_common>

          <x-slot:dynamic_title_top>
          Dashboard
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Dashboard</h1>

<style>
        
        .container{
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            grid-template-rows: auto auto; 
            row-gap: 30px; 
            column-gap: 15px
          }
        .box {
            height: 25vh;
            background-color:thistle;
            display: flex;
            flex-direction: column;
            justify-content: flex-end; 
            text-align: center;
            color:white;
          }
         .innerbox {
            height: 30px;
            width: 100%;
            background-color:lightblue;
         }
         a{
            text-decoration: none;
            color: grey;
            font-weight: bold; 
            text-align: center;
        }
.box:nth-child(1) {
  background-color:darkcyan; 
}
.box:nth-child(2) {
  background-color: blue; 
}
.box:nth-child(3) {
  background-color: purple; 
}
.box:nth-child(4) {
  background-color: green; 
}
.box:nth-child(5) {
  background-color:red; 
}
.box:nth-child(6) {
  background-color:lightslategrey;
}
.box:nth-child(7) {
  background-color:brown; 
}


/* Media query for smaller screens */
@media (max-width: 768px) {
  .container {
    grid-template-columns: 1fr; /* Each box take full row on smaller screen */
  }
}
</style>

<body>
<hr>
          <div class="container">
                   <div class="box"> 
                      <h1>{{$totalbrand}}</h1>
                      <div>Listed Brands</div>
                      <a href="{{route('managebrands')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{$totalvehicle}}</h1>
                      <div>Listed Vehicles</div>
                      <a href="{{route('managevehicle')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{$totalbooking}}</h1>
                      <div>New Bookings</div>
                      <a href="{{route('newbooking')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{$completebooking}}</h1>
                      <div>Completed Bookings</div>
                      <a href="{{route('confirmbooking')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{$cancelbooking}}</h1>
                      <div>Cancelled Bookings</div>
                      <a href="{{route('deletebooking')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{$totalsubscriber}}</h1>
                      <div>Manage Subscribers</div>
                      <a href="{{route('subscriber')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      <h1>{{ $totalcontact}}</h1>
                      <div>Manage Contact</div>
                      <a href="{{route('contact')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>

                      <div class="box"> 
                      @if(Auth::guard('custom_web')->check())
                      <p>User is active</p>
                      @else
                      <p>User is inactive</p>
                      @endif
                      <div>Signout</div>
                      <a href="{{route('signout')}}"> <div class="innerbox">Full Detail&ensp;<i class="fa-solid fa-arrow-right"></i></div></a>
                      </div>
        </div>
</body>

</x-slot> 
</x-admin_dash_common>