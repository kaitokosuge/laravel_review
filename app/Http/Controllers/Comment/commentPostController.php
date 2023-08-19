<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment\commentPost;
use App\Models\Comment\commentComment;

class commentPostController extends Controller
{
    public function index(commentPost $post)
    {
        return view('Post-comment.index')->with(['posts' => $post->get()]);
    }
    public function show(commentPost $post)
    {
        return view('Post-comment.show')->with(['post' => $post]);
    }
    public function store(Request $request ,commentPost $post)
    {
        $input = $request['commentpost'];
        $post->fill($input)->save();
        return redirect('/comments');
    }
    public function destroy(commentPost $post)
    {
        $post->delete();
        return redirect('/comments');
    }
    public function comment(Request $request,commentComment $comment,commentPost $post)
    {
        $comment->comment = $request['comment'];
        $comment->comment_post_id = $post->id;
        $comment->user_id = \Auth::user()->id;
        $comment->save();
        return redirect('/comments/'.$post->id);
    }
}
