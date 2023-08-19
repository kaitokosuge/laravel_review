<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like\likePost;

class likePostController extends Controller
{
    public function index(likePost $post)
    {
        return view('Post-like.index')->with(['posts' => $post->get()]);
    }
    public function show()
    {
        return view('Post-like.show');
    }
    public function store(LikePost $post,Request $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/likes');
    }
    public function destroy(likePost $post)
    {
        $post->delete();
        return redirect('/likes');
    }
    public function like()
    {

    }
}
