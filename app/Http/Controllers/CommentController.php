<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = auth('web')->user()->id;

        $comment = new Comment();

        $comment->text = $request->text;
        $comment->course_id = $request->course_id;
        $comment->user_id = $user;

        $comment->save();

        return back();

    }
}
