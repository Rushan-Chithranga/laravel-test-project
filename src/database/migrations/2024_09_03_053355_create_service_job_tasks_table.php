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
        Schema::create('service_job_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('services');
            $table->string('service_tasks');
            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('service_jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('service_task_status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_job_tasks');
    }
};
