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
        Schema::create('version_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('version_id');
            $table->unsignedBigInteger('department_id');
            $table->foreign('version_id')->references('id')->on('versions')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('version_departments');
    }
};
