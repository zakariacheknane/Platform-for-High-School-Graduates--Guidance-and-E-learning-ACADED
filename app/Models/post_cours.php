<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class post_cours extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['title','description','image', 'user_id','slug','file','matiere'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
     return   $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

}
