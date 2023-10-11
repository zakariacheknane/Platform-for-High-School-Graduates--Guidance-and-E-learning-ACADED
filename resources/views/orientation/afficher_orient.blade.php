
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
          <div class="w3-row-padding ">
          <div class="w3-third" style="">
           <img src="{{asset('./uploads/'.$post->image) }}" style="width:300px;" ></div>
          <div class="w3-twothird" >
                <div style="margin-left:100px;margin-top:px;"> <h5 >{{$post['title'] }}</h5><hr>
                 <p >{{$post->description}}</p>
                 <p ><a href="$post->link">{{$post->link}}</a></p></div>
                </div>

                 </div>
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