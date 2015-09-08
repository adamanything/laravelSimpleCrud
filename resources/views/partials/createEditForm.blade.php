<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

@if(isset($article->user_id))
    <div class="form-group">
    {!! Form::hidden('ArticleUserId', $article->user_id) !!}
    </div>
    @endif

{!! Form::submit("$buttonText", ['class' => 'btn btn-primary']) !!}