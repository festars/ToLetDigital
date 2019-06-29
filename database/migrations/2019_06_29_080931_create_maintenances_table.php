<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaintenancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenances', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('approved')->nullable();
			$table->string('property', 200);
			$table->string('unit', 200);
			$table->string('maintenancetype', 200)->nullable();
			$table->dateTime('duedate')->nullable();
			$table->string('action', 50)->nullable();
			$table->string('notes', 200)->nullable();
			$table->string('cause', 200)->nullable();
			$table->string('addressable_type', 200)->nullable();
			$table->bigInteger('addressable_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('agent_id')->nullable();
			$table->string('cost', 100);
			$table->string('fileurl', 100)->nullable();
			$table->date('approvedon')->nullable();
			$table->date('declinedon')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('maintenances');
	}

}
