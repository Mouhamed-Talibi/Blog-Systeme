<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Techerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert(
        [
                    'user_name' => 'Achraf talibi',
                    'role' => 'student',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        );
    }
}
