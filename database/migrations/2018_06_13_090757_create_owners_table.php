<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('alternative_email');
            $table->string('alternative_phone');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->integer('total_listings')->unsigned()->default(0);
            $table->integer('total_units')->unsigned()->default(0);
            $table->integer('total_tenants')->unsigned()->default(0);
            $table->integer('isApproved')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('session_id');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('owners');
    }
}
