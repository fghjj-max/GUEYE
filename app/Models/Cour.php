<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $fillable = ['nom_cours'];

    // un Cours est lie a plusieur professeur
    public function professeur(){
        return $this->belongsToMany(Professeur::class,'professeurs_cours');
    }

    public function emploie()
    {
        return $this->belongsToMany(Emploie::class);
    }
}
