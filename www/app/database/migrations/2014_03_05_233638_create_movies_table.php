<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/* Sections
		===================== */
		Schema::create( 'sections', function( $table ) {
			$table->increments( 'id' )->unsigned()->unique()->index();
			$table->string( 'title' );
			$table->timestamps();
		});

		/* Movies
		===================== */
		if ( Schema::hasTable( 'sections' ) ) {
			Schema::create( 'movies', function( $table ) {
				$table->increments( 'id' )->unsigned()->unique()->index();
				$table->string( 'title' );
				$table->string( 'title_sort' )->index();
				$table->text( 'summary' );
				$table->integer( 'section_id' )->unsigned()->index();
				$table->timestamps();

				$table->foreign( 'section_id' )
					->references( 'id' )->on( 'sections' )
					->onDelete( 'cascade' )
					->onUpdate( 'cascade' );
			});
		}

		if ( Schema::hasTable( 'movies' ) ) {

			/* Notes
			===================== */
			Schema::create( 'notes', function( $table ) {
				$table->increments( 'id' )->unsigned()->unique()->index();
				$table->integer( 'movie_id' )->unsigned();
				$table->text( 'note' );
				$table->timestamps();
				
				$table->foreign( 'movie_id' )
					->references( 'id' )->on( 'movies' )
					->onDelete( 'cascade' )
					->onUpdate( 'cascade' );
			});
			
			/* Tags
			===================== */
			Schema::create( 'tags', function( $table ) {
				$table->increments( 'id' )->unsigned()->unique()->index();
				$table->string( 'tag' )->unique()->index();
			});
			
			/* Tag Map
			===================== */
			Schema::create( 'tags_map', function( $table ) {
				$table->integer( 'movie_id' )->unsigned();
				$table->integer( 'tag_id' )->unsigned();
				
				$table->foreign( 'movie_id' )
					->references( 'id' )->on( 'movies' )
					->onDelete( 'cascade' )
					->onUpdate( 'cascade' );
				
				$table->foreign( 'tag_id' )
					->references( 'id' )->on( 'tags' )
					->onDelete( 'cascade' )
					->onUpdate( 'cascade' );
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'tags_map' );
		Schema::drop( 'tags' );
		Schema::drop( 'notes' );
		Schema::drop( 'movies' );
		Schema::drop( 'sections' );
	}

}
