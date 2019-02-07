<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property');
            $table->string('unitnumber');
            $table->string('payee');
            $table->string('details');
            $table->string('frequency');
            $table->string('payment_method');
            $table->numeric('amount');
            $table->timestamp('duedate');
            $table->string('addressable_type');
            $table->string('addressable_id');
            $table->string('agent_id');
            $table->string('category');
            $table->string('currency')->nullable();
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
        Schema::table('expenses', function (Blueprint $table) {
            //
        });
    }
}
