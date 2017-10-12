<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class ArticlesController extends Controller
{
    public function get_content(){

      $articles = Article::all();
      return view('articles.articles', compact('articles'));

    }

    public function get_specific_article( $id ){

      $article = Article::findOrFail( $id );
      return view('articles.article', compact('article') );

    }

}
