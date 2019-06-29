<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('property_type_id');
			$table->integer('owner_id');
			$table->integer('agent_id')->nullable();
			$table->integer('payment_options_id');
			$table->string('name', 191);
			$table->string('land', 191)->nullable();
			$table->string('country', 191)->nullable();
			$table->string('latlong')->nullable();
			$table->string('location', 191)->nullable();
			$table->string('color', 191)->nullable();
			$table->string('description', 191)->nullable();
			$table->integer('total_units')->unsigned()->default(0);
			$table->integer('total_tenants')->unsigned()->default(0);
			$table->integer('status')->nullable();
			$table->softDeletes();
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
		Schema::drop('listings');
	}

}
