<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Principle;
use App\Models\CompanyDescription;
use App\Models\Achievement;
use App\Models\Employee; 
use App\Models\Certificate; 

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        // Получение данных "О нас"
        $aboutUs = AboutUs::first() ?? new AboutUs();

        // Получение всех принципов работы
        $principles = Principle::all();

        // Получение описаний компаний
        $companyDescriptions = CompanyDescription::all();

        // Получение достижений
        $achievements = Achievement::all();

        // Получение всех сотрудников
        $employees = Employee::all();

        // Получение всех сертификатов
        $certificates = Certificate::all(); // Добавьте эту строку

        // Передача всех данных в представление
        return view('about-us', compact(
            'aboutUs', 
            'principles', 
            'companyDescriptions', 
            'achievements', 
            'employees',
            'certificates' // Добавьте эту переменную
        ));
    }
}
