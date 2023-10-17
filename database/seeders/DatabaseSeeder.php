<?php

use Database\Seeders\DocentesSeeder;
use Database\Seeders\AlumnosSeeder;
use Database\Seeders\AsistenciaSeeder;
use Database\Seeders\MateriasSeeder;
use Database\Seeders\MatriculaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DocentesSeeder::class);
        $this->call(AlumnosSeeder::class);
        $this->call(MateriasSeeder::class);
        $this->call(MatriculaSeeder::class); 
        $this->call(AsistenciaSeeder::class);
        
    }
}

