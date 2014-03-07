@extends('layouts.master')
@section('title', 'Plex Queue Master')
@section('content')
	@foreach ($movies as $movie)
    	<p>{{ $movie->title }}</p>
	@endforeach
@stop