<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('civil_register', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('alias')->nullable();
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('occupation')->nullable();
            $table->string('residential_address');
            $table->string('residential_status');
            $table->string('passport_number')->nullable();
            $table->string('nin')->nullable();
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('mothers_fname');
            $table->string('mothers_mname')->nullable();
            $table->string('mothers_lname');
            $table->string('fathers_fname');
            $table->string('fathers_mname')->nullable();
            $table->string('fathers_lname');
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
        Schema::dropIfExists('civil_register');
    }
};
