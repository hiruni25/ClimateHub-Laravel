<?php

namespace App\Http\Controllers;
use App\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        //validation
        $post=new Post();
        $post->blog_title=$request['title'];
        $post->content=$request['body'];
        $post->image=$request['image'];
        $request ->user() ->posts()->save($post);
        return redirect()->route('blog');
    }

    public function uploadImage(Request $request){
        $request->image->store('images','public');
        return 'Uploaded the image successfully.';
    }

    function delete($id){
        $post=Post::find($id);
        $result=$post->delete();
        if($result){
            return 'post deleted';
        }
        
    }
}
