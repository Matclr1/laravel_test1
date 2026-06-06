<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoCommentController extends Controller
{
    public function store(Request $request, $todoid){
        $comment = new \App\Models\TodoComment();
        $comment->content = $request->input('content');
        $comment->todo_id = $todoid;
        $comment->save();
        return redirect()->route('todos.show', ['todo' => $todoid]);
    }

    public function destroy($todoid, $commentid){
        $comment = \App\Models\TodoComment::findOrFail($commentid);
        $comment->delete();
        return redirect()->route('todos.show', ['todo' => $todoid]);
    }
}
