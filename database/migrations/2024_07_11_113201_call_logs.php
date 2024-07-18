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
        Schema::create('call_log', function (Blueprint $table) {
            $table->id();
            $table->string('Number_Queried');
            $table->string('CalledNumber');
            $table->string('callingnumber');
            $table->string('eventtime');
            $table->string('duration');
            $table->string('Servedimei');
            $table->string('ServedIMSI');
            $table->string('type');
            $table->string('Sitename');
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
        Schema::dropIfExists('call_log');
    }
};
