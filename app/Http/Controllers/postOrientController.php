<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\post_orientation;
use Illuminate\Support\Facades\Gate; 
class postOrientController extends Controller
{
    public function create()   
    {
        if (Gate::denies('manage-users')) {
            abort(403);
        }
        return view('orientation.create_orientation');
       
    }
    public function allorient()
    {        if (Gate::denies('manage-users')) {
        abort(403);
    }
        $orientation = post_orientation::all();
      return view('admin.orientation.allorient') ->with([
            'orientation' => $orientation
        ]);
        
    }
    public function show($slug){
  
        $post = post_orientation::where('slug',$slug)->first();
        return view('orientation.afficher_orient')->with(['post'=>$post]);
    }
    
public function type(Request $request,$id)
  {
      $post=post_orientation::where('bac',$id)->paginate(9);
      
      $request->session()->flash('status','voici le résultat!');
      //return view('books.books',['books'=>$books]);
      return view('orientation.orientation2',['post'=>$post]);
  }
  public function store(Request $request)
  {
    if (Gate::denies('manage-users')) {
        abort(403);
    }
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'image|mimes:png,jpg,jpeg,pdf,txt|max:2048',
          'bac' => 'required|min:0|max:20',
          'link' => 'required|min:0|max:20',
      ]);
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('uploads'), $image_name);
      }
      post_orientation::create([
          'title' => $request->title,
          'description' => $request->description,
          'slug' => Str::slug($request->title),
          'image' => $image_name,
          'user_id'=>auth()->user()->id,
          'bac' => $request->bac,
          'link' => $request->link,
      ]);
      $orientation = post_orientation::all();
      return view('admin.orientation.allorient') ->with([
            'orientation' => $orientation
        ]);
        
  }
  public function edit($slug)
  {        if (Gate::denies('manage-users')) {
    abort(403);
}
      $post = post_orientation::where('slug', $slug)->first();
        /**
   * Update the given blog post.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\post_orientation  $post
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */

      return view('orientation.edit_orientation')->with([
          'post' => $post
      ]);
  }
  public function update(Request $request, $slug)
  {
    if (Gate::denies('manage-users')) {
        abort(403);
    }
      $this->validate($request, [
          'title' => 'required|min:0|max:20',
          'description' => 'required|min:0|max:1000',
          'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
          'bac' => 'required|min:0|max:20',
          'link' => 'required|min:0|max:20',
      ]);
      $post = post_orientation::where('slug', $slug)->first();
      /**
   * Update the given blog post.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\post_orientation  $post
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */
      
      if ($request->has('image')) {
          $file = $request->image;
          $image_name = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('uploads'), $image_name);
          unlink(public_path('uploads') . '/' . $post->image);
          $post->image = $image_name; 
      }
      $post->update([
          'title' => $request->title,
          'description' => $request->description,
          'slug' => Str::slug($request->title),
          'image' => $image_name,
          'user_id'=>auth()->user()->id,
          'bac' => $request->bac,
          'link' => $request->link,
      ]);
      $orientation = post_orientation::all();
      return view('admin.orientation.allorient') ->with([
            'orientation' => $orientation
        ]);
  }
/**
  *Delete the given blog post.
  *
  
  * @param  \App\Models\post_orientation  $post
  * @return \Illuminate\Http\Response
  *
  * @throws \Illuminate\Auth\Access\AuthorizationException
  */
  public function destroy($slug)
  {        if (Gate::denies('manage-users')) {
    abort(403);
}
      $post = post_orientation::withTrashed()->where('slug', $slug)->first();
      if(file_exists(public_path('./uploads').$post->image)){
          unlink(public_path('uploads') . '/' . $post->image); 
      }
  
      $post->forceDelete();
      return view('admin.orientation.allorient')->with([
          'success' => 'post supprime definitivment'
      ]);
  }
  /**
  * Destroy the given blog post.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\post_orientation  $post
  * @return \Illuminate\Http\Response
  *
  * @throws \Illuminate\Auth\Access\AuthorizationException
  */
  public function delete($slug)
  {        if (Gate::denies('manage-users')) {
    abort(403);
}
      $post = post_orientation::where('slug', $slug)->first();
      if(file_exists(public_path('./uploads').$post->image)){
          unlink(public_path('uploads') . '/' . $post->image); 
      }
  
      $post->delete();
      return view('orientation.orientation2')->with([
          'success' => 'post supprime'
      ]);
  }
  /**
  * Restore the given blog post.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\post_orientation  $post

  
  */
  public function restore($slug)
  {        if (Gate::denies('manage-users')) {
    abort(403);
}
      $post = post_orientation::withTrashed()->where('slug', $slug)->first();
     
   $post->restore();
      return view('orientation.orientation2')->with([
          'success' => 'post recupere'
      ]);
  }

}