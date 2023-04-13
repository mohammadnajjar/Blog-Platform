<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($posts as $post) {
            $randomCount = random_int(1, 3);
            $randomTags = $tags->random($randomCount)->pluck('id');
            $post->tags()->attach($randomTags);
        }
    }
}
