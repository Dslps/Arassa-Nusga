<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // Мультиязычные названия
            $table->string('title_ru', 255);
            $table->string('title_en', 255)->nullable();
            $table->string('title_tm', 255)->nullable();
            $table->text('list')->nullable(); // Поле для списка услуг
            $table->timestamps(); // Включает created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
}
