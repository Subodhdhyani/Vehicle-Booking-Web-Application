<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Error Page/Page Not Found</title>
@include('include.favicon');
<style>
  
  body {
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .error-container {
    text-align: center;
  }

  .error-message {
    font-family: Arial, sans-serif;
    font-size: 24px;
    color: #dc3545;
    display: inline-block;
    animation: bounce 0.5s ease-in-out infinite alternate;
  }

  .error-icon {
    width: 50px;
    height: 50px;
    fill: #dc3545;
    display: inline-block;
    animation: shake 0.5s ease-in-out infinite alternate;
  }

  a{
    text-decoration: none;
    color:green;
  }

 
  @keyframes bounce {
    0% {
      transform: translateY(0);
    }
    100% {
      transform: translateY(-10px);
    }
  }


  @keyframes shake {
    0% {
      transform: rotate(0deg);
    }
    25% {
      transform: rotate(10deg);
    }
    50% {
      transform: rotate(0deg);
    }
    75% {
      transform: rotate(-10deg);
    }
    100% {
      transform: rotate(0deg);
    }
  }
</style>
</head>
<body>

<div class="error-container">
  <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v2h-2zm0-8h2v6h-2zm0-4h2v2h-2z"/>
  </svg>
  <div class="error-message">An error occurred!</div>
  <a href="{{route('home')}}">Go to Homepage</a>
</div>

</body>
</html>
