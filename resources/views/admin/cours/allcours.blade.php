<x-app-layout>
    
    <div style="margin-top:300px">

    <div class="row">
        <div class="col-md-10 mx-auto">
           <div class="w3-container" style="background-color:#eeeeee; padding:3%;border-radius:10px;">
           <h3 class="text-uppercase" style="float:left">Creer un cours </h3>
           <a href="{{ route('cours.create') }}"><button class="w3-button" style="width:200px;margin-left:50px;background-color:#ab3793">+</button></a>
</div>
<hr>
            <div >
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                       Tous les Cours
                    </h3>
                </div> 
               
                <div class="card-body">
                    <table  class="w3-table-all w3-card-4 w3-striped">
                        <thead>
                            <tr class="w3-">
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Matiere</th>
                                <th>ID d'utilisateur</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            @foreach ($cours as $key => $cours)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>{{$cours->title}}</td>
                                    <td>{{$cours->matiere}}</td>
                                    <td>{{$cours->user ? $cours->user->name : Null}}</td>
                                       <td>
                                       
                <form id="{{ $cours->id}}" action="{{route('cours.destroy',$cours->slug)}}" method="post">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               <input type="hidden" name="_method" value="DELETE">
                               </form>
                               <button 
                               onclick="event.preventDefault();
                               if(confirm('etre vous sur'))
                               document.getElementById('{{ $cours->id}}').submit();"
                             style=" background-color:#b10f2e; border:none;border-radius: 30px;padding:10px;color:white;" type="submit" >
                               Supprimer </button>
                            </td>
     
                       
                            <td>
                            <button  style=" background-color:rgb(77, 140, 186); border:none;border-radius: 30px;padding:10px;color:white;">
                             <a href="{{route('cours.edit',$cours->slug)}}"
                            > Modifier</a></button>
                            
                                </tr> 
                            @endforeach
                         

                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
