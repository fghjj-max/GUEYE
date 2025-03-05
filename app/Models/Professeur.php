<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    protected $fillable = ['nom_professeur', 'prenom_professeur', 'email_professeur','telephone_professeur'];


    // un professeur est lier a plusieur cours
    public function cours(){
        return $this->belongsToMany(Cour::class);
    }
    // un professeur est lier a plusieur classe
    public function classe(){
        return $this->belongsToMany(Classe::class);
    }
    // un professeur est lier a un seul emploie tu temp
    public function emploie()
    {
        return $this->belongsToMany(Emploie::class);
    }
}
