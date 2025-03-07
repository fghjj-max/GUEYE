<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploie extends Model
{
    use HasFactory;
    protected $fillable = ['jour','heureDebut', 'heureFin',  ];

    public function classes()
    {
        return $this->belongsToMany(Classe::class,'emploie_classes');
    }
    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class,'emploie_professeurs');
    }
    public function cour()
    {
        return $this->belongsToMany(Cour::class);
    }

}
