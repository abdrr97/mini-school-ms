<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'address',
        'gender',
        'birth_date',
        'email',
        'parent_full_name',
        'parent_phone',
    ];

    // public function matieres()
    // {
    //     return $this->hasMany(Matiere::class);
    // }
}
