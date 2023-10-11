<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['titre','description','image','slug','delai'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
     return   $this->belongsTo(User::class);
    }
}
