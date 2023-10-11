<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\post_cours;
use Illuminate\Support\Facades\Gate;
use App\Models\user;
class postCoursController extends Controller
{
    
    public function create()
    { if (Gate::denies('manage-courses')) {
        abort(403);
    }   
        return view('cours.create_cours');
       
    }
    
    public function view($id)
    {
        $post = post_cours::where('id',$id)->first();
      return view('cours.view') ->with([
            'post' => $post
        ]);
        
    }
    public function allcours()
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        $cours = post_cours::all();
      return view('admin.cours.allcours') ->with([
            'cours' => $cours
        ]);
        
    }
    public function mycourses()
    {
        if (Gate::denies('manage-courses')) {
            abort(403);
        }
        $cours = post_cours::all();
      return view('teacher.courses.mycourses') ->with([
            'cours' => $cours
        ]);
        
}
public function download(Request $request,$file){


    return response()->download(public_path('files/'.$file));
}

    public function show($slug){

        $post = post_cours::where('slug',$slug)->first();
        return view('cours.afficher_cours')->with(['post'=>$post]);
    }
    public function cours($slug)
    {
        return view('cours.cours');
    }
    public function type(Request $request,$id)
  {
      $post=post_cours::where('matiere',$id)->paginate(9);
      
      $request->session()->flash('status','voici le résultat!');
      //return view('books.books',['books'=>$books]);
      return view('cours.cours2',['post'=>$post]);
  }
  public function store(Request $request)
  {
    if (Gate::denies('manage-courses')) {
        abort(403);
    }
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'image|mimes:png,jpg,jpeg,pdf,txt|max:2048',
          'matiere' => 'required|min:0|max:20',
      ]);
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('ploads'), $image_name);
      }
      if ($request->has('file')) {
        $file = $request->file;
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('files', $file_name);
    }
      post_cours::create([
          'title' => $request->title,
          'description' => $request->description,
          'slug' => Str::slug($request->title),
          'image' => $image_name,
          'user_id'=>auth()->user()->id,
          'matiere' => $request->matiere,
          'file' => $file_name,
      
      ]);
      $cours = post_cours::all();
      return view('admin.cours.allcours') ->with([
            'cours' => $cours
        ]);
  }
  public function storet(Request $request)
  {
    if (Gate::denies('manage-courses')) {
        abort(403);
    }
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'image|mimes:png,jpg,jpeg,pdf,txt|max:2048',
          'matiere' => 'required|min:0|max:20',
      ]);
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('ploads'), $image_name);
      }
      if ($request->has('file')) {
        $file = $request->file;
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('files', $file_name);
    }
      post_cours::create([
          'title' => $request->title,
          'description' => $request->description,
          'slug' => Str::slug($request->title),
          'image' => $image_name,
          'user_id'=>auth()->user()->id,
          'matiere' => $request->matiere,
          'file' => $file_name,
      
      ]);
      $cours = post_cours::all();
      return view('teacher.courses.mycourses') ->with([
            'cours' => $cours
        ]);
  }
  public function edit($slug)
  {  if (Gate::denies('manage-courses')) {
    abort(403);
}
       
      $post = post_cours::where('slug', $slug)->first();
        /**
   * Update the given blog post.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\post_cours  $post
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */

      return view('cours.edit_cours')->with([
          'post' => $post
      ]);
  }
 
  public function update(Request $request, $slug)
  {   if (Gate::denies('manage-users')) {
    abort(403);
}
     
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'image|mimes:png,jpg,jpeg,pdf,txt|max:2048',
         
          'matiere' => 'required|min:0|max:20',
      ]);
      $post = post_cours::where('slug', $slug)->first();
      /**
   * Update the given blog post. 
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\post_cours  $post
   * 
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */
     
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('ploads'), $image_name);
          unlink(public_path('ploads') . '/' . $post->image);
          $post->image = $image_name;
      }
      if ($request->has('file')) {
        $file = $request->file;
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('files'), $file_name);
        unlink(public_path('files') . '/' . $post->file);
        $post->file = $file_name;
    }
      $post->update([
        'title' => $request->title,
        'description' => $request->description,
        'slug' => Str::slug($request->title),
        'image' => $image_name,
        'file'=>$file_name,
        'user_id'=>auth()->user()->id,
        'matiere' => $request->matiere,
        'file' => $file_name,
      ]);
      $cours = post_cours::all();
      return view('admin.cours.allcours') ->with([
            'cours' => $cours
        ]);
  }




  public function updatet(Request $request, $slug)
  {   if (Gate::denies('manage-courses')) {
    abort(403);
}
     
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'image|mimes:png,jpg,jpeg,pdf,txt|max:2048',
         
          'matiere' => 'required|min:0|max:20',
      ]);
      $post = post_cours::where('slug', $slug)->first();
      /**
   * Update the given blog post. 
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\post_cours  $post
   * 
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */
     
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('ploads'), $image_name);
          unlink(public_path('ploads') . '/' . $post->image);
          $post->image = $image_name;
      }
      if ($request->has('file')) {
        $file = $request->file;
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('files'), $file_name);
        unlink(public_path('files') . '/' . $post->file);
        $post->file = $file_name;
    }
      $post->update([
        'title' => $request->title,
        'description' => $request->description,
        'slug' => Str::slug($request->title),
        'image' => $image_name,
        'file'=>$file_name,
        'user_id'=>auth()->user()->id,
        'matiere' => $request->matiere,
        'file' => $file_name,
      ]);
      $cours = post_cours::all();
      return view('teacher.courses.mycourses') ->with([
            'cours' => $cours
        ]);
  }
/**
  *Delete the given blog post.
  *
  
  * @param  \App\Models\post_cours  $post
  * @return \Illuminate\Http\Response
  *
  * @throws \Illuminate\Auth\Access\AuthorizationException
  */
  public function destroy($slug)
  {   if (Gate::denies('manage-courses')) {
    abort(403);
}
      $post = post_cours::withTrashed()->where('slug', $slug)->first();
      if(file_exists(public_path('./uploads').$post->image)){
          unlink(public_path('uploads') . '/' . $post->image); 
      }
      if(file_exists(public_path('./uploads').$post->file)){
        unlink(public_path('uploads') . '/' . $post->file); 
    }
  
      $post->forceDelete();
      return redirect()->route('admin.cours.allcours')->with([
          'success' => 'article supprime definitivment'
      ]);
  }
  /**
  * Destroy the given blog post.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\post_cours  $post
  * @return \Illuminate\Http\Response
  *
  * @throws \Illuminate\Auth\Access\AuthorizationException
  */
  public function delete($slug)
  {    if (Gate::denies('manage-courses')) {
    abort(403);
}
      $post = post_cours::where('slug', $slug)->first();
      if(file_exists(public_path('./uploads').$post->image)){
          unlink(public_path('uploads') . '/' . $post->image); 
      }
      if(file_exists(public_path('./uploads').$post->file)){
        unlink(public_path('uploads') . '/' . $post->file); 
    }
      $post->delete();
      return redirect()->route('profile.show')->with([
          'success' => 'cours supprime'
      ]);
  }
  /**
  * Restore the given blog post.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\post_cours $post

  
  */
  public function restore($slug)
  {   if (Gate::denies('manage-courses')) {
    abort(403);
}
      $post = post_cours::withTrashed()->where('slug', $slug)->first();
     
   $post->restore();
      return redirect()->route('profile.show')->with([
          'success' => 'cours recupere'
      ]);
  }


}
