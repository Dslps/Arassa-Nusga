<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->text('top_text_ru')->nullable(); // Верхний текст (RU)
            $table->text('top_text_en')->nullable(); // Верхний текст (EN)
            $table->text('top_text_tm')->nullable(); // Верхний текст (TM)
            $table->string('title_ru')->nullable();  // Титульный текст (RU)
            $table->string('title_en')->nullable();  // Титульный текст (EN)
            $table->string('title_tm')->nullable();  // Титульный текст (TM)
            $table->text('description_ru')->nullable(); // Описание (RU)
            $table->text('description_en')->nullable(); // Описание (EN)
            $table->text('description_tm')->nullable(); // Описание (TM)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
}
