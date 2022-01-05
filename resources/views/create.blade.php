@extends('html_structure')
@section('css link')
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
@endsection
@section('content')
    @include('subviews.navbar')
    @include('subviews.painel_principal')

@endsection
