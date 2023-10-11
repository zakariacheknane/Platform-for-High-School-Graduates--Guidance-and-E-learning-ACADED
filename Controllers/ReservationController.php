<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=Reservation::orderBy('created_at','desc')->paginate(5);
        return view('admin.reservations.index',['reservations'=>$reservations]);
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
    public function edit(Request $request,$id)
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
        $Reservation=Reservation::findOrFail($id);
        if($Reservation->status != 'CONFIRMÉ')
        $Reservation->delete();

        return redirect('reservations');
    }

    public function confirmer(Request $request,$id)
    {
        $Reservation=Reservation::findOrFail($id);
        $book_id=$Reservation->book_id;
        $book=Book::findOrFail($book_id);
        if($Reservation->status=="EN ATTENTE" && $book->quantity > 1)
        {
        
        $book->quantity=$book->quantity-1;

        $Reservation->status = "CONFIRMÉ";

        $Reservation->update();
        $book->update();

        $request->session()->flash('status','task was succesful!');
        }
        return redirect('reservations');
    }

    public function rendu(Request $request,$id)
    {
        $Reservation=Reservation::findOrFail($id);
        if($Reservation->status=="CONFIRMÉ")
        {
        $book_id=$Reservation->book_id;
        $book=Book::findOrFail($book_id);
        $book->quantity=$book->quantity+1;

        $Reservation->status = "RENDU";

        $Reservation->update();
        $book->update();

        $request->session()->flash('status','task was succesful!');
        }
        return redirect('reservations');
    }

    public function search(Request $request)
    {
        
        $search=$request->get('search');
        $select=$request->get('select');
        $select2=$request->get('select2');
        
        if($select2 === 'les plus récents')
        {
            if($select === 'Utilisateur')
            $reservations=Reservation::where('user_id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Livre')
            $reservations=Reservation::where('book_id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Réservation')
            $reservations=Reservation::where('id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Statut')
            $reservations=Reservation::where('status','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else
            $reservations=Reservation::orderBy('created_at','desc')->paginate(5);
        }
        else if($select2 === 'les plus anciens')
        {
            if($select === 'Utilisateur')
            $reservations=Reservation::where('user_id','LIKE', $search . '%')->paginate(5);
            else if($select === 'Livre')
            $reservations=Reservation::where('book_id','LIKE', $search . '%')->paginate(5);
            else if($select === 'Réservation')
            $reservations=Reservation::where('id','LIKE', $search . '%')->paginate(5);
            else if($select === 'Statut')
            $reservations=Reservation::where('status','LIKE', $search . '%')->paginate(5);
            else
            $reservations=Reservation::paginate(5);
        }
        else
        {
            if($select === 'Utilisateur')
            $reservations=Reservation::where('user_id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Livre')
            $reservations=Reservation::where('book_id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Réservation')
            $reservations=Reservation::where('id','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else if($select === 'Statut')
            $reservations=Reservation::where('status','LIKE', $search . '%')->orderBy('created_at','desc')->paginate(5);
            else
            $reservations=Reservation::orderBy('created_at','desc')->paginate(5);
        }

        return view('admin.reservations.index',['reservations'=>$reservations,'select' => $select,'select2' => $select2,'search' => $search]);
    }

    public function afficher($id)
    {   $reservations=Reservation::where([['user_id',$id],['status','!=',"RENDU"]]);
        if($reservations->count() > 0)
        {$reservations=$reservations->orderBy('created_at','desc')->paginate(5);
        
        return view('reservations.afficher',['reservations'=>$reservations]);}
        else
        return redirect('/');
    }

    public function supprimer($id)
    {
        $Reservation=Reservation::findOrFail($id);
        if($Reservation->status == 'EN ATTENTE')
           { $Reservation->delete();}
        $idu = Auth::id();
        return redirect('reservations/'.$idu.'/afficher');
    }
}
