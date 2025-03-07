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
        return $this->belongsToMany(Cour::class,'professeurs_cours');
    }
    // un professeur est lier a plusieur classe
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'professeurs_classes');
    }
    // un professeur est lier a un seul emploie tu temp
    public function emploies()
    {
        return $this->belongsToMany(Emploie::class,'emploie_professeurs');
    }
}
