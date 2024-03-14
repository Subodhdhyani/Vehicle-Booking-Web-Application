<x-admin_dash_common>
          <x-slot:dynamic_title_top>
          Create Brands
</x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Create Brand</h1>
          <form method="post" action="{{route('createbrandsreq')}}" autocomplete="off">
            @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="brandname" name="brandname" value="{{old('brandname')}}" placeholder="Enter Brand Name" required>
            <label for="brandname">Brands Name</label>
            @error('brandname')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
            
</x-slot> 
</x-admin_dash_common>