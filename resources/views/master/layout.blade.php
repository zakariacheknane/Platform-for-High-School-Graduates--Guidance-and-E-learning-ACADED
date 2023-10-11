<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/css/mycustom.css">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/c13aede383.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script> </script>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
     <script>
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
        });
    });
            </script>

</head>
   <body>
     <div>
     <nav  class="nav">
     
<ul >
<div class="w3-sidebar w3-bar-block w3-dark-grey w3-animate-left" style="display:none;margin-top:150px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large " style=""
  onclick="w3_close()">Close &times;</button>
  <a class="a" href="{{route('orientation')}}" class="w3-bar-item w3-button">Orientation</a><br>
  @if(auth()->check())
  <a class="a" href="{{route('cours')}}" class="w3-bar-item w3-button">Cours</a><br>
  <a class="a" href="{{route('profile.show')}}" class="w3-bar-item w3-button">Mon Profile</a><br>
  <a class="a" href="{{route('contact')}}"> <i>Contacts</i></a>
  @else
   <a class="a" href="{{route('login')}}"class="w3-bar-item w3-button">Cours</a><br>
  <a class="a" href="{{url('/login')}}"style="color:white;" class="w3-bar-item w3-button">Connexion</a>
 
  @endif
</div>

<div>
  <li><button class="w3-button w3-xlarge" onclick="w3_open()" style="float:left;width:50px;margin-top:65px;">&#9776;</button></li>
</div>


<div  id="nav_bar">
  <div ><li><a href="{{url('/')}}"><img src="\images/Screenshot.png" alt="Avatar Logo" style="width: 180px;margin-left:30px;margin-top:30px;" ></a></li></div>
  <div class="menu"><li><a class="a" href="{{url('/')}}"class="w3-bar-item" ><i class="fa fa-home"></i> <i>Acceuil</i></a></li>
  <li><a class="a" href="{{route('orientation')}}"><i class='fas fa-graduation-cap' style='font-size:24px'></i> <i>Orientation</i></a></li>

  @if(auth()->check())
   <li><a class="a" href="{{route('cours')}}"><i class='fas fa-book' style='font-size:24px'></i> <i>Cours</i></a></li>
   <li><a class="a" href="{{route('contact')}}"><i class='fas fa-address-book' style='font-size:24px'></i> <i>Contacts</i></a></li>
   @if(auth()->user()->role_id == 1)
  <li ><a class="a" href="{{route('profile.show')}}"><i class='fas fa-user-tie' style='font-size:24px'></i> <i>{{auth()->user()->name}}</i></a></li>
  @endif
  @if(auth()->user()->role_id == 2)
  <li ><a class="a" href="{{route('profile.show')}}"><i class='fas fa-user-graduate' style='font-size:24px'></i> <i>{{auth()->user()->name}}</i></a></li>
  @endif
  @if(auth()->user()->role_id == 3)
  <li ><a class="a" href="{{route('profile.show')}}"><i class='fas fa-chalkboard-teacher' style='font-size:24px'></i> <i>{{auth()->user()->name}}</i></a></li>
  @endif

 </div>
<div>
 
  @else
  <li><a class="a" href="{{url('/login')}}"><i class='fas fa-book' style='font-size:24px'></i> <i>Cours</i></a></li>
   <li><button><a class="a" href="{{url('/register')}}" style="color:white;"><i>Inscription</i></a></button></li>
  <li><button><a class="a" href="{{url('/login')}}"style="color:white;"><i>Connexion</i></a></button></li></div>
  @endif 
  </div>
</ul></nav>
</div></div></div>
    
        <main class="py-4 mt-5">

            @yield('content')
        </main>
            <div class="w3-container" id="footer" >
<div style="height:250px;" >
 <footer class="w3-container  " style=" height:200px;">
 
 <div class="w3-row-padding" style="margin-top:120px;">
      <div class="w3-third w-center" style="margin-top:-30px;">
         <h4> <span><i>Acaded</i></span>  est optimise pour l'apprentissage, et l'autoformation.</br>
         Notre but est de faciliter la vie des etudiants universitaires.
         </h4>
       </div>
       <div  class="w3-third w-center">
       <div style="margin-left:100px;">
     <h3>contactez-nous</h3>
       <i class='fas fa-envelope' style='font-size:24px;float:left;padding:5px;'> </i> 
       <h3> acaded@gmail.com</h3>
         </div></div>
   <div class="w3-third w3-center" >
   <h3>Visitez nos reseaux sociaux:</h3>
   <i class='fab fa-instagram' style='font-size:36px;margin-left:30px;'></i>
   <i class='fab fa-facebook-square' style='font-size:36px;margin-left:30px;'></i>
   <i class='fab fa-linkedin' style='font-size:36px;margin-left:30px;'></i>
   </div>

  </div>
 </footer>
</div></div>

</div>
</body>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

var navbar = document.querySelector('.nav')

window.onscroll = function() {

  // pageYOffset or scrollY
  if (window.pageYOffset > 0) {
    navbar.classList.add('scrolled')
  } else {
    navbar.classList.remove('scrolled')
  }
}
</script>
</body>
</html>
<style>
.nav {
 
  position: -webkit-sticky;
  position: sticky;
  /* sticky or fixed are fine */
  position: fixed;
  top: 0;
  height: 130px;
  width: 100%;
  transition: background .3s; /* control how smooth the background changes */
}

.nav.scrolled {
  background: #34065B;
}
#footer{
  background-image:url({{asset('images/foot.png')}});  
   background-repeat:no-repeat;
   width:100%;
   color:white;
}
#nav_bar .active {
 border:solid;
 border-radius:10px;
  
}

</style>