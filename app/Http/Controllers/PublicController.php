<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::withCount("comments", "likes")
            ->latest()
            ->simplePaginate(16);
        return view("welcome", compact("posts"));
    }

    public function post(Post $post)
    {
        return view("post", compact("post"));
    }

    public function like(Post $post)
    {
        $like = auth()
            ->user()
            ->likes()
            ->where("post_id", $post->id)
            ->first();
        if ($like) {
            $like->delete();
        } else {
            $like = new Like();
            $like->user()->associate(auth()->user());
            $like->post()->associate($post);
            $like->save();
        }
        return redirect()->back();
    }

    public function user(User $user)
    {
        $posts = $user
            ->posts()
            ->withCount("comments", "likes")
            ->latest()
            ->simplePaginate(16);
        return view("user", compact("posts", "user"));
    }

    public function follow(User $user)
    {
        $followee = auth()
            ->user()
            ->followees()
            ->where("followee_id", $user->id)
            ->first();
        if ($followee) {
            auth()->user()->followees()->detach($user);
        } else {
            auth()->user()->followees()->attach($user);
        }
        return redirect()->back();
    }

    public function comment(Post $post, Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->input("body");
        $comment->post()->associate($post);
        $comment->user()->associate(auth()->user());
        $comment->save();
        return redirect()->back();
    }

    public function category(Category $category)
    {
        $posts = $category
            ->posts()
            ->withCount("comments", "likes")
            ->latest()
            ->simplePaginate(16);
        return view("welcome", compact("posts"));
    }

    public function tag(Tag $tag = null)
    {
        if (isset($tag)) {
            $posts = $tag
                ->posts()
                ->withCount("comments", "likes")
                ->latest()
                ->simplePaginate(16);
            return view("tags", compact("posts"));
        } else {
            $tags = Tag::all();
            return view("tags", compact("tags"));
        }
    }
}
