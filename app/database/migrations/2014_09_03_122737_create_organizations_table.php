<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->string('address2');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('phone');
			$table->string('agency_id');
			$table->string('salesperson_id');
			$table->string('account_manager_id');
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
		Schema::drop('organizations');
	}

}
