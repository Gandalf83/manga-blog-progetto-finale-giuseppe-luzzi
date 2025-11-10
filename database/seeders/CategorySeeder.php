<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Shonen'],
            ['name' => 'Shojo'],
            ['name' => 'Seinen'],
            ['name' => 'Josei'],
            ['name' => 'Kodomo'],
        ]);
    }
}
