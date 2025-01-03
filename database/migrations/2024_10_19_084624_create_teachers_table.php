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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('main_image_path')->nullable();
            $table->string('whatsapp');
            $table->string('telegram');
            $table->string('email');
            $table->string('phone');
            $table->string('category')->nullable();
            $table->string('secondary_image_path')->nullable();
            $table->text('quote');
            $table->text('education');
            $table->foreignId('supervised_course_id')->nullable()->constrained('courses')->cascadeOnDelete();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
