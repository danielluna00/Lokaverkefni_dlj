<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Movie;
class CommentsController extends Controller
{
    public function store(Movie $movie)
    {
    	Comment::create([
    		'description' => request('description'),
    		"movie_id" => $movie->id,
    		"user_id" => auth()->id()
    		
    	]);
    	return back();
    }
}
