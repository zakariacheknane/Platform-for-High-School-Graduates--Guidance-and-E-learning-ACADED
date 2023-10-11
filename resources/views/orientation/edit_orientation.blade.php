<x-app-layout>
<div style="margin-top:300px">
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
<div>
                <div class="card-header">
                  <h3 class="card-tile"> Modifier {{$post->title}}</h3>
                </div>
 <div class="card-body">
 <form action="{{route('orientation.update',$post->slug)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
 <input type="hidden" name="_method" value="PUT">
 <div class="mb-3">
 Type de Baccalaureat
    <select name="bac" class="w3-input w3-border" style="margin-top:15px;">
                    <option value="gest">BAC TECHNIQUES DE GESTION ET COMPTABILITÉ</option>
                    <option value="eco">BAC SCIENCES ÉCONOMIQUES</option>
                    <option value="pc">BAC SCIENCES PHYSIQUES</option>
                    <option value="sma">BAC SCIENCES MATHÉMATIQUES A</option>
                    <option value="smb">BAC SCIENCES MATHÉMATIQUES B</option>
                    <option value="svt">SVT BAC</option>
                </select>
</div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Titre</label>
         <input type="text" class="form-control" value="{{$post->title}}" name="title" placeholder="Titre">
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Image</label>
         <input type="file" class="form-control" name="image" >
    </div>
  
    <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label">Description</label>
         <textarea class="form-control" name="description" rows="3"placeholder="Description">{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Lien d'inscription</label>
         <input type="text" class="form-control" name="link" placeholder="lien">
    </div>
    <div class="mb-3">
         <button class="btn btn-primary">
          Valider</button>
    </div>
 </form>
 </div>
</div>
</div>
</div>

</x-app-layout>
