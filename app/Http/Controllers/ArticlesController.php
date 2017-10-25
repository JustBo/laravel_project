<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use App\Category;
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
      $articles = Article::latest('published_at')->published()->get();
      return view('articles.articles', compact('articles'));
    }

    public function show( $id ){
      $article = Article::findOrFail( $id );
      return view('articles.article', compact('article') );
    }

    public function create(){
      $categories = Category::lists('name', 'id');
      return view('articles.create', compact('categories'));
    }

    public function store( ArticleRequest $request ){
      $article = $this->createArticle( $request );
      return redirect('articles');
    }

    public function edit( $id ){
      $categories = Category::lists('name', 'id');
      $article = Article::findOrFail( $id );
      return view('articles.edit', compact('article','categories') );
    }

    public function update( $id, ArticleRequest $request ){
      $article = Article::findOrFail( $id );
      $article->update($request->all());
      $this->syncCategories( $article, $request->input('categories_list') );
      return redirect('articles');
    }

    private function syncCategories( Article $article, array $tags ){
      $article->categories()->sync( $tags );
    }

    private function createArticle( ArticleRequest $request ){
      $article = \Auth::user()->articles()->create( $request->all() );
      $this->syncCategories( $article, $request->input('categories_list') );
      return $article;
    }

}
