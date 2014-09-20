<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCredentialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credentials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('service_name');
			$table->string('user_name');
			$table->string('password');
			$table->text('comments');
			$table->timestamps();
            $table->string('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('credentials');
	}

}
