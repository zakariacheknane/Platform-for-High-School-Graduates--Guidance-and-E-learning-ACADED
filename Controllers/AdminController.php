<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Commentaire;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){

        $books=Book::all()->count();
        $commentaires=Commentaire::all()->count();
        $reservations=Reservation::where('status','!=',"RENDU")->count();
        return view('admin.admin',['books'=>$books,'commentaires'=>$commentaires,'reservations'=>$reservations]);
    }

   

    public function logout(){
        Auth::logout();
        
       
        return redirect()->route('admin.login'); 
    }
}