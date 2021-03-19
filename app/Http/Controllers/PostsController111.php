<?php


namespace App\Http\Controllers;


class PostsController111
{
    public function show($post){

             $posts=[
                 'my-first-post'=>'helo this is my first post',
                 "my-second-post"=>"hello this is my second post"
             ];

             if (!array_key_exists($post,$posts)){
                 abort(404,"not found");
             }

             return view("posts",[
                 'post'=>$posts[$post] ?? 'Nothing here'
             ]);

    }

}
