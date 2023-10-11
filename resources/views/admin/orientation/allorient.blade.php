<div style="margin-top:300px">


<x-app-layout>

    <div class="row">
        <div class="col-md-10 mx-auto">
        <div class="w3-container" style="background-color:#eeeeee; padding:3%;border-radius:10px;">
           <h3 class="text-uppercase" style="float:left">Creer un champ d'orientation </h3>
           <a href="{{ route('orientation.create') }}"><button class="w3-button" style="width:200px;margin-left:50px;background-color:#ab3793">+</button></a>
</div>
           
            <div>
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                       Les postes d'orientation
                    </h3>
                </div>
               
                <div class="card-body">
                    <table class="w3-table-all w3-card-4 w3-striped">
                        <thead>
                            <tr class="w3-pale-red"> 

                                <th>ID</th>
                                <th>Titre</th> 
                                <th>Branche de Bac</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            @foreach ($orientation as $key => $orientation)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>{{$orientation->title}}</td>
                                    <td>{{$orientation->bac}}</td>
                                       <td>
                                       
                      <form id="{{ $orientation->id}}" action="{{route('orientation.destroy',$orientation->slug)}}" method="post">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               <input type="hidden" name="_method" value="DELETE">
                               </form>
                               <button 
                               onclick="event.preventDefault();
                               if(confirm('etre vous sur'))
                               document.getElementById('{{ $orientation->id}}').submit();"
                                style=" background-color:rgb(77, 140, 186); border:none;border-radius: 30px;padding:10px;color:white;" type="submit">
                              
                              Supprimer </button>
                            </td>
                            <td>
                            <button  style=" background-color:rgb(77, 140, 186); border:none;border-radius: 30px;padding:10px;color:white;">
                             <a href="{{route('orientation.edit',$orientation->slug)}}"
                            > Modifier</a></button>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
</div>