@extends('layouts.master')

@section('title', 'show')

@section('content')

    <h3>{{$article->title}}</h3>
    <p>{{$article->body}}</p>

    <a href="/article/{{$article->id}}/edit" class="btn btn-primary">Edit</a>

    @stop