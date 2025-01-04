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
    Schema::create('home_dashes', function (Blueprint $table) {
        $table->id();
        $table->string('title_ru'); // Название (RU)
        $table->string('title_en'); // Название (EN)
        $table->string('title_tm'); // Название (TM)
        $table->text('description_ru')->nullable(); // Описание (RU)
        $table->text('description_en')->nullable(); // Описание (EN)
        $table->text('description_tm')->nullable(); // Описание (TM)
        $table->string('image_path')->nullable(); // Путь к изображению
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_dashes'); // Удаляет таблицу при откате миграции
    }
};
