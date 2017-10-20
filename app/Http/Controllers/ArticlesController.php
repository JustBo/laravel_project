<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
//use App\Http\Controllers\Auth\AuthController;
use Request;

class ArticlesController extends Controller
{

    public function __construct(){
      $this->middleware('auth', ['only' => ['create', 'store','edit','update']]);
    }

    public function index(){

      //return \Auth::user();
      $articles = Article::latest('published_at')->published()->get();
      return view('articles.articles', compact('articles'));

    }

    public function show( $id ){

      $article = Article::findOrFail( $id );
      return view('articles.article', compact('article') );

    }

    public function create(){

      return view('articles.create');

    }

    public function store( ArticleRequest $request ){

      //$input = Request::all();
      $article = new Article( $request->all() );
      \Auth::user()->articles()->save($article);
      return redirect('articles');

    }

    public function edit( $id ){

      $article = Article::findOrFail( $id );
      return view('articles.edit', compact('article') );

    }

    public function update( $id, ArticleRequest $request ){

      $article = Article::findOrFail( $id );
      $article->update($request->all());
      return redirect('articles');

    }

}
