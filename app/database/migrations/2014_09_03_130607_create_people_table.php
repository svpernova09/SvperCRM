<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
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
            $table->boolean('is_sales_person');
            $table->boolean('is_account_manager');
            $table->boolean('is_designer');
            $table->boolean('is_developer');
            $table->boolean('is_marketing_strategiest');
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
		Schema::drop('people');
	}

}
