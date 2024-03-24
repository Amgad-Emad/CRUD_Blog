<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $postsfromDB = Post::all();

        return view('posts.index', ['posts' => $postsfromDB]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        request()->validate([
            'title'=> ['required','min:3'],
            'description'=>['required','min:5'],
            'postCreator'=>['required','exists:users,id']

        ]);
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        // $post=new post;
        // $post->title=$title;
        // $post->description=$description;
        // $post->save();

        Post::create(['title' => $title, 'description' => $description, 'user_id' => $postCreator]);

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }


    public function update($postId)
    {
        request()->validate([
            'title'=> ['required','min:3'],
            'description'=>['required','min:5'],
            'postCreator'=>['required','exists:users,id']

        ]);
        
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        $singlePost = Post::find($postId);
        $singlePost->update(['title' => $title, 'description' => $description, 'user_id' => $postCreator]);


        return to_route('posts.show', $postId);
    }

    public function destroy( Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
