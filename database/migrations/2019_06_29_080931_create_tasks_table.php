<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('property', 191);
			$table->string('unitnumber', 191)->nullable();
			$table->string('tasktype', 191);
			$table->timestamp('duedate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('priortylevel', 191);
			$table->string('addressable_type', 191);
			$table->string('addressable_id', 191);
			$table->string('created_by', 191);
			$table->string('details', 191);
			$table->string('src', 191)->nullable();
			$table->string('mime_type', 191)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->date('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
