<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportcontractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supportcontracts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('hours');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('designer_id');
			$table->string('developer_id');
			$table->text('platform');
			$table->text('domain');
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
		Schema::drop('supportcontracts');
	}

}
