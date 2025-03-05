<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploie extends Model
{
    use HasFactory;
    protected $fillable = ['jour','HeureDebut', 'heureFin',  ];

    public function classe()
    {
        return $this->belongsToMany(Classe::class);
    }
    public function professeur()
    {
        return $this->belongsToMany(Professeur::class);
    }
    public function cour()
    {
        return $this->belongsToMany(Cour::class);
    }

}
