<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom_etudiant', 'prenom_etudiant', 'email_etudiant', 'telephone_etudiant', 'dateNaissance_etudiant'];


    // un etudiant est lier a une seul classe
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
