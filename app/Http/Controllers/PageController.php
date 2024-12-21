<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.page', [
            'title' => 'О нас',
            'content' => [
                'list' => [
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                    'Reprehenderit corrupti dignissimos fugiat laborum nemo!',
                ],
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis, magnam explicabo dolore quidem a neque.',
            ],
            'image' => asset('img/home-page/corparate.png'),
        ]);
    }

    public function services()
    {
        return view('pages.page', [
            'title' => 'Наши услуги',
            'content' => [
                'list' => [
                    'Мы предоставляем уникальные услуги для бизнеса.',
                    'Работаем по индивидуальным запросам клиентов.',
                ],
                'details' => 'Услуги включают консалтинг, разработку и поддержку.',
            ],
            'image' => asset('img/home-page/services.png'),
        ]);
    }

    public function contact()
    {
        return view('pages.page', [
            'title' => 'Контакты',
            'content' => [
                'list' => [
                    'Телефон: +123456789',
                    'Email: info@example.com',
                ],
                'details' => 'Свяжитесь с нами для получения подробной информации.',
            ],
            'image' => asset('img/home-page/contact.png'),
        ]);
    }
}
