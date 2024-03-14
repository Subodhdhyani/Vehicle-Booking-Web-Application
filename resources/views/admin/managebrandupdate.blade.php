<x-admin_dash_common>

          <x-slot:dynamic_title_top>
          Update Brands
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Update Brand</h1>
          <form method="post" action="{{route('managebrandsupdatereq',$item->id)}}" autocomplete="off">
            @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="brandname" name="brandname" value="{{$item->brandname}}" placeholder="Enter Brand Name" required>
            <label for="brandname">Brands Name</label>
            @error('brandname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
         @if(Session::has('status'))
         <script>
         swal("Status","{!!Session::get ('status')!!}","success"
         );
         </script>
         @endif 

</x-slot> 
</x-admin_dash_common>