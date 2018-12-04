@extends('layouts/app')

@section('title', 'Create')

@section('content')


	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="POST" action="/movies" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<input placeholder="Title" type="text" name="title" class="form-control" value="{{ old('title') }}">
		</div>
		<div class="form-group">
			<textarea placeholder="Description" name="description" class="form-control">{{ old('description') }}</textarea>
		</div>
		<div class="form-group">
			<input placeholder="Img(.png-.jpg....)" type="text" name="poster" class="form-control" value="{{ old('poster') }}">
		</div>
		<div class="form-group">
			<input placeholder="Video link" type="text" name="video" class="form-control" value="{{ old('video') }}">
		</div>
		<div class="form-group">
			<input placeholder="Genre" type="text" name="genre" class="form-control" value="{{ old('genre') }}">
		</div>
		<div class="form-group">
			<input placeholder="Stars" type="text" name="stars" class="form-control" value="{{ old('stars') }}">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>
@endsection
