<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires=Commentaire::orderBy('created_at','desc')->paginate(5);
        return view('admin.commentaires.index',['commentaires'=>$commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Commentaire=Commentaire::findOrFail($id);
        $Commentaire->delete();

        return redirect('commentaires');
    }

    public function search(Request $request)
    {
        $search=$request->get('search');
        $select=$request->get('select');
        $select2=$request->get('select2');
        if($select2 === 'les plus anciens')
        {
            if ( $select === 'Utilisateur')
            $commentaires=Commentaire::where('user_id','LIKE',  $search . '%')->paginate(5);
        else if($select === 'Livre')
            $commentaires=Commentaire::where('book_id','LIKE',  $search . '%')->paginate(5);
        else 
        $commentaires=Commentaire::paginate(5);
        }
        else{
            if ( $select === 'Utilisateur')
            $commentaires=Commentaire::where('user_id','LIKE',  $search . '%')->orderBy('created_at','desc')->paginate(5);
        else if($select === 'Livre')
            $commentaires=Commentaire::where('book_id','LIKE',  $search . '%')->orderBy('created_at','desc')->paginate(5);
        else 
        $commentaires=Commentaire::orderBy('created_at','desc')->paginate(5);
            
        }
        return view('admin.commentaires.index',['commentaires'=>$commentaires,'select' => $select,'select2' => $select2,'search' => $search]);
    }

    public function delete($id)
    {
        $Commentaire=Commentaire::findOrFail($id);
        $idb=$Commentaire->book_id;
        $Commentaire->delete();

        return redirect('/books/'.$idb.'/afficher');
    }

    
}
