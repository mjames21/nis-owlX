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
        Schema::create('vehicle_registration', function (Blueprint $table) {
            $table->id('VehicleID');
            $table->string('VDCategory');
            $table->string('VDType');
            $table->string('VDMake');
            $table->string('VDColor');
            $table->string('VDChassisNo');
            $table->string('VDEngineNo');
            $table->string('VDFuelType');
            $table->string('VDPurposeOfVehicle');
            $table->string('VDYear');
            $table->string('RegDate');
            $table->string('OwnerID');
            $table->string('ODFName');
            $table->string('ODMName')->nullable();
            $table->string('ODLName');
            $table->string('ODGender');
            $table->date('ODDateOfBirth');
            $table->string('ODCurrentAddress');
            $table->string('ODPermentAddress');
            $table->string('VDOwner');
            $table->boolean('VDTransfered')->default(false);
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
        Schema::dropIfExists('vehicle_registration');
    }
};
