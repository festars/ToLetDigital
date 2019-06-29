<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_type_id');
            $table->integer('property_options_id');
            $table->integer('owner_id');
            $table->integer('agent_id')->nullable();
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('land')->nullable();
            $table->string('country')->nullable();
            $table->point('latlong')->nullable();
            $table->string('location')->nullable();
            $table->string('color')->nullable();
            $table->string('description')->nullable();
            $table->integer('total_units')->unsigned()->default(0);
            $table->integer('total_tenants')->unsigned()->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('listings');
    }
}
