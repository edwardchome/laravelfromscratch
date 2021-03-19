<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Articles $article){
        //name has to be the same as in the controller "articles/{article}"

        //ublic function show($id)
        //$article = Articles::find($id);
        //$article = Articles::All();

        return view('articles.show',[
            'article'=>$article
        ]);
    }

    public function index(){
        $articles =  Articles::take(3)->latest()->get();

        return view('articles.index',[
            'articles'=>$articles
        ]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){

//        $article = new Articles();

//        \request()->validate([
//           'title'=>'required',
//            'body'=>'required',
//            'excerpt'=>'required'
//        ]);

        Articles::create($this->validatedArticle());

//        Articles::create(\request()->validate([
//            'title'=>'required',
//            'body'=>'required',
//            'excerpt'=>'required'
//        ]));

        // clean up
//        $article->title = \request('title');
//        $article->body = \request('body');
//        $article->excerpt = \request('excerpt');
//        $article->save();

        return redirect('/articles');
    }

    public function edit(Articles $article){

        //$article = Articles::find($id);

//        return view('articles.edit',['article'=>$article]);
        return view('articles.edit',compact('article'));
    }

    public function update(Articles $article){
        //$article = Articles::find($id);

        $article->update($this->validatedArticle($article));

//       $article->update((\request()->validate([
//            'title'=>'required',
//            'body'=>'required',
//            'excerpt'=>'required'
//        ])));

//        $article->title = \request('title');
//        $article->body = \request('body');
//        $article->excerpt = \request('excerpt');
        //$article->save();

        return redirect(route('articles.show',$article->id));
    }

    protected function validatedArticle(){
       return \request()->validate([
            'title'=>'required',
            'body'=>'required',
            'excerpt'=>'required'
        ]);
    }
}

//if you use a slug you have to override the method getRouteKeyName() in the controller and select the slug column
