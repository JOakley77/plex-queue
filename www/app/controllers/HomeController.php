<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome()
	{
		$movies = Movie::orderBy( 'title_sort', 'asc' )->get();

		return View::make( 'pages.home' )->with( 'movies', $movies );
	}

	public function updateFromPlex()
	{
		// get plex data
		$plex		= DB::connection( 'sqlite' );
		$movies 	= $plex->select( 'SELECT id, library_section_id, title, title_sort, summary, tags_genre FROM metadata_items' );
		$sections 	= $plex->select( 'SELECT id, name FROM library_sections' );

		// reset plex data
		$this->resetPlexData();

		// add sections
		foreach ( $sections AS $section ) {
			$sectionExists = Section::where( 'title', $section->name )->count();

			if ( $sectionExists <= 0 ) {
				Section::create( array(
					'id'	=> $section->id,
					'title'	=> $section->name
				) );
			}
		}

		// add movies
		foreach ( $movies AS $movie ) {
			$movieExists = Movie::where( 'title', $movie->title )->count();

			if ( $movieExists <= 0 ) {
				Movie::create( array(
					'id'		=> $movie->id,
					'title'		=> $movie->title,
					'title_sort'=> $movie->title_sort,
					'summary'	=> $movie->summary,
					'section_id'=> $movie->library_section_id
				) );
			}
		}

		// return Response::json( $movies );
	}

	public function getPlexData()
	{
		$plex 		= DB::connection( 'sqlite' );

		$movies 	= $plex->select( 'SELECT title FROM metadata_items' );
		$sections 	= $plex->select( 'SELECT id, name FROM library_sections' );

		var_dump($sections);

	}

	protected function resetPlexData()
	{
		DB::statement( 'SET FOREIGN_KEY_CHECKS=0;' );

		DB::table( 'movies' )->delete();
		DB::table( 'sections' )->delete();
		DB::table( 'tags' )->delete();
		DB::table( 'tags_map' )->delete();

		DB::statement( 'ALTER TABLE movies AUTO_INCREMENT = 1' );
		DB::statement( 'ALTER TABLE sections AUTO_INCREMENT = 1' );
		DB::statement( 'ALTER TABLE tags AUTO_INCREMENT = 1' );
		DB::statement( 'ALTER TABLE tags_map AUTO_INCREMENT = 1' );

		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
	}
}