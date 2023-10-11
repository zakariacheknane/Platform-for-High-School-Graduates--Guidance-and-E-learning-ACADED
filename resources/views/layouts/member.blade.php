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

    <div >
  
        <div style="margin-top:300px;">
          <center><div class="w3-container w3-round" style="width:500px;background-color:white;padding:20px;
          border:solid;border-width:1px;border-color:#E7E9EB;">
          
             {{ $slot }}
           
                   </div></center>
        </div> 
    </div>



        
</body>
</html>
<style>
    .background{
background-image: url("images/Un.png"); 
width:100%;

background-repeat:no-repeat;
}
    </style>