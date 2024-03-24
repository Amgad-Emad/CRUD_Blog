<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create()
    {
        return view('posts.createUser');
    }

    public function store()
    {
        request()->validate([
            'name'=> ['required','min:3'],
            'email'=>['required','email','min:5'],
            'password'=>['required']

        ]);
        $name = request()->name;
        $email = request()->email;
        $password = request()->password;

        // $post=new post;
        // $post->title=$title;
        // $post->description=$description;
        // $post->save();

        User::create(['name' => $name, 'email' => $email, 'password' => $password]);

        return to_route('posts.index');
    }}
