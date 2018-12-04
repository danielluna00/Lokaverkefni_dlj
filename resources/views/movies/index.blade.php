@extends('layouts.app')
@section('content')
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">

<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<div class="d-flex">
@forelse($movies as $movie)
<div style="margin-left: 10px"class="card">
  <div class="card-image"  class="w-50 p-3" >
      <img src="{{asset($movie->poster)}}" alt="Placeholder image">
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
      </div>
      <div class="media-content">
        <a class="title is-4" id ="titleid" href="{{$movie->path()}}">{{ $movie->title }}</a>
      </div>
    </div>

    <div class="content">
      <p class="subtitle is-6">Made by : {{ $movie->user->name }}</p>
      <a href="#">{{$movie->genre}}</a>
      <br>
      <time>{{$movie->created_at->diffForHumans()}}</time>
    </div>
  </div>
</div>

@empty
<p>No result,Try again</p>
  @endforelse
</div>
@endsection
