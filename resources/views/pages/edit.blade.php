@extends('layouts.master')

@section('title', 'Edit Article')

@section('content')


    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]) !!}
        @include('partials.createEditForm', array('buttonText' => 'Edit Article'))
    {!! Form::close() !!}

    {!! Form::open(array('method' => 'DELETE', 'action' => ['ArticleController@destroy', $article->id])) !!}
        {!! Form::submit('Delete Article', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@stop