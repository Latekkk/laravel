<?php

namespace Database\Seeders;

use App\Models\Dir;
use Illuminate\Database\Seeder;

class DirSeeder extends Seeder
{


    protected $model = Dir::class;
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
