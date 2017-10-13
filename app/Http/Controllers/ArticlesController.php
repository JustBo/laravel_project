<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use Request;

class ArticlesController extends Controller
{
    public function get_content(){

      $articles = Article::latest('published_at')->get();
      return view('articles.articles', compact('articles'));

    }

    public function get_specific_article( $id ){

      $article = Article::findOrFail( $id );
      return view('articles.article', compact('article') );

    }

    public function create(){

      return view('articles.create');

    }

    public function store(){

      $input = Request::all();
      $input['published_at'] = Carbon::now();
      Article::create( $input );
      return redirect('articles');

    }

}
