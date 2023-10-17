<?php

namespace Database\Factories;

use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    public function definition()
    {
        return [
            'alumno_id' => \App\Models\alumnos::factory(), // Generar un alumno aleatorio
            'materia_id' => \App\Models\materias::factory(), // Generar una materia aleatoria
        ];
    }
}
