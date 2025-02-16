<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PublicationSeeder; // Importa PublicationSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PublicationSeeder::class,
        ]);
    }
}
