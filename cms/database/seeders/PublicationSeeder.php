<?php

namespace Database\Seeders; // Agrega el namespace correcto

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PublicationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $now = Carbon::now();

        // Crear 50 publicaciones
        for ($i = 0; $i < 50; $i++) {
            DB::table('publications')->insert([
                'title' => $faker->text(40),
                'content' => $faker->paragraphs(3, true),
                'image' => $faker->imageUrl(640, 480, 'nature'),
                'fecha_creacion' => $now,
                'fecha_publicacion' => $now->addDays(rand(0, 90))->format('Y-m-d H:i:s'),
                'categoria' => $faker->word,
                'estado' => $faker->randomElement(['borrador', 'publicado', 'programado']),
                'users_idusers' => rand(1, 2),
            ]);
        }
    }
}
