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
        Schema::create('service_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NIC');
            $table->foreign('NIC')->references('NIC')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Customer_name');
            $table->unsignedBigInteger('registration_number');
            $table->foreign('registration_number')->references('registration_number')->on('cars')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Car_modal');
            $table->json('Washing_section')->nullable();
            $table->string('Washing_section_status')->nullable();
            $table->json('Interior_cleaning_section')->nullable();
            $table->string('Interior_cleaning_section_status')->nullable();
            $table->json('Service_section')->nullable();
            $table->string('service_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_jobs');
    }
};
