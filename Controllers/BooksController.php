<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Commentaire;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;


class BooksController extends Controller
{
    public function index(){

        $books=Book::paginate(5);
        return view('admin.books.livres',['books'=>$books]);
    }

    public function show($id){

        $book = Book::find($id);
        return view('books.books-details',['id'=>$book]);
    }

    public function create(){
        return view('admin.books.create');
    }
    
    public function store(Request $request){

        $request->validate(['fiche'=>'required']);
        $request->validate(['title'=>'required']);
        $request->validate(['auteur'=>'required']);
        $request->validate(['auteur'=>'required']);
        $request->validate(['maisonEd'=>'required']);
        $request->validate(['type'=>'required']);
        $request->validate(['quantity'=>'required']);
        $request->validate(['description'=>'required']);


        $imageName = time().'.'.$request->fiche->extension();  
     
        $request->fiche->move(public_path('booksimages'), $imageName);

        $book = new Book();

         
        $book -> fiche = $imageName;


        $book -> title = $request->input('title');
        $book -> auteur = $request->input('auteur');
        $book -> maisonEd = $request->input('maisonEd');
        $book -> edition = $request->input('edition');
        $book -> type = $request->input('type');
        $book -> quantity = $request->input('quantity');
        $book -> description = $request->input('description');

        $book->save();
        
        $request->session()->flash('status','la tâche a réussi!');

        return redirect('books');       
    }
    public function edit($id){
        $book= Book::findOrFail($id);
        return view('admin.books.edit',['book'=>$book]);
    }

    public function update(Request $request,$id){
        $request->validate(['title'=>'required']);
        $request->validate(['auteur'=>'required']);
        $request->validate(['maisonEd'=>'required']);
        $request->validate(['edition'=>'required']);
        $request->validate(['type'=>'required']);
        $request->validate(['quantity'=>'required']);
        
        
       

        $book=Book::findOrFail($id);
        
        
        $book -> fiche = $book->fiche;

        $book -> title = $request->input('title');
        $book -> auteur = $request->input('auteur');
        $book -> maisonEd = $request->input('maisonEd');
        $book -> edition = $request->input('edition');
        $book -> type = $request->input('type');
        $book -> quantity = $request->input('quantity');

        $book->update();

        $request->session()->flash('status','la tâche a réussi!');

        return redirect('books');
    }
    public function delete(Request $request,$id){
        $book=Book::findOrFail($id);
        unlink(public_path('booksimages').'/'.$book->fiche);
        $book->delete();

        $request->session()->flash('status','la suppression a réussi!');
        
        return redirect('books');
    }

    public function reserver(Request $request,$id)
    {
        $idu = Auth::id();
        $Reservations= Reservation::where([['user_id',$idu],['status','!=',"RENDU"]]);
        $Reservations2=Reservation::where([['user_id',$idu],['book_id',$id],['status','!=',"RENDU"]]);
        $book=Book::findOrFail($id);
        $Reservations3=Reservation::where([['book_id',$id],['status','!=',"RENDU"]]);
        $Reservations4=Reservation::where([['created_at', '<', Carbon::now()->subDays(7)],['status',"EN ATTENTE"]]);
        $Reservations4->delete();
        if($Reservations->count() < 3 && $book->quantity > 1 && $Reservations2->count() < 1 && $Reservations3->count() < $book->quantity )
        {
        $reservation = new Reservation();
        
        $reservation -> user_id = $idu;
        $reservation -> book_id = $id;
        $reservation -> status = "EN ATTENTE";
        $reservation->save();

        $request->session()->flash('status1','vous avez bien réserver ce livre!');
        return view('confirmation',['book'=>$book,'reservation'=>$reservation]);
        }
        else
        {
        
        $request->session()->flash('status2','vous avez atteint la limite');
        
        return redirect('books/'.$id.'/afficher');
        }

        
    }

    public function annuler(Request $request,$id)
    {
        $idu = Auth::id();
        $reservation =Reservation::where([['user_id',$idu],['book_id',$id]]);
        
        $reservation->delete();
        $request->session()->flash('status1','vous avez bien annuler la réservation !');

        return redirect('books/'.$id.'/afficher');

        
    }

    public function admin(){

        $books=Book::all()->count();
        $commentaires=Commentaire::all()->count();
        $reservations=Reservation::where('status','!=',"RENDU")->count();
        return view('admin.admin',['books'=>$books,'commentaires'=>$commentaires,'reservations'=>$reservations]);
    }

