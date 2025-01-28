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
        Schema::create('courses', function (Blueprint $table) {
           $table->id();
           $table->string('slug');
            $table->string('name');
            $table->string('tumbnail');

            $table->text('abouts');
            $table->boolean('is_popular');

            //create foreignid key columns
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps(); // Create_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
