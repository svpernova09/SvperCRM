<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeoplesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peoples', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('organization_id');
			$table->string('address');
			$table->string('address2');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('office_phone');
			$table->string('mobile_phone');
			$table->string('email');
			$table->text('comments');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('peoples');
	}

}
