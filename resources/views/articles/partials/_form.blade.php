
<div class="form-group">
  {{ Form::label('title','Title:') }}
  {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
  {{ Form::label('body','Body:') }}
  {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
  {{ Form::label('published_at','Publish On:') }}
  {{ Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) }}
</div>
<div class="form-group">
  {{ Form::label('categories_list','Categories:') }}
  {{ Form::select('categories_list[]', $categories, null, ['class' => 'form-control', 'multiple']) }}
</div>
<div class="form-group">
  {{ Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) }}
</div>
