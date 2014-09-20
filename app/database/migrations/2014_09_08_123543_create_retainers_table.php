<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRetainersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('retainers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('hours');
			$table->integer('strategiest_id');
			$table->integer('account_manager_id');
			$table->text('domain');
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
		Schema::drop('retainers');
	}

}
