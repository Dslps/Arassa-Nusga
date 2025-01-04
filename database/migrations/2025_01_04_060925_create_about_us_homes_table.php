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
        Schema::create('about_us_homes', function (Blueprint $table) {
            $table->id();
            // Названия на трёх языках
            $table->string('title_ru', 255);
            $table->string('title_en', 255)->nullable();
            $table->string('title_tm', 255)->nullable();
            
            // Описания на трёх языках
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();
            
            // Путь к изображению
            $table->string('image_path')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_homes');
    }
};
