<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            for ($i = 0; $i < 5; $i++) {
                $user = $users->random();
                $comment = new Comment();
                $comment->user_id = $user->id;
                $comment->post_id = $post->id;
                $comment->content = $faker->text(200);
                $comment->status = $faker->randomElement(['pending', 'approved', 'rejected']);
                $comment->save();
            }
        }

        for ($i = 0; $i < 80; $i++) {
            $user = $users->random();
            $post = $posts->random();
            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->post_id = $post->id;
            $comment->content = $faker->text(200);
            $comment->status = $faker->randomElement(['pending', 'approved', 'rejected']);
            $comment->save();
        }
    }
}
