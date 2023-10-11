<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Commentaire;

class book extends Model
{
    use HasFactory;
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class); 
    }

    protected $table="books";
}
