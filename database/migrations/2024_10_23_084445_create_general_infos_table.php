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
        Schema::create('general_infos', function (Blueprint $table) {
            $table->id();
            $table->json('menu_names');
            $table->string('address');
            $table->string('whatsapp');
            $table->string('youtube');
            $table->string('vk');
            $table->string('telegram_channel');
            $table->string('telegram_group');
            $table->boolean('show_offline_course')->default(false);
            $table->boolean('show_schedule')->default(false);
            $table->json('format')->nullable();
            $table->string('banner_title');
            $table->string('banner_subtitle');
            $table->string('banner_btn_text');
            $table->string('banner_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_infos');
    }
};
