@extends('layout')

@section('content')
    <h1>Selling your home?</h1>

    @include('errors.list')

    <form method="POST" action="/flyers" enctype="multipart/form-data">
        @include('flyers.form')
    </form>

@stop