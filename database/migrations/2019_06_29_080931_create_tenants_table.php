<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTenantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tenants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('phone', 191)->nullable();
			$table->string('aphone', 191)->nullable();
			$table->string('aemail', 191)->nullable();
			$table->string('country', 191)->nullable();
			$table->integer('isApproved')->nullable();
			$table->dateTime('approved_at')->nullable();
			$table->string('session_id', 191)->nullable();
			$table->softDeletes();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('idnumber', 100)->nullable();
			$table->string('profilepic', 100)->nullable();
			$table->string('title', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tenants');
	}

}
