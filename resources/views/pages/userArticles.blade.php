@extends('layouts.master')

@section('title', 'User Articles')

@section('content')
<h1>Test</h1>

@if(isset($articles))
    <ul>
        @foreach($articles->all() as $article)
            <li><a href="/article/{{$article->id}}">{{$article->title}}</a></li>
            <li>{{$article->body}}</li>
        @endforeach
    </ul>
@endif

    @stop