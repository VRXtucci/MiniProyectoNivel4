<?php
namespace Database\Factories;

use App\Models\docentes;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriasFactory extends Factory
{
    public function definition()
    {
        $docentes = docentes::all();

        return [
            'nombre_materia' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'docente_id' => $this->faker->randomElement($docentes)->id,
        ];
    }
}
