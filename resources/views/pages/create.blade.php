@extends('layouts.master')

@section('title', 'Create Article')

@section('content')

    {!! Form::open(array('action' => 'ArticleController@store')) !!}

        @include('partials.createEditForm', array('buttonText' => 'Create Article'))

    {!! Form::close() !!}

@stop