@extends('layouts/app')

@section('content')

<!-- Modal -->

<div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  {{$movie->title}}
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div style="background-color:#FFFAFA" class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{$movie->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="d-flex">
      <div class="embed-responsive embed-responsive-4by3">
      <iframe width="500" height="200" src="{{$movie->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div> 
      </div>
      <div class="modal-body">
      {{$movie->description}}
      </div>
      <div class="modal-footer" style="background-color:#FFFAFA">
        {{$movie->stars}}
      </div>
    </div>
  </div>
</div>
</div>
@auth
  <form method="POST" action="/movies/{{ $movie->id }}/comment">
    @csrf
    <div class="form-group">
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <button class="btn btn-primary">Post</button>
  </form>
  @else
    <p>Sign in.</p>
  @endauth

  @foreach($movie->comments()->latest()->get() as $comment)
      <h6>{{$comment->user->name}}</h6>
      <p>{{$comment->description}}</p>
  @endforeach
	@endsection

