<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitrix24CloudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitrix24_cloud', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary(); // ID задаётся вручную
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitrix24_cloud');
    }
}
