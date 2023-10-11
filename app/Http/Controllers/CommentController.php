<?php

namespace App\Http\Controllers;
use App\Models\post_cours;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request)
  {
      $comment = new Comment;
      $comment->body = $request->get('comment_body');
      $comment->user()->associate($request->user());
      $post = post_cours::find($request->get('post_id'));
      $post->comments()->save($comment);

      return back();
  }
  public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = post_cours::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
    public function destroy($id)
    {
        $post = Comment::withTrashed()->where('id', $id)->first();
    
        $post->forceDelete();
        return redirect()->route('profile.show')->with([
            'success' => 'article supprime definitivment'
        ]);
    }
    public function allcomments()
    {
        $post = Comment::all();
      return view('admin.commentaires.index') ->with([
            'post' => $post
        ]);
        
    }
}