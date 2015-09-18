<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments( 'id' );
			$table->integer( 'user_id' )->unsigned();
			$table->string( 'name' );
			$table->string( 'email' );
			$table->string( 'phone' );
			$table->string( 'custom_1' );
			$table->string( 'custom_2' );
			$table->string( 'custom_3' );
			$table->string( 'custom_4' );
			$table->string( 'custom_5' );
			$table->timestamps();

			$table->foreign( 'user_id' )
				->references( 'id' )
				->on( 'users' )
				->onDelete( 'cascade' );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
