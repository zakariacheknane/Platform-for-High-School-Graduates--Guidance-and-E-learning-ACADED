@extends('master.layout')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/mycustom.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c13aede383.js" crossorigin="anonymous"></script>
        <title>Accueil</title>
       </head>
<body>
@if(auth()->check())
<div id="background">
    <div id="top" style="height:1100px;">
   <div class="w3-row w3-padding-64 ws-black">
    <div class="w3-col l6 " style="padding:2% 3%;margin-top:200px;">
         <h1 class=""><b>Bienvenue a ACADED!</b> </h1>
          <h3 class="w3-text-white w3-margin-top 30px">Vous êtes un membre! profitez de nos services et soyez les meilleurs.   </h3>
         <div classs="w3-col l6 w3-center"  >
         </div>
      </div>
    </div></div>
  </div>
            

 
<div style="height:px;" id="back">
<div style="height:600px;" id="pink">
 <div class="w3-row-padding" >
    <div class="w3-half w3-container" style="margin-top:70px;">
   <img src="images/orientation.png" alt="Avatar" class="w3-left w3-circle" style="width:400px;margin-left:100px;"></div>
    <div class="w3-half w3-container w3-center" style="margin-top:170px;"><h5 >Vous êtes des bacheliers et vous ne savez pas où étudier l'année prochaine? découvrez toute information
     nécessaire sur les études supérieures. </h5>
       <a href="{{route('orientation')}}" class="w3-button " id="butt">S'orienter</a>
    </div>
  </div>
</div>



<div style="height:500px;" id="bottom">
 <div class="w3-row-padding">
  <div class="w3-half w3-container w3-center" style="margin-top:170px;">
   <h5 >Trouvez tout ce que vous cherchez pour vos études universitaires, préparez comme il faut.</h5>
  <a href="{{route('cours')}}" class="w3-button  " id="butt" >Aller aux cours</a>
 </div>
 <div class="w3-half w3-container" style="margin-top:70px;">
 <img src="images/cours..png" alt="Avatar" class="w3-left w3-circle " style="width:400px;margin-left:200px;"></div>
 </div>
</div>

</div>
@else
  <div id="background">
    <div id="top" style="height:1100px;">
   <div class="w3-row w3-padding-64 ws-black">
    <div class="w3-col l6 " style="padding:2% 3%;margin-top:200px;">
         <h1 class=""><b>Bienvenue a ACADED!</b> </h1>
          <h3 class="w3-text-white w3-margin-top 30px">Rejoignez notre communité et soyez l'étudiant idéal.  </h3>
         <a href="{{url('/register')}}" class="w3-button" id="button" style="margin-top:80px;color:white;">Soyez membre</a>
         <div classs="w3-col l6 w3-center"  >
         </div>
      </div>
    </div></div>
  </div>
            

 
<div style="height:px;" id="back">
<div style="height:600px;" id="pink">
 <div class="w3-row-padding" >
    <div class="w3-half w3-container" style="margin-top:70px;">
   <img src="images/orientation.png" alt="Avatar" class="w3-left w3-circle" style="width:400px;margin-left:100px;"></div>
    <div class="w3-half w3-container w3-center" style="margin-top:170px;"><h5 >Vous êtes des bacheliers et vous ne savez pas où étudier l'année prochaine? découvrez toute information
     nécessaire sur les études supérieures. </h5>
       <a href="{{route('orientation')}}" class="w3-button  " id="butt">S'orienter</a>
    </div>
  </div>
</div>



<div style="height:500px;" id="bottom">
 <div class="w3-row-padding">
  <div class="w3-half w3-container w3-center" style="margin-top:170px;">
   <h5 >Trouvez tout ce que vous cherchez pour vos études universitaires, préparez comme il faut. Inscrivez-vous pour accéder aux cours.</h5>
  <a href="{{url('/register')}}" class="w3-button  " id="butt" >S'inscrire</a>
 </div>
 <div class="w3-half w3-container" style="margin-top:70px;">
 <img src="images/cours..png" alt="Avatar" class="w3-left w3-circle " style="width:400px;margin-left:200px;"></div>
 </div>
</div>

</div>
@endif

</body>
</html>
<style>
  #background {
    background-image: url("images/148Z_2106.w013.n001.480B.p30.480 [Converted].jpg");
    background-size: contain; 
   width:100%;
   height:1100px;
   background-repeat:no-repeat;
  
  
 
  }
  #back{
  background: linear-gradient(to bottom, #34065B, #fff 40%,#0000);
  margin-top:-62px;
  width: 100%;
  }
  #top{
    background: linear-gradient(to top, #34065B, transparent 50%,#0000);
  }
  #bottom{
    background: linear-gradient(to bottom, #d39cd3, #fff 40%,#0000);
  }
  #pink{
    background: linear-gradient(to top, #d39cd3, #fff 40%,#0000);

  }
 
  h1{
  color:white;
  font-family: 'Bellefair', serif;
  font-size:35pt;
 
  }
  h3{
   
  }
  #button{
     border-style:solid;
     border-width:3px;
    border-color:#ab3793;
    border-radius:40px;
    width:400px;
  }
    </style>