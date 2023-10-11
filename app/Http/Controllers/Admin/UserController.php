<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function teachers()
    { 
        if (Gate::denies('manage-users')) {
        abort(403);
    }
        
        $user = User::all();
      return view('admin.users.teachers') ->with([
            'user' => $user
        ]);
        
    }
    public function students()
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        $user = User::all();
      return view('admin.users.students') ->with([
            'user' => $user
        ]);
        
    }
    public function destroys($id)
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route("admin.users.students")->with([
            "success" => "Utilisateur supprimé avec succès"
        ]);
    }
    public function destroyt($id)
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route("admin.users.teachers")->with([
            "success" => "Utilisateur supprimé avec succès"
        ]);
    }
    public function settings(){
        return view('profile.settings');
    }
    public function index()
    {
        return view('admin.index');
    }

}