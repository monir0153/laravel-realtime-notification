<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Auth\Events\Validated;

class PostController extends Controller
{
    public function showform()
    {
        return view('user.post');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'author' =>'required'
        ]);
        $data = Post::create([
            'title' =>$request->title,
            'author' =>$request->author
        ]);
        event(new PostCreated($data));
        return redirect()->back();
    }
}
