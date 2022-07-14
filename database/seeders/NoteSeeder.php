<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{

    protected $model = Note::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::factory()
            ->count(12)
            ->create();
    }
}
