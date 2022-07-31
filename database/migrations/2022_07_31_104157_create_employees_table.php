<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('empid');
            $table->string('emp_name');
            $table->string('emp_designation');
            $table->date('emp_date_of_join');
            $table->string('emp_gender');
            $table->longText('emp_address');
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent();
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
        Schema::dropIfExists('employees');
    }
}
