<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    @include('include.bootstrap')
    @include('include.favicon')
    <style>
        body{
          background-color: #28a745;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1{
            font-size: 5vw;
            color: white;
        }
        #maindiv{
            height: 80vh;
            width: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
       #maindiv a{
            text-align: center;
            color: blue;
        }
       #maindiv button:hover {
       background-color: #45a049;
       }
       #maindiv button {
       width: 100%;
       padding: 10px;
       margin-bottom: 15px;
       }
</style>
</head>
<body>
   <h1>Admin Signup</h1>
    <div id="maindiv">
    <form method="post" action="{{route('signupreq')}}" enctype="multipart/form-data" autocomplete="off">
      @csrf
      <div class="mb-3">
      <label for="InputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="InputEmail" name="Inputemail" aria-describedby="emailHelp" value="{{old('Inputemail')}}" required>
         <span class="text-danger">
         @error('Inputemail')
       <span class="text-danger">{{ $message }}</span>  
         @enderror
         </span>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
      <label for="InputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="InputPassword1" required>
         <span class="text-danger">
         @error('password')
         <span class="text-danger">{{ $message }}</span>  
         @enderror
         </span>
    </div>
                                       
  <div class="mb-3">
    <label for="InputPassword2" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="password_confirmation" id="InputPassword2" required>
      <span class="text-danger">
      @error('password_confirmation')
      <span class="text-danger">{{ $message }}</span>  
      @enderror
    </span>
</div>
      <button type="submit" class="btn btn-primary">Submit</button><br>
 </form>
     </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
         {{--For Delete Sweer Aler--}}
         @if(Session::has('status'))
         <script>
         swal("Status","{!!Session::get ('status')!!}","success");
         </script>
         @endif
  </body>
  </html>