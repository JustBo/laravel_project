@extends('base')

@section('content')
  <h1>{{ $article->title }}</h1>
  {{ Form::model($article, ['method' => 'PATCH','action' => ['ArticlesController@update', $article->id]]) }}
    @include('articles.partials._form', ['submitButtonText' => 'Update article'])
  {{ Form::close() }}
  @include('errors._form')
@stop
