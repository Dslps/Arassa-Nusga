<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/jquery.min.js', 'resources/js/app.js', 'resources/css/slick.css', 'resources/js/slick.min.js'])
</head>

<body>
    <header class="header w-full max-w-[2000px] mx-auto lg:h-[15vh] h-[140px] z-10">
        <nav class="w-full flex h-full small-text">
            <div
                class="lg:w-[800px] bg-[var(--accent-color)] h-full flex items-center px-[30px] lg:px-[60px] 2xl:px-[100px] w-full">
                <div class=" lg:hidden block">
                    <!-- Кнопка для открытия хедера -->
                    <button id="toggle-header" class="text-white">
                        <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <a href="{{ route('home') }}">
                    <img class="w-[120px] h-[35px] sm:w-[160px] sm:h-[45px] xl:w-[180px] xl:h-[50px] 2xl:w-[200px] 2xl:h-[55px] ml-[20px] xl:ml-[20px]  2xl:ml-[40px]"
                        src="{{ asset('img/logo.png') }}" alt="">
                </a>

                <div class="flex text-white gap-[5px] ml-auto">
                    <p class="font-semibold">
                        <a href="{{ route('language.switch', ['locale' => 'ru']) }}">Rus</a>
                    </p>
                    <span>/</span>
                    <p class="font-semibold">
                        <a href="{{ route('language.switch', ['locale' => 'tm']) }}">Tm</a>
                    </p>
                    <span>/</span>
                    <p class="font-semibold">
                        <a href="{{ route('language.switch', ['locale' => 'en']) }}">Eng</a>
                    </p>
                </div>
                
               

                


            </div>
            <div
                class="lg:flex bg-[var(--white-color)] items-center justify-between px-[30px] lg:px-[60px] 2xl:px-[100px] w-[1120px] hidden">
                <div class="flex gap-[5px]">
                    <p class="font-semibold relative inline-block">
                        <a href="{{ route('home') }}"
                            class="nav-link {{ Request::routeIs('home') ? 'before:w-full' : '' }}">
                            Главная
                        </a>
                    </p>



                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <div class="relative group">
                        <!-- Основная кнопка -->
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('bitrix24') }}"
                                class="nav-link {{ Request::routeIs('bitrix24') ? 'before:w-full' : '' }}">
                                Услуги
                            </a>
                        </p>

                        <!-- Выпадающий список -->
                        <div
                            class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-2 w-[250px] bg-[var(--accent-color)] text-[var(--white-color)] rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 p-[15px]">
                            <a href="{{ asset('bitrix24') }}" class="block px-4 py-2 text-[var(--white-color)">Битрикс
                                24</a>
                            <a href="{{ asset('mobile') }}" class="block px-4 py-2 text-[var(--white-color)">Мобильные
                                приложения</a>
                            <a href="{{ asset('web-development') }}"
                                class="block px-4 py-2 text-[var(--white-color)">Разработка сайтов</a>
                            <a href="{{ asset('antiviruses') }}"
                                class="block px-4 py-2 text-[var(--white-color)">Антивирусы</a>
                        </div>
                    </div>

                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{ route('about-us') }}"
                            class="nav-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}">
                            О нас
                        </a>
                    </p>
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{ route('blog') }}"
                            class="nav-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}">
                            Блог
                        </a>
                    </p>
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{ route('project') }}"
                            class="nav-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}">
                            Проекты
                        </a>
                    </p>
                </div>
                <div>
                    <p class="font-semibold relative inline-block">
                        <a href="{{ route('contact') }}"
                            class="nav-link {{ Request::routeIs('contact') ? 'before:w-full' : '' }}">
                            +993-(71)-55-66-84
                        </a>
                    </p>
                </div>
            </div>
        </nav>
        {{-- <p>Current locale: {{ app()->getLocale() }}</p>
        <p>Session data:</p>
        <pre>
            {{ print_r(Session::all(), true) }}
        </pre> --}}
        <!-- Скрытый блок, который будет разворачиваться -->
        <p>Current Locale: {{ \Illuminate\Support\Facades\Log::info('Blade: Current locale is ' . App::getLocale()) }}
        </p>
