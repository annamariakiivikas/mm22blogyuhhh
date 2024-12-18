<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(20)->create();
        $posts = Post::select('id')->get();
        foreach($posts as $post){
            //DB::table('post_tag')->insert(['post_id' => $post->id, 'tag_id' => ]);
            $randTags = $tags->random(rand(0, $tags->count()));
            foreach($randTags as $tag){
                $post->tags()->attach($tag);
            }
        }
    }
}
