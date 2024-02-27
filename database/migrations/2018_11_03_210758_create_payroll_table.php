<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->integer('amount');
            $table->string('ref_no', 100)->unique();
            $table->string('method', 100)->default('cash');
            $table->unsignedInteger('staff_id')->nullable();
            $table->string('description')->nullable();
            $table->string('pay_period')->default('monthly');
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
        Schema::dropIfExists('payrolls');
    }
}
