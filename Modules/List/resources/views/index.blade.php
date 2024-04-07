@extends('list::layouts.master')

@section('content')
    <h1>Hello World</h1>
    <h2>Laravel Modules Success
    </h2>

    <p>Module: {!! config('list.name') !!}</p>
@endsection
