<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Request;

class ArticlesController extends Controller
{
    public function index(){

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
      Article::create( $request->all() );
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
