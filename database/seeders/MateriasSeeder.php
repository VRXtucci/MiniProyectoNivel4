<?php

namespace Database\Seeders;

use App\Models\Docentes;
use App\Models\Materias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    public function run(): void
    {
        $docente = Docentes::factory()->create();
        Materias::factory()->create([
            'docente_id' => $docente->id,
        ]);
    }
}
