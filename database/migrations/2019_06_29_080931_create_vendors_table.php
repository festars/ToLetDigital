<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 100)->nullable();
			$table->string('email', 100)->nullable()->unique('email');
			$table->string('phone', 100)->nullable();
			$table->string('alternative_email', 100)->nullable();
			$table->string('type', 100)->nullable();
			$table->string('serviceoffered', 100)->nullable();
			$table->string('country', 100)->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->string('agent_id', 100)->nullable();
			$table->string('location', 100)->nullable();
			$table->integer('approved')->nullable();
			$table->string('password');
			$table->string('remember_token')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vendors');
	}

}
