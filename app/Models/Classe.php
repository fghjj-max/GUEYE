<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['nom_classes'];



    // une classe est lier a plusieurs etudiants
    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }

    // une classe est lier a plusieur professeur
    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class, 'professeurs_classes');
    }
    public function emploie()
    {
        return $this->belongsToMany(Emploie::class,'emploie_classes');
    }
}
