<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property');
            $table->string('unitnumber');
            $table->string('reason');
            $table->string('notes');
            $table->string('comment');
            $table->string('nodeposit');
            $table->timestamp('move_date');
            $table->string('addressable_type');
            $table->string('addressable_id');
            $table->string('tenant_id');
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notices', function (Blueprint $table) {
            //
        });
    }
}
