<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            // Храни несколько фото в формате JSON
            $table->json('photos')->nullable();

            // Титульный текст
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('title_tm', 255)->nullable();

            // Описание
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();

            // Доп. информация
            $table->text('additional_ru')->nullable();
            $table->text('additional_en')->nullable();
            $table->text('additional_tm')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }
};
