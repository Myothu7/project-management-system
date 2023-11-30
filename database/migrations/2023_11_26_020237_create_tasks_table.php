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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('version_id');
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('name');
            $table->string('parent_id')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('status');
            $table->foreign('version_id')->references('id')->on('versions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
