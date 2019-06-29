<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('phone', 191)->nullable();
			$table->integer('isApproved')->nullable();
			$table->integer('suspended')->nullable();
			$table->integer('total_listings')->unsigned()->default(0);
			$table->integer('total_units')->unsigned()->default(0);
			$table->integer('total_tenants')->unsigned()->default(0);
			$table->dateTime('approved_at')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->string('profilepic', 100)->nullable();
			$table->string('session_id', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agents');
	}

}
