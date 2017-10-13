@extends('base')

@section('content')

  <h1>Create</h1>

  {{ Form::open(['url' => 'articles']) }}
    @include('articles.partials._form', ['submitButtonText' => 'Add article'])
  {{ Form::close() }}
  @include('errors._form')
@stop
