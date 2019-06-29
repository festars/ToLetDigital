<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('accountable_type', 191);
			$table->bigInteger('accountable_id')->unsigned();
			$table->string('name', 191);
			$table->string('currency', 191);
			$table->integer('period_id');
			$table->decimal('amount', 15);
			$table->boolean('active');
			$table->softDeletes();
			$table->timestamps();
			$table->index(['accountable_type','accountable_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
