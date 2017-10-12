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
@stop