    public function search(Request $request)
    {

        $search=$request->get('search');
        $select=$request->get('select');
        if ( $select === 'Titre')
        {
        $books=Book::where('title', 'LIKE', '%' . $search . '%')->paginate(9);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Auteur')
        {
        $books=Book::where('auteur', 'LIKE', '%' . $search . '%')->paginate(9);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Type')
        {
        $books=Book::where('type', 'LIKE',  $search . '%')->paginate(9);
        $request->session()->flash('status','voici le résultat!');
        }
        else 
        $books=Book::paginate(9);
        
        //return view('books.books',['books'=>$books]);
        return view('books.search',['books'=>$books,'select'=>$select,'search'=>$search]);
    }

    public function type(Request $request,$id)
    {
        $books=Book::where('type',$id)->paginate(9);
        
        $request->session()->flash('status','voici le résultat!');
        //return view('books.books',['books'=>$books]);
        return view('books.search',['books'=>$books]);
    }
    
    public function afficher($id){
        $idu = Auth::id();
        $book= Book::findOrFail($id);
        $user= User::findOrFail($idu);
        $commentaires= Commentaire::where('book_id',$id)->get();
        $reservation= Reservation::where([['user_id',$idu],['book_id',$id],['status','!=',"RENDU"]]);
        if($reservation->count() > 0)
        $res=1;
        else
        $res=0;
        $commentaires2=Commentaire::where([['user_id',$idu],['book_id',$id]]);
        if($commentaires2->count() > 0)
        $true=1;
        else
        $true=0;
        return view('books.afficher',['book'=>$book,'user'=>$user,'commentaires'=>$commentaires,'res'=>$res,'true'=>$true]);
    }

    public function welcome(){

        $books=Book::all();
        
        return view('welcome',['books'=>$books]);
    }

    public function chercher(Request $request)
    {

        $search=$request->get('search');
        $select=$request->get('select');
        $select2=$request->get('select2');
        if($select2 === 'les plus récents')
        {
        if ( $select === 'Titre')
        {
        $books=Book::where('title', 'LIKE', '%' . $search . '%')->orderBy('id','desc')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Auteur')
        {
        $books=Book::where('auteur', 'LIKE', '%' . $search . '%')->orderBy('id','desc')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Type')
        {
        $books=Book::where('type', 'LIKE',  $search . '%')->orderBy('id','desc')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else 
        $books=Book::orderBy('id','desc')->paginate(5);
        }
        else
        {
            if ( $select === 'Titre')
        {
        $books=Book::where('title', 'LIKE', '%' . $search . '%')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Auteur')
        {
        $books=Book::where('auteur', 'LIKE', '%' . $search . '%')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else if($select === 'Type')
        {
        $books=Book::where('type', 'LIKE',  $search . '%')->paginate(5);
        $request->session()->flash('status','voici le résultat!');
        }
        else 
        $books=Book::paginate(5);
        }
        //return view('books.books',['books'=>$books]);
        return view('admin.books.livres',['books'=>$books,'select' => $select,'select2' => $select2,'search' => $search]);
    }
    public function ajouter(Request $request,$id)
    {
        $request->validate(['commentaire'=>'required']);
        $idu = Auth::id();
        $user= User::findOrFail($idu);
        $commentaires2=Commentaire::where([['user_id',$idu],['book_id',$id]]);
        if($commentaires2->count() < 1)
        {   
            $commentaire=new Commentaire();
            $commentaire->user_id =$idu;
            $commentaire->book_id =$id;
            $commentaire->user_name=$user->name;
            $commentaire->user_email=$user->email;
            $commentaire->commentaire=$request->input('commentaire');
            $commentaire->save(); 
        }

        return redirect('books/'.$id.'/afficher');

    }

    public function stat(){

        return view('stat');
    }

    public function book($id)
    {
        $book=Book::findOrFail($id);
        return view('admin.books.book',['book'=>$book]);
    }

    public function user($id)
    {
        $user= User::findOrFail($id);
        return view('admin.books.user',['user'=>$user]);
    }

    public function pdf($id){
        $reservation = Reservation::findOrFail($id);
        $book = Book::findOrfail($reservation->book_id);
        $user= User::findOrfail($reservation->user_id);
        view()->share(compact('reservation', 'book','user'));
        $pdf = PDF::loadView('pdf',compact('reservation', 'book','user'));

        return $pdf->download('reçu.pdf');
    }
    
    public function supprimer($id)
{
    $book = Book::findOrFail($id);

    return view('admin.books.delete',['book'=>$book]);
}

}
