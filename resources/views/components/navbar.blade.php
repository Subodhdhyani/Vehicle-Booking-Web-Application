<div>
<style>
   .navbar-nav {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    .navbar-nav .nav-item {
        flex: 1;
        text-align: center; /* Optional: Center align the nav items */
    }
    .navbar-nav .nav-link {
        color: white !important; 
        font-weight: bold; 
    }
     .navbar-nav .nav-link:hover{
      background-color:lightgreen;
    }

    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: row;
            align-items: flex-start;
        }
        
    }
</style>
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactus')}}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('faq')}}">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('bookingreceipt')}}">Receipt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>