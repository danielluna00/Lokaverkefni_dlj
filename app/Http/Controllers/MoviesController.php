<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;
class MoviesController extends Controller
{
	 
    public function index(User $user)
    {	
        if ($search = request('search')) {
            $movies = Movie::where("genre","like","%$search%")->orWhere("title","like","%$search%")->get();
            
        } else {
            $movies=Movie::all(); 
        }


        return view("movies/index", compact("movies"));
    }
    public function create()
    {
        return view("movies/create");
    }
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'poster' => 'required',
            'genre' => 'required',
            "stars" => "required",
            "video" => "required"
        ]);

        $movie = Movie::create([
            'title' => request('title'),
            'description' => request('description'),
            'poster' => request('poster'),
            'genre' => request('genre'),
            'stars' => request('stars'),
            'video' => request('video'),
            'user_id' => auth()->id()
        ]);

        return redirect($movie->path());
    }
    public function show($id)
    {
        $movie = \App\Movie::findOrFail($id);
        return view("movies/show", compact("movie"));
     
    }
}
