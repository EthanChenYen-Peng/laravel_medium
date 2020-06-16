<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }
    public function update(Post $post)
    {
        $attributes = $this->validatePostAttributes();
        if (request()->hasFile('cover_image')) {
            $attributes['cover_image'] = request('cover_image')->store('cover_images');
        }
        
        $post->update($attributes);

        if ($post->published) {
            return redirect(route('posts-show', ['user'=>$post->user, 'post'=>$post]));
        }
        return redirect(route('own-posts-show', ['state'=>'drafts']));
    }

    public function store()
    {
        $attributes = $this->validatePostAttributes();
        if (request()->hasFile('cover_image')) {
            $attributes['cover_image'] = request('cover_image')->store('cover_images');
        }

        $post = auth()->user()->posts()->create($attributes);
        if ($post->published) {
            return redirect(route('posts-show', ['user'=>$post->user, 'post'=>$post]));
        }
        return redirect(route('own-posts-show', ['state'=>'drafts']));
    }


    public function show($username, $slug)
    {
        $post = User::where('username', $username)->get()->first()->posts->filter(function ($p) use ($slug) {
            return $p->slug == $slug;
        })->first();

        return view('posts.show', compact('post'));
    }

    protected function validatePostAttributes()
    {
        return request()->validate([
            'title'=>'required',
            'content'=>'required',
            'published'=>'required',
            'cover_image'=>""
        ]);
    }
}