<p>{{ __('messages.welcome') }}</p>
        
        <div id="full-header"
            class="hidden fixed top-0 left-0 w-full h-screen bg-[var(--accent-color)] text-white p-[60px] flex gap-8">
            <button id="close-header" class="text-white absolute top-[50px] left-[35px]">
                <i class="text-[25px] fa-solid fa-xmark"></i></button>
            <div class="flex flex-col mt-5">
                <div class="flex flex-col space-y-5 mt-5">
                    <p style="font-size: 24px; font-weight:600;" class=""><a
                            href="{{ route('home') }}">Главная</a></p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('about-us') }}">О нас</a></p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('blog') }}">Блог</a></p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('project') }}">Проекты</a></p>
                </div>
                <div class="space-y-5 mt-5">
                    <p style="font-size: 24px; font-weight:600;">Услуги</p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('bitrix24') }}">Битрикс 24</a></p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('mobile') }}">Мобильные приложения</a>
                    </p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('web-development') }}">Разработка
                            сайтов</a></p>
                    <p style="font-size: 20px;" class=""><a href="{{ route('antiviruses') }}">Антивирусы</a></p>
                </div>
                <div>
                    <p class="mt-5" style="font-size: 24px; font-weight:600;">Связь с нами:</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li>
                            <a class="bottom-link" href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-regular fa-envelope"></i>
                                info@arassanusga.com
                            </a>
                        </li>
                        <li>
                            <a class="bottom-link" href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-phone"></i>
                                +99312754480
                            </a>
                            <span>/</span>
                            <a class="bottom-link" href="{{ route('contact') }}">+99361648605</a>
                        </li>
                        <li>
                            <a class="bottom-link" href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-instagram"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>




    @yield('content')

    <footer class="footer-nav">
        <div class="w-full max-w-[2000px] mx-auto bg-[var(--template-color)] lg:h-[500px] h-max mt-[250px]">

            <div class="relative text-[var(--white-color)]">
                <div
                    class="flex lg:flex-row flex-col justify-between lg:items-center lg:absolute 2xl:left-[100px] 2xl:right-[100px] lg:left-[60px] lg:right-[60px] 2xl:mt-[-150px] xl:mt-[-125px] mt-[-100px]  2xl:h-[300px] xl:h-[250px] h-max lg:p-0 p-[30px] bg-[var(--accent-color)]">
                    <div class="xl:ml-[90px] lg:ml-[50px] m-auto  flex items-center">
                        <div class="w-full lg:max-w-[400px]">
                            <p class="title-2 text-center lg:text-start">Начнем сотруднечество</p>
                        </div>
                    </div>
                    <div class="p-0 lg:p-5 m-auto">
                        <div class="flex items-center max-w-[680px] m-auto py-[10px] lg:py-0">
                            <p class="title mr-[10px] hidden lg:blog">//</p>
                            <p class="base-text text-center lg:text-start">Напишите нам сообщение — и наш менеджер
                                свяжется с вами в ближайшее время. Мы поможем воплотить ваши проекты в жизнь и сделать
                                их максимально успешными!</p>
                        </div>
                    </div>
                    <a class="" href="">
                        <div
                            class="hover-button flex justify-center items-center h-[50px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] 2xl:h-[300px] 2xl:w-[300px] bg-[var(--button-color)] text-[var(--white-color)]">
                            <div class="flex items-center base-text">
                                <p class="">Написать</p>
                                <i class="ml-[10px] fa-solid fa-arrow-right-long"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div
                class="flex flex-wrap justify-center text-[var(--white-color)] px-[30px] lg:px-[100px] 2xl:pt-[180px] xl:pt-[160px] lg:pt-[140px] pt-[30px]">
                <div class="flex-1 p-5">
                    <p class="">Навигация</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('home') ? 'before:w-full' : '' }}"
                                href="{{ route('home') }}">Главная</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}"
                                href="{{ route('about-us') }}">О нас</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}"
                                href="{{ route('blog') }}">Блог</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}"
                                href="{{ route('project') }}">Проекты</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Услуги</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('bitrix24') ? 'before:w-full' : '' }}"
                                href="{{ route('bitrix24') }}">Битрикс 24</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('mobile') ? 'before:w-full' : 'mobile' }}"
                                href="{{ route('mobile') }}">Мобильные приложения</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('web-development') ? 'before:w-full' : '' }}"
                                href="{{ route('web-development') }}">Веб-разработка</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('antiviruses') ? 'before:w-full' : '' }}"
                                href="{{ route('antiviruses') }}">Антивирусы</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Конфиндециальность</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                href="">Политика</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                href="">Договор</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Контакты</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-regular fa-envelope"></i>
                                info@arassanusga.com
                            </a>
                        </li>
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-phone"></i>
                                +99312754480
                            </a>
                            <span>/</span>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">+99361648605</a>
                        </li>
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-instagram"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>
