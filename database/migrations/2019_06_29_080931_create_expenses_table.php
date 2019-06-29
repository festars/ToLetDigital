<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('property', 100)->nullable();
			$table->string('unit', 100)->nullable();
			$table->string('payee', 100)->nullable();
			$table->string('details', 200)->nullable();
			$table->string('frequency', 100)->nullable();
			$table->decimal('amount', 10, 0)->nullable();
			$table->string('payment_method', 100)->nullable();
			$table->string('payment_reference', 100)->nullable();
			$table->string('addressable_id', 100)->nullable();
			$table->string('addressable_type', 100)->nullable();
			$table->integer('approved')->nullable();
			$table->dateTime('approvedon')->nullable();
			$table->dateTime('declinedon')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('agent_id', 20);
			$table->string('category', 100)->nullable();
			$table->dateTime('duedate')->nullable();
			$table->string('currency', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenses');
	}

}
