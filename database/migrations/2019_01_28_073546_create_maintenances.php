<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
           $table->increments('id');
            $table->string('property');
            $table->string('unitnumber');
            $table->string('maintenancetype');
            $table->string('notes');
            $table->string('action');
            $table->string('payment_method');
            $table->numeric('cost');
            $table->timestamp('duedate');
            $table->string('addressable_type');
            $table->string('addressable_id');
            $table->string('agent_id');
            $table->string('cause');
            $table->numeric('approved');
            $table->string('fileurl')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            //
        });
    }
}
