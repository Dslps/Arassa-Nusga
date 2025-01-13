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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('photos')->nullable();
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('title_tm', 255)->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();
            $table->text('additional_ru')->nullable();
            $table->text('additional_en')->nullable();
            $table->text('additional_tm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
