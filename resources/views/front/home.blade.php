@extends('layouts.front')

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
@include('front.components._about-me')
@include('front.components._activities')
@include('front.components._latest-projects')
@endsection
