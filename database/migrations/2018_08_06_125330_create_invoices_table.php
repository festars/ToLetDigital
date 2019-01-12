<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_id')->index()->unique();
            $table->string('hash')->index()->unique();
            $table->integer('rental_id');
            $table->integer('tenant_id');
            $table->integer('agent_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('amount',15,2)->nullable();
            $table->decimal('paid',15,2)->nullable();
            $table->decimal('balance',15,2)->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('receipt_url')->nullable();
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
