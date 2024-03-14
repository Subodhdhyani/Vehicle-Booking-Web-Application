
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{{$dynamic_title_top}}</title>
@include('include.bootstrap')
@include('include.favicon')
@include('include.fontawesome')
    
<style>
       body{
        background-color: whitesmoke;
          }
          
       #topdiv {
           background-color: #28a745;
           height: 50px;
           width: 100%;
           text-align: right;
           position: fixed;
           z-index: 1030;
           }
        
       #wrapdiv {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        
        /* Base styles for the aside (navbar) */
        aside {
            background-color: #28a745;
            width: 20%;
            padding: 20px;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            height: 100vw;
            position: fixed;
            
        }
        /* custom button for aside bar*/
        .custom-btn {
        width: 100%;
        background-color: #28a745; 
        color: white; 
        border: none; 
        text-align: left;
    
      }

        aside ul {
            list-style-type: none;
            padding: 0;
        }
       

        aside li {
            padding: 5px 0;
        }

        /* Back button styles */
        .back-button {
            display: none;
            margin-bottom: 10px;
            cursor: pointer;
        }

        /* Base styles for the section (main content) */
        section {
            padding: 20px;
            width: 80%;
            margin-top: 50px;
            margin-left: 20%;
            background-color:whitesmoke;
          }

        /* Navbar styles for small screens */
        .navbar {
            display: none;
        }

        @media screen and (max-width: 768px) {
        
            #topdiv {
            text-align: right;
            }
            
            #topdiv h1{
            font-size: 20px;
            margin-top: 2%;
            }
        
            aside {
                width: 100%;
                position: fixed;
                top: 0;
                left: -100%;
                height: 100%;
                z-index: 999;
                transition: left 0.3s;
                
               }

            aside.open {
                left: 0;
            }

            .navbar {
                display: block;
                position: fixed;
                z-index: 2030;
            }

            section {
                width: 100%;
                margin-top: 50px;
                margin-left: 0px;
                background-color: whitesmoke;
            }

            #wrapdiv{
                flex-direction: column;
            }

            .back-button {
                display: block;
            }
        }
  </style>
  <script>
        function toggleNavbar() {
            const aside = document.querySelector('aside');
            aside.classList.toggle('open');
        }
  </script>
  </head>
<body>
  
  <div id="topdiv">
    <h1>Corbett Car Booking | Admin Panel</h1>
    </div>
  
    <div id="wrapdiv">

    <!-- Navbar (displayed on small screens) -->
    <div class="navbar">
        <button onclick="toggleNavbar()"><i class="fa-solid fa-bars fa-2xl"></i></button>
    </div>

    <!-- Aside (navbar) -->
    <aside>
        <div class="back-button" onclick="toggleNavbar()">&#8592; Back</div>
        
    <ul>
        <li><a href="{{route('dashboard')}}" class="btn custom-btn"><i class="fa-solid fa-gauge"></i>&ensp;Dashboard</a></li> 
<br>
                 <div class="dropdown-center">
                 <button class="btn custom-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="fa-brands fa-bandcamp"></i>&ensp;Brand</button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('createbrands')}}">Create Brand</a></li>
                          <li><a class="dropdown-item" href="{{route('managebrands')}}">Manage Brand</a></li>
                          </ul>
                          </div>
<br>
                          <div class="dropdown-center">
                 <button class="btn custom-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-car"></i>&ensp;
                  Vehicle</button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('postvehicle')}}">Post Vehicle</a></li>
                          <li><a class="dropdown-item" href="{{route('managevehicle')}}">Manage Vehicle</a></li>
                          </ul>
                          </div>
            
<br>                          
                          <div class="dropdown-center">
                 <button class="btn custom-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-calendar-days"></i>&ensp;
                  Manage Booking</button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('newbooking')}}">New</a></li>
                          <li><a class="dropdown-item" href="{{route('confirmbooking')}}">Confirmed</a></li>
                          <li><a class="dropdown-item" href="{{route('deletebooking')}}">Delete</a></li>
                          </ul>
                          </div>
            
<br>
            <li><a href="{{route('contact')}}" class="btn custom-btn"><i class="fa-solid fa-truck-fast"></i>&ensp;Manage Contact</a></li> <br>
            <li><a href="{{route('subscriber')}}" class="btn custom-btn"><i class="fa-solid fa-envelope"></i>&ensp;Manage Subscriber</a></li> <br>
            <li><a href="{{route('signout')}}" class="btn custom-btn"><i class="fa-solid fa-right-from-bracket"></i>&ensp;Signout</a></li> <br>
    </ul>
    </aside>

    <!-- Section (main content) -->
    <section>
    <!-- Here content change for diffrent page of Admin Dashboard -->
    
        
        {{$section_dynamic_content}}
        


    </section>


  </div>
</body>
</html>
    