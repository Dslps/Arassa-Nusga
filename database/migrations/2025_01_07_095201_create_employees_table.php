<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('position_ru', 255);
            $table->string('position_en', 255)->nullable();
            $table->string('position_tm', 255)->nullable();
            $table->string('name_ru', 255);
            $table->string('name_en', 255)->nullable();
            $table->string('name_tm', 255)->nullable();
            $table->string('photo')->nullable(); // Путь к изображению
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
