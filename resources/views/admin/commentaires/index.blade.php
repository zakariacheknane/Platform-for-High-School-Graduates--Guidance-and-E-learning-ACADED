<x-app-layout>
    
    <div style="margin-top:300px">

    <div class="row">
        <div class="col-md-10 mx-auto">
           
            <div >
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                       Tous les Cours
                    </h3>
                </div> 
               
                <div class="card-body">
                    <table  class="w3-table-all w3-card-4 w3-striped">
                        <thead>
                            <tr class="w3-light-grey">
                                <th>ID</th>
                                <th>Utilisateur</th>
                                <th>Commentaire</th>
                                <th>Post</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            @foreach ($post as $key => $post)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>{{$post->user ? $post->user->name : Null}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->commentable_id}}</td>
                                   
                                       <td>
                                       
                <form id="{{ $post->id}}" action="{{route('comment.destroy',$post->id)}}" method="post">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               <input type="hidden" name="_method" value="DELETE">
                               </form>
                               <button 
                               onclick="event.preventDefault();
                               if(confirm('etre vous sur'))
                               document.getElementById('{{ $post->id}}').submit();"
                             style=" background-color:rgb(77, 140, 186); border:none;border-radius: 30px;padding:10px;color:white;" type="submit" >
                               Supprimer </button>
                            </td>

                            
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