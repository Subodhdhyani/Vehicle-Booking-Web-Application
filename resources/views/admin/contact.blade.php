<x-admin_dash_common>
          <x-slot:dynamic_title_top>
          Contact
          </x-slot> 
          
          <x-slot:section_dynamic_content>
          <h1>Manage Contact</h1>
          <table class="table  table-striped table-bordered">
             <thead>
                 <tr>
                   <th scope="col">Id</th>
                   <th scope="col">Name</th>
                   <th scope="col">Mobile</th>
                   <th scope="col">Message</th>
                   <th scope="col">Post Date</th>
                  </tr>
             </thead> 
             <tbody>
             @foreach($rec as $data)
            <tr>
               <td>{{$data->id}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->mobile_no}}</td>
               <td>{{$data->comment}}</td>
               <td>{{$data->created_at}}</td>
            </tr>
               @endforeach
             </tbody>
             </table>
</x-slot> 
</x-admin_dash_common>