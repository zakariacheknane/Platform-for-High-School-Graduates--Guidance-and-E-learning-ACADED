@extends('master.layout')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{ asset('css/mycustom.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    
    <body class="background">

<div class="w3-row w3-padding-64" style="margin-top:100px;"> 
   
       
    
    <div class="w3-col l6 " style="margin-bottom:50px;">
          <div class="w3-container w3-round" 
             style="width:500px;background-color:white;margin-left:100px;padding:20px;border:solid;border-width:1px;border-color:#E7E9EB;">
             {{ $slot }}
          </div>
        
    </div> 
    <div class="w3-col l6 w3-center">
            <table>
            <tr><td><div style="width:500px;color:white;"><p>Inscrivez-vous gratuitement et profiter de nos services.</p>
            <p>Accedez a votre espace d'information.</p></div></td>
                <td><img src="images\stu.png" style="width:280px; margin-left:px;"></td></tr>
            <tr><td><div style="width:500px;color:;"></div></td></tr>
            <tr><td><div><img src="images\teach.png" style="width:300px;margin-left:100px;"></div></td></tr>

             </table>
    </div>
</div>
        
    </body>
</html>
<style>
    .background{
background-image: url("images/un.png");
width:100%;
background-repeat:no-repeat;

    }
    </style>