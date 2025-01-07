<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru', 255); 
            $table->string('title_en', 255)->nullable(); 
            $table->string('title_tm', 255)->nullable(); 
            $table->text('description_ru'); 
            $table->text('description_en')->nullable(); 
            $table->text('description_tm')->nullable(); 
            $table->string('photos')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('company_descriptions');
    }
}
