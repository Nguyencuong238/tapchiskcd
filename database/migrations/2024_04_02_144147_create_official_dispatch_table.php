<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialDispatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_dispatch', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('body');
            $table->integer('department_id')->nullable();
            $table->date('date_handle')->nullable();
            $table->integer('author_id');
            $table->string('code');
            $table->string('code_receive')->nullable();
            $table->date('date_receive')->nullable();
            $table->string('sending_place')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('author_id')->index();

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
        Schema::dropIfExists('official_dispatch');
    }
}
