@extends('master.layout')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{ asset('css/mycustom.css') }}">
        <script src="https://kit.fontawesome.com/c13aede383.js" crossorigin="anonymous"></script>
        <title>Accueil</title>
       </head>
    <body class="background" style="">
    <div >
 


  <div class="w3-container"style="margin-left:200px;">
      <div class="w3-container w3-center " style="margin-top:200px;width:800px;float:left;color:white;">
      <p>Voici votre espace d'orientation, vous allez trouver de variante informations concernant
           les etablissements d'etudes superieures au Maroc, les opportunites sont classes selon 
           le type de votre baccalaureats.</p>
        </div>
        <div>
               <img src=images\or.png style="width:300px;margin-left:150px;margin-top:100px">
         </div>
      </div>

    <div class="w3-row w3-padding-64 ws-black" data-aos="fade-left" data-aos-duration="1000">

 
   <div class="w3-col l6  w3-center" style="padding:2% 3%;">
   <a href="{{ url('/orientation2/gest') }}">
        <div class="w3-card-2 w3-round" style="color:black;background-color:#92b8ff;padding:24px;height:150px;">
          <h2 style="font-size:30px;font-weight:500">BAC TECHNIQUES DE GESTION ET COMPTABILITÉ</h2>
        </div>
      </a>
    </div>
      

    <div class="w3-col l6 w3-center" style="padding:2% 3%;">
    <a href="{{ url('/orientation2/eco') }}">
        <div class="w3-card-2 w3-round" style="background-color: #eccaff;color:black;padding:24px;height:150px;">
          <h2 style="font-size:30px;font-weight:500">BAC SCIENCES ÉCONOMIQUES</h2>
        </div>
      </a>
    </div>

    <div class="w3-col l6 w3-center" style="padding:2% 3%;"> 
    <a href="{{ url('/orientation2/pc') }}">
      <div class="w3-card-2 w3-round" style="color:black;background-color:#cd89fb;padding:24px;height:150px;">
      <h2 style="font-size:30px;font-weight:500">BAC SCIENCES PHYSIQUES</h2>
      </div>
      </a>
    </div>
 
    <div class="w3-col l6 w3-center" style="padding:2% 3%;"> 
    <a href="{{ url('/orientation2/sma') }}">
      <div class="w3-card-2 w3-round" style="color:black;background-color:#9489ff;padding:24px;height:150px;">
       <h2 style="font-size:30px;font-weight:500">BAC SCIENCES MATHÉMATIQUES A</h2>

      </div>
      </a>
    </div>

    <div class="w3-col l6 w3-center" style="padding:2% 3%;"> 
    <a href="{{ url('/orientation2/smb') }}">
      <div class="w3-card-2 w3-round" style="color:black;background-color:#E7E9EB;padding:24px;height:150px;">
       <h2 style="font-size:30px;font-weight:500"> BAC SCIENCES MATHÉMATIQUES B</h2>
      </div>
      </a>
    </div>

    <div class="w3-col l6 w3-center" style="padding:2% 3%;"> 
    <a href="{{ url('/orientation2/svt') }}">
      <div class="w3-card-2 w3-round" style="color:black;background-color:#7098eb;padding:24px;height:150px;">
       <h2 style="font-size:30px;font-weight:500">SVT BAC</h2>
      </div>
      </a>
    </div>
  </div>
</div> </div>





</body>

</html>

<style>
    a:-webkit-any-link {
    cursor: pointer;
    }
    .background{
background-image: url("images/Untitled.jpg");
background-size: contain; 
width:1500px;
background-repeat:no-repeat;

    }
    </style>

