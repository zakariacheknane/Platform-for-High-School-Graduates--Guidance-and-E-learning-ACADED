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
    
    <div class="row my-4">
      <div class="col-md-8">
          @if(session()->has('success'))
          <div class="alert alert-success">
              {{session()->get('success')}}
          </div>
          @endif
          <div class="row ">
                  @foreach($post as $post)
                        <div class="col-md-4 mb-2">
                        <div class="card h-100 ">
 <img src="{{asset('./uploads/'.$post->image) }}" class="card-img-top" alt="...">
                              <div class="card-body">
                                   <h5 class="card-title">{{$post['title'] }}</h5>
                                   <h6 class="card-title">{{$post->user ? $post->user->name : Null}}</h6>
                                       <p class="card-text">{{Str::limit($post->description,50) }}</p>
                                     <button class="w3-center" style="width:200px;margin-left:30px;"><a href="{{route('orientation.show',$post->slug)}}" class="a" style="color:white;">Acceder </a></button>
                                </div>
                                </div>
                         </div>
                    @endforeach
             </div>
             <div class="d-flex justify-content-center my-4">
             
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