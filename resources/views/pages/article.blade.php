@extends('layouts.master')

@section('title', 'Articles')

@section('content')

    <p>Page Content</p>

    @if(isset($articles))
        <ul>
            @foreach($articles->all() as $article)
                <li><a href="/article/{{$article->id}}">{{$article->title}}</a></li>
                <li>{{$article->body}}</li>
            @endforeach
        </ul>
    @endif
    @stop