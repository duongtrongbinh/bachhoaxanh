@extends('fontend::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('fontend.name') !!}</p>
@endsection
