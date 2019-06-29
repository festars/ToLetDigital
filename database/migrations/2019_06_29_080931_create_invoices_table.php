<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice_id', 191)->unique();
			$table->string('hash', 191)->unique();
			$table->integer('rental_id');
			$table->integer('tenant_id');
			$table->integer('agent_id');
			$table->integer('year');
			$table->integer('month');
			$table->integer('day')->nullable();
			$table->string('currency', 191)->nullable();
			$table->decimal('amount', 15)->nullable();
			$table->decimal('paid', 15)->nullable();
			$table->decimal('balance', 15)->nullable();
			$table->dateTime('payment_date')->nullable();
			$table->string('payment_method', 191)->nullable();
			$table->string('payment_by', 191)->nullable();
			$table->string('payment_reference', 191)->nullable();
			$table->string('invoice_url', 191)->nullable();
			$table->string('receipt_url', 191)->nullable();
			$table->text('data')->nullable();
			$table->softDeletes();
			$table->timestamps();
			$table->unique(['rental_id','month','year']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
