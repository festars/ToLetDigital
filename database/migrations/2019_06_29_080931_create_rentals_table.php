<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRentalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rentals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rentable_type', 191);
			$table->bigInteger('rentable_id')->unsigned();
			$table->integer('tenant_id')->nullable();
			$table->integer('agent_id');
			$table->integer('owner_id')->nullable();
			$table->dateTime('rental_to')->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->index(['rentable_type','rentable_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rentals');
	}

}
