<x-app-layout>
<div style="margin-top:300px">
<div class="row">
        <div class="col-md-10 mx-auto">        
@if ($errors->any())
   <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div >
              <div class="card-header">
                  <h3 class="card-tile"> Ajouter cours</h3>
              </div>
 <div class="card-body">
 @if(auth()->user()->role_id ==1)
  <form action="{{route('cours.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="mb-3">
    <select name="matiere" class="w3-input w3-border" style="margin-top:15px;">
                    <option value="maths">Mathematiques</option>
                    <option value="info">Informatique</option>
                    <option value="ps">Physique</option>
                    <option value="cm">Chimie</option>
                    <option value="bio">Biologie</option>
                </select>
    </div> 
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Titre</label>
         <input type="text" class="form-control" name="title" placeholder="Titre">
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Image</label>
         <input type="file" class="form-control" name="image" >
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">File</label>
         <input type="file" class="form-control" name="file" >
    </div>
    <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label">Description</label>
         <textarea class="form-control" name="description" rows="3"placeholder="Description"></textarea>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Valider</button>
    </div>

  </form>
  @endif
  @if(auth()->user()->role_id ==3)
  <form action="{{route('cours.storet')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="mb-3">
    <select name="matiere" class="w3-input w3-border" style="margin-top:15px;">
                    <option value="maths">Mathematiques</option>
                    <option value="info">Informatique</option>
                    <option value="ps">Physique</option>
                    <option value="cm">Chimie</option>
                    <option value="bio">Biologie</option>
                </select>
    </div> 
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Titre</label>
         <input type="text" class="form-control" name="title" placeholder="Titre">
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Image</label>
         <input type="file" class="form-control" name="image" >
    </div>
    <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">File</label>
         <input type="file" class="form-control" name="file" >
    </div>
    <div class="mb-3">
         <label for="exampleFormControlTextarea1" class="form-label">Description</label>
         <textarea class="form-control" name="description" rows="3"placeholder="Description"></textarea>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Valider</button>
    </div>

  </form>
  @endif
 </div>
</div>
</div>
</div>
</div>
</div>

</x-app-layout>
