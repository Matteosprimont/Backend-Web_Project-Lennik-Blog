<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->foreignId('category_id')->constrained('faq_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_questions');
    }
};