
<x-admin_dash_common>
          <x-slot:dynamic_title_top>
          Confirm Booking
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1 class="text-danger">Confirmed Bookings / Now Complete Bookings</h1>
@if($booking->isEmpty())
<h4 class="text-center text-success">No Confirm Booking Found</h4>
@else
         <table class="table  table-striped table-bordered">
             <thead>
                <tr> 
                <th scope="col">Name</th>
                  <th scope="col" class ="d-none d-sm-table-cell">Booking</th>{{--Hide the Column on Small Screen--}}
                    <th scope="col">Vehicle</th>
                      <th scope="col">Mobile</th>
                         <th class ="d-none d-sm-table-cell" scope="col">Status</th>
                            <th scope="col">Date</th>
                             <th scope="col">Time</th>
                               <th scope="col">Operation</th>
                </tr>
             </thead>
              <tbody>
        @foreach($booking as $fetchbooking)
             <tr>
                  <td>{{$fetchbooking->name}}</td>
                   <td class ="d-none d-sm-table-cell">{{$fetchbooking->booking_id}}</td>
                   <td>{{$fetchbooking->vehicle_id}} / {{$fetchbooking->vehicle_name}}</td>
                   <td>{{$fetchbooking->mobile}}</td>
                   <td class ="d-none d-sm-table-cell">{{$fetchbooking->payment_status}}</td>
                   <td>{{$fetchbooking->date}}</td>
                   <td>{{$fetchbooking->time}}</td>
                  <td>
                    <a href="{{route('confirmbookingprint',$fetchbooking->id)}}" class="btn btn-success">Print Detail</a>
               </td>
             </tr>
                 @endforeach
             </tbody>
         </table>
@endif
        </x-slot> 
        </x-admin_dash_common>







