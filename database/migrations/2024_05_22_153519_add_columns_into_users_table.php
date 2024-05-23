<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pen_name', 50)->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->date('birthday')->nullable();
            $table->string('nation', 50)->nullable();
            $table->string('cccd', 50)->nullable();
            $table->string('tax_code', 50)->nullable();
            $table->string('bhxh', 50)->nullable();
            $table->string('bhyt', 50)->nullable();
            $table->string('journalist_code', 50)->nullable();
            $table->date('journalist_code_date')->nullable();
            $table->string('hnb_code', 50)->nullable();
            $table->date('hnb_code_start')->nullable();
            $table->date('hnb_code_end')->nullable();
            $table->string('home_town')->nullable();
            $table->string('hktt')->nullable();
            $table->string('staying_address')->nullable();
            $table->date('date_party')->nullable();
            $table->string('title')->nullable();
            $table->string('certificate_type')->nullable();
            $table->string('labor_contract', 50)->nullable();
            $table->string('labor_contract_type', 50)->nullable();
            $table->date('labor_contract_start')->nullable();
            $table->date('labor_contract_end')->nullable();
            $table->text('work_schedule')->nullable();
            $table->text('journalist_schedule')->nullable();
            $table->json('parent_info')->nullable();
            $table->json('siblings_info')->nullable();
            $table->json('children_info')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
