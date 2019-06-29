<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notices', function(Blueprint $table)
		{
			$table->date('move_date')->nullable();
			$table->string('reason', 100)->nullable();
			$table->string('addressable_type', 100)->nullable();
			$table->bigInteger('addressable_id')->nullable();
			$table->string('comment', 200)->nullable();
			$table->string('file', 100)->nullable();
			$table->boolean('nodeposit');
			$table->timestamps();
			$table->string('createdby', 100)->nullable();
			$table->integer('id', true);
			$table->integer('tenant_id')->nullable();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notices');
	}

}
