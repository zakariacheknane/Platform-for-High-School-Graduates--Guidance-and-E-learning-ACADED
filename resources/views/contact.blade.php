
@extends('master.layout')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{ asset('css/mycustom.css') }}">
        <script src="https://kit.fontawesome.com/c13aede383.js" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <title>Accueil</title>
       </head>
       
    <body style="margin-top:150px;">
<div class="w3-row-padding">

           @foreach ($user as $key => $user)
                            @if ($user->role_id == 3) 
                                <div class="w3-container w3-quarter" style="padding:2%;">
                        <div class="card h-100 " style="float:left;"> 
                            <img src="images\contact.png" class="card-img-top" alt="..." style="width:400px;">
                              <div class="card-body">
    
                                  <h5 class="card-title">  {{$user->name}}</h5>
                                    <h6 class="card-title">{{$user->email}}</h6>
                                   <p class="card-text"> {{$user->teacher_speciality}}</p>
                                   
</div></div></div>
 @endif
                    @endforeach

</div>   </body>
</html>
<style>
.nav{
        background-color: #34065B;
    }
    </style>