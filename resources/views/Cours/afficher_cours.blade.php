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
<div>
      <div >
          <div >
                        <div  style="margin-left:50px;">
                        <div> <h5 style="margin-left:100px;">{{$post->title }}</h5><hr>
         <img src="{{asset('./ploads/'.$post->image) }}" style="width:300px;float:left;" >

                              <div class="w3-container" style="margin-bottom:50px;">
                                   
                                    <div class="w3-container" style="border:solid;border-width:2px;border-radius:20px;border-color:;width:900px;margin-left:400px;padding:30px;">
                                       <p >{{$post->description}}</p></div><hr>

                                      <div class="w3-container" style="margin-left:400px;"> 
                                       <h4 >{{$post->file}}</h4>
                                      <a href="{{route('view',$post->id)}}" class="w3-button" id="butt" >view</a>
                                   <a href="{{url('/download',$post->file)}}" class="w3-button" id="butt" >download</a></div>
                                </div>
                                </div></div>
                              
                                <div class="w3-container" id="back" >
                                <div style="margin-top:100px;width:900px;margin-left:200px;">
                          
                                @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                    @foreach($post->comments as $comment)
                        <div >
                       
                        </div>
                    @endforeach
                    <hr /> <hr />
                    <h4>Ajouter un commentaire</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="w3-button" id="butt" value="Envoyer" />
                        </div>
                    </form></div></div></div>
                              
                    
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
