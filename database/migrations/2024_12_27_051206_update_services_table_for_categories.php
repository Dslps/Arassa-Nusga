<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTableForCategories extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->json('categories')->nullable()->after('list'); // Добавляем колонку для категорий
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('categories'); // Откат изменений
        });
    }
}
