<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrinciplesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('principles', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru', 30);
            $table->string('title_en', 30)->nullable();
            $table->string('title_tm', 30)->nullable();
            $table->text('description_ru');
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();
            $table->string('photos')->nullable(); // Хранение пути к изображению
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('principles');
    }
}
