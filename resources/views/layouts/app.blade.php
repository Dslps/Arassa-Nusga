<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="w-full max-w-[2000px] mx-auto lg:h-[15vh] h-[140px] z-10"  id="top">
        <nav class="w-full flex h-full small-text">
            <div class="lg:w-[800px] bg-[var(--accent-color)] h-full flex items-center px-[50px] xl:px-[100px] w-full">
                <div class="">
                    <!-- Кнопка для открытия хедера -->
                    <button id="toggle-header" class="text-white">
                        <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <a href="{{route('home')}}">
                    <img class="w-[160px] h-[40px] xl:w-[180px] xl:h-[50px] 2xl:w-[200px] 2xl:h-[50px] ml-[20px] xl:ml-[20px]  2xl:ml-[40px]"
                        src="{{ asset('img/logo.png') }}" alt="">
                </a>

                <div class="flex text-[var(--white-color)] gap-[5px] ml-auto">
                    <p class=" font-semibold"><a href="#">Rus</a></p>
                    <span>/</span>
                    <p class=" font-semibold"><a href="#">Tm</a></p>
                    <span>/</span>
                    <p class=" font-semibold"><a href="#">Eng</a></p>
                </div>
            </div>
            <div class="lg:flex items-center justify-between px-[50px] xl:px-[100px] w-[1120px] hidden">
                <div class="flex gap-[5px]">
                    <p class="font-semibold relative inline-block">
                        <a href="{{route('home')}}" class="nav-link {{ Request::routeIs('home') ? 'before:w-full' : '' }}">
                            Главная
                        </a>
                    </p>
                    
                    
                    
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <div class="relative group">
                        <!-- Основная кнопка -->
                        <p class="font-semibold relative inline-block">
                            <a href="{{route('bitrix24')}}" class="nav-link {{ Request::routeIs('bitrix24') ? 'before:w-full' : '' }}">
                                Услуги
                            </a>
                        </p>
                    
                        <!-- Выпадающий список -->
                        <div class="absolute z-[2] left-1/2 transform -translate-x-1/2 mt-2 w-[250px] bg-[var(--accent-color)] text-[var(--white-color)] rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 p-[15px]">
                            <a href="{{asset('bitrix24')}}" class="block px-4 py-2 text-[var(--white-color)">Битрикс 24</a>
                            <a href="{{asset('bitrix24')}}" class="block px-4 py-2 text-[var(--white-color)">Мобильные приложения</a>
                            <a href="{{asset('bitrix24')}}" class="block px-4 py-2 text-[var(--white-color)">Разработка сайтов</a>
                            <a href="{{asset('bitrix24')}}" class="block px-4 py-2 text-[var(--white-color)">Антивирусы</a>
                        </div>
                    </div>
                    
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{route('about-us')}}" class="nav-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}">
                            О нас
                        </a>
                    </p>
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{route('blog')}}" class="nav-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}">
                            Блог
                        </a>
                    </p>
                    <span class=" font-black text-[var(--accent-color)]">//</span>
                    <p class="font-semibold relative inline-block">
                        <a href="{{route('project')}}" class="nav-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}">
                            Проекты
                        </a>
                    </p>
                </div>
                <div>
                    <p class="font-semibold relative inline-block">
                        <a href="{{route('contact')}}" class="nav-link {{ Request::routeIs('contact') ? 'before:w-full' : '' }}">
                            +993-(71)-55-66-84
                        </a>
                    </p>
                </div>
            </div>
        </nav>

        <!-- Скрытый блок, который будет разворачиваться -->
        <div id="full-header"
            class="hidden fixed top-0 left-0 w-full h-screen bg-[var(--accent-color)] text-white p-[100px] flex gap-8">
            <button id="close-header" class="text-white absolute top-[70px] left-[100px]">
                <i class="text-[25px] fa-solid fa-xmark"></i></button>
            <div class="flex">
                <div class="flex ">
                    <p><a href="#">Главная</a></p>
                    <p><a href="#">Услуги</a></p>
                    <p><a href="#">О нас</a></p>
                    <p><a href="#">Блог</a></p>
                    <p><a href="#">Проекты</a></p>
                </div>

            </div>
        </div>
    </header>




    @yield('content')

    <footer>
        <div class="w-full max-w-[2000px] mx-auto bg-[var(--template-color)] lg:h-[500px] h-max mt-[250px]">

            <div class="relative text-[var(--white-color)]">
                <div class="flex lg:flex-row flex-col justify-between lg:items-center lg:absolute left-[100px] right-[100px] 2xl:mt-[-150px] xl:mt-[-125px] mt-[-100px]  2xl:h-[300px] xl:h-[250px] h-max lg:p-0 p-5 bg-[var(--accent-color)]">
                    <div class="xl:ml-[90px] lg:ml-[50px] m-auto  flex items-center">
                        <div class="w-full lg:max-w-[400px]">
                            <p class="title-2 text-center lg:text-start">Начнем сотруднечество</p>
                        </div>
                    </div>
                    <div class="p-0 lg:p-5 m-auto">
                        <div class="flex items-center max-w-[680px] m-auto py-[10px] lg:py-0">
                            <p class="title mr-[10px]">//</p>
                            <p class="base-text">Напишите нам сообщение — и наш менеджер свяжется с вами в ближайшее время. Мы поможем воплотить ваши проекты в жизнь и сделать их максимально успешными!</p>
                        </div>
                    </div>
                    <a class="" href="">
                        <div class="hover-button flex justify-center items-center h-[50px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] 2xl:h-[300px] 2xl:w-[300px] bg-[var(--button-color)] text-[var(--white-color)]">
                            <div class="flex items-center base-text">
                                <p class="">Написать</p>
                                <i class="ml-[10px] fa-solid fa-arrow-right-long"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="flex flex-wrap justify-center text-[var(--white-color)] px-5 lg:px-[100px] 2xl:pt-[180px] xl:pt-[160px] lg:pt-[140px] pt-[30px]">
                <div class="flex-1 p-5">
                    <p class="">Навигация</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Главная</a></li>
                        <li class="list-marker"><a href="">О нас</a></li>
                        <li class="list-marker"><a href="">Блог</a></li>
                        <li class="list-marker"><a href="">Проекты</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Услуги</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Битрикс 24</a></li>
                        <li class="list-marker"><a href="">Мобильные приложения</a></li>
                        <li class="list-marker"><a href="">Веб-разработка</a></li>
                        <li class="list-marker"><a href="">Антивирусы</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Конфиндециальность</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Политика</a></li>
                        <li class="list-marker"><a href="">Договор</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Контакты</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-regular fa-envelope"></i>
                                info@arassanusga.com
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-solid fa-phone"></i>
                                +99312754480
                            </a>
                            <span>/</span>
                            <a href="">+99361648605</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="#top">
            <div class="w-[50px] h-[50px] fixed bottom-[50px] right-[50px] flex justify-center items-center bg-[var(--accent-color)] rounded-full">
                <i class="text-[var(--white-color)] fa-solid fa-arrow-up"></i>
            </div>
        </a>
    </footer>
</body>

</html>
