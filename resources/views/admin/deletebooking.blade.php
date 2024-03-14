<x-admin_dash_common>

          <x-slot:dynamic_title_top>
          Delete Booking
          </x-slot> 
       
          <x-slot:section_dynamic_content>
          <h1 class="text-danger">Deleted Booking / Refund from Here</h1>
@if($booking->isEmpty())
<h4 class="text-center text-success">No Deleted Booking Found</h4>
@else

<table class="table  table-striped table-bordered">
    <thead>
        <tr> 
           <th scope="col">Name</th>
             <th scope="col" class ="d-none d-sm-table-cell">Booking</th>{{--Hide the Column on Small Screen--}}
               <th scope="col">vehicle</th>
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
                     <a href="{{ route('refund', ['payment_intent' => $fetchbooking->payment_intent, 'amount' => $fetchbooking->amount]) }}" class="btn btn-success">Refund</a>
                      </td>
     </tr>
        @endforeach
    </tbody>
</table>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--RAlready Refund--}}
@if(Session::has('already_refund'))
         <script>
         swal("Already Refunded","{!!Session::get ('already_refund')!!}","success"
         );
        </script>
 @endif 

{{--Refund Successfully--}}
@if(Session::has('success_status'))
         <script>
         swal("Refund Successfully","{!!Session::get ('success_status')!!}","success"
         );
        </script>
 @endif 
{{--Refund Failed--}}
@if(Session::has('cancel_status'))
         <script>
         swal("Status","{!!Session::get ('cancel_status')!!}","success"
         );
        </script>
@endif 
</x-slot> 
</x-admin_dash_common>