<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('data_source', function (Blueprint $table) {
            $table->id();
            $table->string('client_code');
            $table->text('client_name');
            $table->string('service_code');
            $table->string('service_name');
            $table->string('service_slug');
            $table->string('logo_link');
            $table->text('service_desc')->nullable();
            $table->string('service_category_id');
            $table->string('service_category_code');
            $table->string('data');
            $table->string('collection_point');
            $table->string('collection_time');
            $table->string('service_status');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
