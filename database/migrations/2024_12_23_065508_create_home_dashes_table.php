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
            $table->id(); // Первичный ключ
            $table->string('title'); // Поле для заголовка
            $table->text('description')->nullable(); // Поле для описания (может быть NULL)
            $table->string('image_path')->nullable(); // Поле для пути к изображению (может быть NULL)
            $table->timestamps(); // Поля created_at и updated_at
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
