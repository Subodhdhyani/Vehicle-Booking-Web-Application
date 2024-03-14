<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

      .captcha {
       width: 100px;
       height: 30px;
       border: 1px solid #ccc;
       margin-bottom: 10px;
       display: inline-flex;
       justify-content: center;
       align-items: center;
       font-weight: bold;
       font-size: 18px;
     }
    </style>
</head>
<body>
   <h1>Admin Login</h1>
    <div id="maindiv">
    <form onsubmit="return validateForm()" method="post" action="{{route('signinreq')}}" autocomplete="off">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <span class="text-danger">
      @error('email')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword" required>
    <span class="text-danger">
      @error('password')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </span>
  </div>
  
  <label for="captcha">Enter the CAPTCHA:</label>
            <input type="text" id="captchaInput" required>
            <div class="captcha" id="captcha"></div>
  <button type="submit" class="btn btn-primary">Submit</button><br>
  <a href="{{route('home')}}">BacK to Home</a>
 </form>
      </div>
<script>
function generateCaptcha() {
    const captchaElement = document.getElementById("captcha");
    const captchaText = Math.random().toString(36).substring(2,7); // Function to generate a random alphanumeric string
    captchaElement.innerText = captchaText;
}
function validateForm() {
    const captchaInput = document.getElementById("captchaInput").value;
    const captchaText = document.getElementById("captcha").innerText;
     if (captchaInput.toLowerCase() === captchaText.toLowerCase()) {
        alert("CAPTCHA verification successful! You can now proceed with login.");
        return true;
    } else {
        alert("CAPTCHA verification failed. Please try again.");
        generateCaptcha();
        return false;
    }
}
// Call generateCaptcha function on page load to create the initial CAPTCHA
generateCaptcha();

</script>
</body>
</html>