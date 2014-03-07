<?php

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call( 'SafeDelete' );
		$this->call( 'SectionsSeeder' );
		$this->call( 'MoviesSeeder' );
	}

}

class SafeDelete extends Seeder {
	public function run()
	{
		DB::statement( 'SET FOREIGN_KEY_CHECKS=0;' );

		DB::table( 'movies' )->delete();
		DB::table( 'sections' )->delete();

		DB::statement( 'ALTER TABLE movies AUTO_INCREMENT = 1' );
		DB::statement( 'ALTER TABLE sections AUTO_INCREMENT = 1' );

		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
	}
}

class SectionsSeeder extends Seeder {
	public function run()
	{
		for( $s = 1; $s <= 6; $s++ ) {
			Section::create( array(
				'title'		=> 'Category ' . $s
			) );
		}
	}
}


class MoviesSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();

		for( $i = 1; $i <= 100; $i++ ) {
			Movie::create( array(
				'title'		=> $faker->name,
				'summary'	=> $faker->text,
				'plex_id'	=> $i,
				'section_id'=> rand( 1, 6 )
			) );
		}
	}
}