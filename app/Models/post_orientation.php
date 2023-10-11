<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class post_orientation extends Model
{
    use HasFactory;
    use SoftDeletes;
        protected $fillable =['title','description','image','slug','bac','link'];
        public function getRouteKeyName()
        {
            return 'slug';
        }
        public function user(){
         return   $this->belongsTo(User::class);
        }
    }

