<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('phone', 191)->nullable();
			$table->string('country', 191)->nullable();
			$table->integer('total_listings')->unsigned()->default(0);
			$table->integer('total_units')->unsigned()->default(0);
			$table->integer('total_tenants')->unsigned()->default(0);
			$table->integer('isApproved')->nullable();
			$table->integer('suspended')->nullable();
			$table->dateTime('approved_at')->nullable();
			$table->softDeletes();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('alternative_email', 100)->nullable();
			$table->string('alternative_phone', 100)->nullable();
			$table->string('session_id', 100)->nullable();
			$table->string('addressable_id')->nullable();
			$table->string('addressable_type')->nullable();
			$table->string('agent_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('owners');
	}

}
