<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\files;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Files::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'path' => $faker->filePath,
                'expire_at' => $faker->date,
                'url_id' => $faker->randomNumber(7, true),
            ]);
        }
    }
}
