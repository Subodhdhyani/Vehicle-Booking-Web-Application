<x-admin_dash_common>
          <x-slot:dynamic_title_top>
          Update Vehicle
          </x-slot> 

          <x-slot:section_dynamic_content>
          <h1>Update Vehicle</h1>

<style>
img{
        height: 120px;
        width: 200px;
        align-items: center;
}
fieldset {
    margin-bottom: 1em !important;
    border: 1px solid #666 !important;
    padding:1px !important;
}
legend {
    padding: 1px 10px !important;
    float:none;
    width:auto;
}
.astricksize{
  font-size: 2em;
  color: red;
}
</style>

<form method="post" action="{{route('postvehicleupdatereq',$item->id)}}" enctype="multipart/form-data" autocomplete="off">
@csrf
        <fieldset>
           <legend>Basic Info</legend>
    <div class="row g-2">
       <div class="col-md mb-3">
         <div class="form-floating">
         <input type="text" class="form-control" id="vehicletitle" name="vehicletitle" placeholder="Vehicle Title" value="{{ $item->vehicletitle }}" required>
         <label for="vehicletitle">Vehicle Title*</label>
         @error('vehicletitle') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
       </div>
  <div class="col-md mb-3">
    <div class="form-floating">
      <select class="form-select" id="selectbrand" name="selectbrand" required>

    @foreach($brandselect as $first)
        <option value="{{ $first->brandname }}" {{ $item->selectbrand == $first->brandname ? 'selected' : '' }} >{{ $first->brandname }}</option>
    @endforeach
</select>
      <label for="selectbrand">Vehicle Brand*</label>
      @error('selectbrand') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
</div>

<div class="form-floating mb-3">
  <textarea class="form-control" placeholder="Leave a comment here" id="textcomment" name="textcomment" style="height: 100px" required>{{ $item->textcomment }}</textarea>
  <label for="textcomment">Comments*</label>
  @error('textcomment') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="row g-2">
  <div class="col-md mb-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="pricezone" name="pricezone" placeholder="Pricezone" value="{{ $item->pricezone }}" required>
      <label for="pricezone">Price Per Zone*</label>
      @error('pricezone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="col-md mb-3">
    <div class="form-floating">
      <select class="form-select" id="fueltype" name="fueltype" required> 
          <option value="Petrol" @if($item->fueltype == 'Petrol') selected @endif>Petrol</option>
          <option value="Diesel" @if($item->fueltype == 'Diesel') selected @endif>Diesel</option>
          <option value="Electric" @if($item->fueltype == 'Electric') selected @endif>Electric</option>
      </select>
      <label for="fueltype">Fuel Type*</label>
      @error('fueltype') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
</div>

<div class="row g-2">
  <div class="col-md mb-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="yearofmfg" name="yearofmfg" placeholder="Year of Manufacture" value="{{ $item->yearofmfg }}" required>
      <label for="yearofmfg">Year of Manufacture*</label>
      @error('yearofmfg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
<div class="col-md mb-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="seatcapacity" name="seatcapacity" placeholder="Seat Capacity" value="{{ $item->seatcapacity }}" required>
      <label for="seatcapacity">Max Seating Capacity*</label>
      @error('seatcapacity') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
</div>
</fieldset>

<fieldset>
    <legend>Vehicle Images</legend>
    <div class="row g-2">
           <div class="col-md mb-3">
           <img src="{{ asset('/storage/postvehicle/'.$item->vimage1) }}" alt="Current Image">
           <div class="input-group">
           <input type="file" class="form-control" name="upload1" value="{{old('upload1')}}"  aria-label="Upload" ><span class="astricksize">*</span>
           @error('upload1') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
           </div>
           <div class="col-md mb-3">
           <img src="{{ asset('/storage/postvehicle/'.$item->vimage2) }}" alt="Current Image">
           <div class="input-group">
           <input type="file" class="form-control" name="upload2" value="{{old('upload2')}}"  aria-label="Upload" ><span class="astricksize">*</span>
           @error('upload2') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
           </div>
  </div>

<div class="row g-2">
           <div class="col-md mb-3">
           <img src="{{ asset('/storage/postvehicle/'.$item->vimage3) }}" alt="Current Image">
           <div class="input-group">
           <input type="file" class="form-control" name="upload3" value="{{old('upload3')}}"  aria-label="Upload" ><span class="astricksize">*</span>
           @error('upload3') <span class="text-danger">{{ $message }}</span> @enderror 
          </div>
           </div>
           <div class="col-md mb-3">
           <img src="{{ asset('/storage/postvehicle/'.$item->vimage4) }}" alt="Current Image">
           <div class="input-group">
           <input type="file" class="form-control" name="upload4" value="{{old('upload4')}}"  aria-label="Upload" ><span class="astricksize">*</span>
           @error('upload4') <span class="text-danger">{{ $message }}</span> @enderror 
          </div>
           </div>
</div>
</fieldset>

<fieldset>
         <legend>Accessories</legend>                                                                   
<div class="form-check form-check-inline mb-3">
     <input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" value="1" {{ $item->airconditioner == 1 ? 'checked' : '' }}>
     <label class="form-check-label" for="airconditioner">Air Conditioner</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="powerdoor" name="powerdoor" value="1" {{ $item->powerdoor == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="powerdoor">Power Door Locks</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="antibraking" name="antibraking" value="1" {{ $item->antibraking == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="antibraking">AntiLock Braking System</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" value="1" {{ $item->brakeassist == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="brakeassist">Brake Assist</label>
</div> 
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="powersteering" name="powersteering" value="1" {{ $item->powersteering == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="powersteering">Power Steering</label>
</div> 
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" value="1" {{ $item->driverairbag == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="driverairbag">Driver Airbag</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" value="1" {{ $item->passengerairbag == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="passengerairbag">Passenger Airbag</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" value="1" {{ $item->powerwindow == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="powerwindow">Power Windows</label>
</div>
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" value="1" {{ $item->cdplayer == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="cdplayer">CD Player</label>
</div> 
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="centrallocking" name="centrallocking" value="1" {{ $item->centrallocking == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="centrallocking">Central Locking</label>
</div> 
<div class="form-check form-check-inline mb-3">
    <input class="form-check-input" type="checkbox" id="crashsensor" name="crashsensor" value="1" {{ $item->crashsensor == 1 ? 'checked' : '' }}>
    <label class="form-check-label" for="crashsensor">Crash Sensor</label>
</div> 
</fieldset>

<div class="d-grid gap-2 col-6 mx-auto">
     <button class="btn btn-primary" type="submit">Update Changes</button>
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






















