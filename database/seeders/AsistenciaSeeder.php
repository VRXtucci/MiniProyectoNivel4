<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asistencia;

class AsistenciaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Asistencia::factory(10)->create();
    }
}
