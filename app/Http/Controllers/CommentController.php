<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {


        Comment::create([
            'post_id' => $postId,
            // 'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        // dd($id);
        return redirect()->back()->with('success', 'Comment deleted!');
    }
    
    

}
