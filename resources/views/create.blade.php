@extends('master.layout')
 <head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css\mycustom.css" rel="stylesheet">

</head>



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
                  <h3 class="card-tile"> poster une publication</h3>
              </div>
              <div class="card-body">
                  <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titre</label>
         <input type="text" class="form-control" name="title" placeholder="Titre">
   </div>
   <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Image</label>
         <input type="file" class="form-control" name="image" >
   </div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" name="body" rows="3"placeholder="Description"></textarea>
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
