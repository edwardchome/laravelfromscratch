<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($slug){

        //$post = DB::table("posts")->where('slug',$slug)->first();

        $post = Post::where('slug',$slug)->firstOrFail();

//        dd($post);


//        if (!$post){
//            abort(404,"not found");
//        }

        return view("posts",[
            'post'=>$post ?? 'Nothing here'
        ]);

    }
}
