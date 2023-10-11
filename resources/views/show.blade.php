@extends('master.layout')
@section('title')
{{$post->title}}
@endsection
 
@section('style')
<style>
            html, body {
                background-color: #111;
                color: #636b6f;
                
            }
</style>
@endsection
@section('script')
<script>
           
</script>
@endsection
@section('content')
<!-- photo et sent -->
<div class="row my-4">
      <div class="col-md-8">
          <div class="row ">
                        <div class="col-md-12 mb-2">
                        <div class="card h-100 ">
 <img src="{{asset('./uploads/'.$post->image) }}" class="card-img-top" >
                              <div class="card-body">
                                   <h5 class="card-title">{{$post['title'] }}</h5>
                                       <p class="card-text">{{$post->body}}</p>
                                </div>
                                </div>
                              
                   
             </div>
            
      </div>    
    </div>
@endsection