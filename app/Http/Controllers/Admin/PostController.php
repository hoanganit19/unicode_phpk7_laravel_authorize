<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('admin.posts.lists', compact('posts'));

    }

    public function view(Post $post){
        //$this->authorize('view', $post);

        return '<h1>'.$post->title.'</h1>';
    }
}
