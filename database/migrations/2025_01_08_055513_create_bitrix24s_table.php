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
        Schema::create('bitrix24s', function (Blueprint $table) {
            $table->id();
            // Титульные тексты
            $table->string('title_ru', 255);
            $table->string('title_en', 255);
            $table->string('title_tm', 255);
            
            // Описания
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('description_tm');
            
            // Фотографии (храним пути к файлам в формате JSON)
            $table->json('photos')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitrix24s');
    }
};
