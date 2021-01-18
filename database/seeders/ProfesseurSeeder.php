<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Etudiant::factory()->count(30)->create();

        for ($i = 0; $i < 10; $i++)
        {
            Professeur::factory()->count(1)->for(
                Matiere::factory()->create()
            )->create();
        }

        foreach (Matiere::all() as $matiere)
        {
            $etudiant = Etudiant::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $matiere->etudiants()->attach($etudiant);
        }
    }
}
