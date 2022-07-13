<?php

namespace Database\Seeders;

use App\Models\Dir;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create()->each(function ($user){
            Dir::factory(rand(2,4))->create([
                'user_id' => $user->id
            ])->each(function ($dir){
                Note::factory(rand(2,12))->create([
                    'dir_id' => $dir->id
                ]);
            });
        });

//        User::factory()
//            ->count(50)
//            ->create();
    }
}
