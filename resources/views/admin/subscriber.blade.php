<x-admin_dash_common>

          <x-slot:dynamic_title_top>
          Subscriber 
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Subscriber</h1>
          <table class="table  table-striped table-bordered">
             <thead>
                 <tr>
                   <th scope="col">Id</th>
                   <th scope="col">Email</th>
                   <th scope="col">Subscription Date</th>
                   <th scope="col">Unsubscribe</th>
                  </tr>
             </thead> <tbody>
             @foreach($data as $record)
                <tr>
                   <td>{{$record->id}}</td>
                   <td>{{$record->email}}</td>
                   <td>{{$record->created_at}}</td>
                   <td>
                   <a href="{{route('subscriberdelete',$record->id)}}">
                   <i class="fas fa-trash-alt"></i>
                   </a>
                   </td>
               </tr>
              @endforeach
             </tbody>
         </table>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
         {{--For Delete Sweet Aler--}}
         @if(Session::has('status'))
         <script>
         swal("Status","{!!Session::get ('status')!!}","success");
         </script>
         @endif
</x-slot> 
</x-admin_dash_common>