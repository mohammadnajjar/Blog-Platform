<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();

        for ($i = 1; $i <= 20; $i++) {
            $user = $users->random();

            Post::create([
                'title' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'user_id' => $user->id
            ]);
        }
    }
}

