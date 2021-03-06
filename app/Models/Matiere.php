<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
    ];

    public function professeurs()
    {
        return $this->hasMany(Professeur::class);
    }

    public function etudiants()
    {
        return $this
            ->belongsToMany(Etudiant::class)
            ->withTimestamps()
            ->as('matiere_etudiant');
    }
}
