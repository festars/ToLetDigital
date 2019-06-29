<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property');
            $table->string('unitnumber');
            $table->string('tasktype');
            $table->timestamp('duedate');
            $table->string('priortylevel');
            $table->string('addressable_type');
            $table->string('addressable_id');
            $table->string('created_by');
            $table->string('details');
            $table->string('src')->nullable();
            $table->string('mime_type')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
