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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['bootcamp', 'hackathon', 'internship', 'innovation_challenge', 'startup_program']);
            $table->text('description');
            $table->string('duration')->nullable();
            $table->string('eligibility')->nullable();
            $table->date('deadline')->nullable();
            $table->string('image')->nullable();
            $table->string('apply_link')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
