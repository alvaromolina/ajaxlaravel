<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;

use App\Http\Requests\MovieRequest;

class MoviesController extends Controller {


	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::all();
		return view('movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('movies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MovieRequest $request)
	{


		$input = $request->all();
		Movie::create($input);
		/*
		$movie = new Movie($input);
		Auth::user()->movies()->save($movie);
		*/
		return redirect('movies');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$movie = Movie::find($id);

		return view('movies.show', compact('movie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$movie = Movie::find($id);
		return view('movies.edit', compact('movie'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MovieRequest $request)
	{
		$movie = Movie::find($id);
		$input = $request->all();
		$movie->update($input);
		return redirect('movies');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Movie::destroy($id);
		return redirect('movies');
	}

}
