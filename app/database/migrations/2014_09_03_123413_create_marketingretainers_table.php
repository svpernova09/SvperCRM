<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketingretainersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marketingretainers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('hours');
			$table->string('strategist_id');
			$table->string('account_manager_id');
			$table->text('domain');
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
		Schema::drop('marketingretainers');
	}

}
