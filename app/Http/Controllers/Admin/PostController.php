<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){

        $posts = Post::where('user_id', Auth::user()->id)->get();

        return view('admin.posts.lists', compact('posts'));

    }

    public function view(Post $post){
        //$this->authorize('view', $post);

        return '<h1>'.$post->title.'</h1>';
    }

    public function add(){

        return view('admin.posts.add');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', compact(
            'post'
        ));
    }

    public function delete(Post $post){
        return 'Xoá bài viết: '.$post->id;
    }
}
