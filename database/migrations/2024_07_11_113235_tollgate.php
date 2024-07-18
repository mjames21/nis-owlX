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
        Schema::create('tollgate', function (Blueprint $table) {
            $table->id();
            $table->string('stationCode');
            $table->string('userCode');
            $table->string('vehicle_no');
            $table->string('vehicleTypeName');
            $table->string('money');
            $table->string('tax');
            $table->string('tax_free');
            $table->string('weight');
            $table->timestamp('create_time');
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
        Schema::dropIfExists('tollgate');
    }
};
