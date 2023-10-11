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

<body class="background" style="margin-top:150px;">
    
<div class="row my-4">
<div class="col-md-8">
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{session()->get('success')}}
            </div>
          @endif



    <div class=" ">
       


@foreach($post as $post)
    <div class="w3-card-4"style="width:1300px;margin-left:100px;margin-bottom:50px;">
<header class="w3-container w3-light-grey" >
  <h1>{{$post['title'] }}</h1>
</header>
<div class="w3-container w3-white" >
  <hr>
  <a href="{{route('cours.show', $post->slug)}}"><img src="{{asset('./ploads/'.$post->image) }}" alt="Avatar" class="w3-left w3-circle" style="width:200px;">
 <div style="margin-left:300px;"> <p>{{Str::limit($post->description,50) }}</p> </div>
  
</div></a>
<h6 style="margin-left:400px;">{{$post->file}}</h6>

<h6 style="margin-left:1100px;">{{$post->user ? $post->user->name : Null}}</h6>
</div>

 @endforeach
  </div>
</div>    
</div>
</body>
</html>
<style>
.nav{
        background-color: #34065B;
    }
    </style>

