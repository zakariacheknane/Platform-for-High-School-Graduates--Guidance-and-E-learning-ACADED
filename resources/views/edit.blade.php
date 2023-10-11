@extends('master.layout')  

@section('title')
Modifier {{$post->title}}
@endsection

@section('style')
<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                
            }
</style>
@endsection


@section('content')
<div class="row my-4">
      <div class="col-md-8 mx-auto">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="card">
              <div class="card-header">
                  <h3 class="card-tile"> Modifier {{$post->title}}</h3>
              </div>
              <div class="card-body">
                  <form action="{{route('post.update',$post->bac)}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="hidden" name="_method" value="PUT">
                  <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titre</label>
         <input type="text" class="form-control" value="{{$post->title}}"    name="title" placeholder="Titre">
   </div>
   <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Image</label>
         <input type="file" class="form-control" name="image" >
   </div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" name="body" rows="3"placeholder="Description">{{$post->body}}</textarea>
</div>
<div class="mb-3">
 <button class="btn btn-primary">
     Valider
 </button>
</div>

                  </form>
              </div>
          </div>
      </div>
               
            </div>
@endsection
