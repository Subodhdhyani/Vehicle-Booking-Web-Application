<x-admin_dash_common>

          <x-slot:dynamic_title_top>
          Manage Vehicle
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Manage Vehicle</h1>

         <table class="table  table-striped table-bordered">
             <thead>
                 <tr>
                   <th scope="col">Id</th>
                   <th scope="col">Vehicle Title</th>
                   <th scope="col">Price Per Zone</th>
                   <th scope="col">Year of Manufacture</th>
                   <th scope="col">Operation</th>
                </tr>
             </thead> 
              <tbody>
             @foreach($data as $record)
                <tr>
                   <td>{{$record->id}}</td>
                   <td>{{$record->vehicletitle}}</td>
                   <td>{{$record->pricezone}}</td>
                   <td>{{$record->yearofmfg}}</td>
                   <td>
                   <a href="{{route('postvehicleupdate',$record->id)}}">
                   <i class="fas fa-edit"></i>
                   </a>
                       &emsp;
                   <a href="{{route('postvehicledelete',$record->id)}}">
                   <i class="fas fa-trash-alt"></i> 
                   </a>
                  </td>
               </tr>
             @endforeach
             </tbody>
         </table>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
         {{--For Delete Sweer Aler--}}
         @if(Session::has('status'))
         <script>
         swal("Status","{!!Session::get ('status')!!}","success");
         </script>
         @endif

</x-slot> 
</x-admin_dash_common>