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
        // Schema::create('subject_user', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('subjects_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('users_id')->constrained()->cascadeOnDelete();
        //     $table->timestamps();
        // });
        // Schema::create('level_user', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('levels_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('users_id')->constrained()->cascadeOnDelete();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_user');
    }
};
