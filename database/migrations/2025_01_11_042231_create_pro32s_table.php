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
        Schema::create('pro32s', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary(); 
            $table->string('title_ru', 40);
            $table->string('title_en', 40)->nullable();
            $table->string('title_tm', 40)->nullable();
            $table->json('categories_ru')->nullable();
            $table->json('categories_en')->nullable();
            $table->json('categories_tm')->nullable();
            $table->unsignedInteger('discount')->nullable()->default(0);
            $table->decimal('price', 10, 2)->unsigned()->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro32s');
    }
};
