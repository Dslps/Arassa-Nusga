<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTableForCategories extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Удаляем старое поле 'categories', если оно уже существует
            if (Schema::hasColumn('services', 'categories')) {
                $table->dropColumn('categories');
            }

            // Добавляем три JSON-поля для категорий по языкам
            $table->json('categories_ru')->nullable()->after('list');
            $table->json('categories_en')->nullable()->after('categories_ru');
            $table->json('categories_tm')->nullable()->after('categories_en');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            // Удаляем новые поля
            $table->dropColumn('categories_ru');
            $table->dropColumn('categories_en');
            $table->dropColumn('categories_tm');

            // Восстанавливаем старое поле 'categories', если оно было
            $table->json('categories')->nullable()->after('list');
        });
    }
}
