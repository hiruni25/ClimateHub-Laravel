<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function writeComment(Request $request) 
    {
    $comment=new Comment();
    $comment->text=$request['text'];
    $request ->user() ->comments()->save($comment);
    return redirect()->route('blog');
    }

    function delete($id){
        $comment=Comment::find($id);
        $result=$comment->delete();
        if($result){
            return 'comment deleted';
        }
        
    }
}
