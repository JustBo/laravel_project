@extends('base')

@section('content')
  <h1>Articles</h1>
  <hr>
  @if ( count( $articles ) )
    <ul>
      @foreach( $articles as $article )
        <li>
          <a href="{{ url('/articles', $article->id) }}" class="articles-name">
            {{ $article->title }}
          </a>
          <div class="articles-body">
            {{ $article->body }}
          </div>
          <div class="articles-published">
            {{ $article->published_at }}
          </div>
        </li>
      @endforeach
    </ul>
  @endif
@stop
