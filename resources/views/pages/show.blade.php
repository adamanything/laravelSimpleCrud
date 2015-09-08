@extends('layouts.master')

@section('title', 'show')

@section('content')

    <h3>{{$article->title}}</h3>
    <p>{{$article->body}}</p>

    @if(Auth::User()->id == $article->user_id)
    <a href="/article/{{$article->id}}/edit" class="btn btn-primary">Edit</a>
    @endif
    @stop