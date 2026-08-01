@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('partials.hero')
@include('partials.about')
@include('partials.skills')
@include('partials.projects')
@include('partials.contact')

@endsection