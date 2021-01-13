<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'address',
        'date_naissence',
        'genre',
        'email',
        'tele',
    ];
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
