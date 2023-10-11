<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;

class Homecontroller extends Controller
{
    public function index(){

        return view('HOME');
    }

    public function orientation()
    {
        return view('orientation.orientation');
    }

    public function cours()
    {
        return view('cours.cours');
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        $user = User::all();
      return view('contact') ->with([
            'user' => $user
        ]);
        
    }
    
}
