<?php

	class UserTableSeeder extends Seeder {
		
		public function run() {
			/**
			 * We may want to use a faker,
			 * But, we only require 2 users :)
			 * We Just Do It Manually ...
			 */
			DB::table( 'users' )->truncate();

			User::create(
				[
					'name' 		=> 'Bogart Dman',
					'email' 	=> 'bogart@gmail.com',
					'password'	=> Hash::make( 'password' )
				]
			);

			User::create(
				[
					'name' 		=> 'Some Name',
					'email' 	=> 'somename@gmail.com',
					'password'	=> Hash::make( 'password' )
				]
			);

		}
	
	}