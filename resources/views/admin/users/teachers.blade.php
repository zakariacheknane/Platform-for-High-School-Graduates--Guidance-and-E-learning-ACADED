<div style="margin-top:300px">
<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers List') }}
        </h2>
    </x-slot> 



    <div class="row">
        <div class="col-md-10 mx-auto">
           
            <div class="card my-3">
                <div class="card-header">
                    <h3 class="text-center text-uppercase">
                        Utilisateurs
                    </h3>
                </div>
               
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom et Prenom</th>
                                <th>email</th>
                                <th>specialite</th> 
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>  
                             
                            @foreach ($user as $key => $user)
                            @if ($user->role_id == 3)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->teacher_speciality}}</td>
                                       <td>
                                       
                                       <form id="{{ $user->id}}" action="{{route('teacher.destroyt',$user->id)}}" method="post">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               <input type="hidden" name="_method" value="DELETE">
                               </form>
                               <button 
                               onclick="event.preventDefault();
                               if(confirm('etre vous sur'))
                               document.getElementById('{{ $user->id}}').submit();"
                                style="background-color:rgb(77, 140, 186); border:none;border-radius: 30px;padding:10px;color:white;" type="submit">
                              
                              Supprimer </button>
                            </td>
                                </tr> @endif
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
</div>