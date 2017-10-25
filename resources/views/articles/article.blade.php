@extends('base')

@section('content')
  <div class="article-title">
    <h1>{{ $article->title }}</h1>
  </div>
  <div class="article-body">
    {{ $article->body }}
  </div>
  <div class="article-published">
    {{ $article->published_at }}
  </div>
  @unless( $article->categories->isEmpty() )
    <h4>Categories</h4>
    <ul>
      @foreach ($article->categories as $key => $category)
        <li>{{ $category->name }}</li>
      @endforeach
    </ul>
  @endunless
@stop
