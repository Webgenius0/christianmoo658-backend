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
        Schema::create('option_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_with_option_id')->constrained('quiz_with_options')->cascadeOnDelete();
            $table->string('question');
            $table->string('tip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_quiz_questions');
    }
};
