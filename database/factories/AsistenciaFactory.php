<?php

namespace Database\Factories;

use App\Models\Asistencia;
use App\Models\Alumnos;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsistenciaFactory extends Factory
{
    protected $model = Asistencia::class;

    public function definition()
    {
        return [
            'alumno_id' => function () {
                return Alumnos::factory()->create()->id;
            },
            'matricula_id' => function () {
                return Matricula::factory()->create()->id;
            },
            'fecha' => $this->faker->date,
            'Asistencia' => $this->faker->randomElement(['A', 'T', 'F']),
        ];
    }
}
