<?php

namespace Database\Seeders;

use App\Models\Dir;
use Illuminate\Database\Seeder;

class DirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dir::factory()
            ->count(5)
            ->create();
    }
}
