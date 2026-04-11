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
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Author name
            $table->string('program'); // Program name
            $table->text('testimonial'); // Success story text
            $table->string('image')->nullable(); // Author image
            $table->boolean('is_featured')->default(false); // Featured story
            $table->integer('sort_order')->default(0); // Display order
            $table->boolean('status')->default(true); // Active/inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('success_stories');
    }
};
