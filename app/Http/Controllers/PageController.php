<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // Получаем имя текущего маршрута
        $page = $request->route()->getName(); 

        // Массив с данными для разных страниц
        $carouselData = [
            'home' => [
                'title' => 'Качество',
                'description' => 'Мы не стремимся быть лучше всех...',
                'image' => 'img/home-page/corparate.png',
                'link' => '/service',
            ],
            'about' => [
                'title' => 'О нас',
                'description' => 'Мы команда профессионалов...',
                'image' => 'img/home-page/about.png',
                'link' => '/about',
            ],
            'service' => [
                'title' => 'Услуги',
                'description' => 'Мы предлагаем широкий спектр услуг...',
                'image' => 'img/home-page/service.png',
                'link' => '/services',
            ],
        ];

        // Возвращаем представление с данными для текущей страницы
        return view('welcome', ['carousel' => $carouselData[$page]]);
    }
}
