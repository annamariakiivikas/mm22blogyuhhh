<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::select('id')->get();
        $users = User::select('id')->get();
        foreach($posts as $post){
            Comment::factory(rand(0,20))->create(['post_id' => $post->id, 'user_id' => $users->random()->id]);
        }
    }
}
