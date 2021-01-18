<?php

namespace Database\Factories;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatiereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matiere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $matieres = ['maths', 'physic', 'geo', 'science', 'algebre', 'other'];
        return [
            'nom' => $this->faker->randomElement($matieres),
            'prix' => ($this->faker->randomDigit + 1) * 10,
        ];
    }
}
