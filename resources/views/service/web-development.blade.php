@extends('layouts.app')
@section('content')
    {{-- ---------------------------начальная часть страницы-------------------------------- --}}
    <x-service-component />
    {{-- ------------------------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0 text-center lg:text-start">
                <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                <div class="flex flex-col">
                    <p class="title-2 font-semibold">Что входит в услугу</p>
                    <p class="max-w-[860px] mt-2 lg:mt-0">The quiet forest was alive with the sounds of nature. Birds chirped melodiously,
                        and a gentle breeze rustled the leaves, carrying the earthy scent of pine and moss. Sunlight
                        streamed through the</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                <div class="flex w-full lg:w-[400px] hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="bg-[var(--accent-color)] w-full h-full sm:min-w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                        <p class="base-text">Также входит:</p>
                        <div class="mt-[35px] space-y-[35px]">
                            <p class="relative inline-block">
                                Адаптивный дизайн: Обеспечение корректного отображения сайта на любых устройствах — от ПК и ноутбуков до мобильных телефонов.
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                            <p class="relative inline-block">
                                Адаптивный дизайн: Обеспечение корректного отображения сайта на любых устройствах — от ПК и ноутбуков до мобильных телефонов.
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                            <p class="relative inline-block">
                                Адаптивный дизайн: Обеспечение корректного отображения сайта на любых устройствах — от ПК и ноутбуков до мобильных телефонов.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Блок 2 -->
                <div class="flex flex-wrap h-max justify-start">
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Лендинг
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="">Целевая страница собирает контакты аудитории, усиливая рекламу и продвигая товар или услугу.</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">01</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <p class="smaii-text font-semibold">1 неделя</p>
                                        </div>
                                        <p class="number font-semibold">1000 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Сайт-каталог
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="">Сайт-каталог включает разделы новости, блог, галерея и др. карточки товаров/услуг, фото и видео.</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">02</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <p class="smaii-text font-semibold">3 неделя</p>
                                        </div>
                                        <p class="number font-semibold">12 000 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Многостраничник
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="">Многостраничники — это крупные сайты</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">03</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <p class="smaii-text font-semibold">2 неделя</p>
                                        </div>
                                        <p class="number font-semibold">10 000 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Интернет-магазин
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="">Интернет-магазины позволяют продавать товары онлайн, объединяя каталог и возможность покупки. </li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">04</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <p class="smaii-text font-semibold">3 неделя</p>
                                        </div>
                                        <p class="number font-semibold">24 000 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                   
                </div>

            </div>
        </div>
    </div>
    {{-- -------------------------------------Этапы разработки--------------------------------------- --}}
    <div class="w-full px-0 sm:px-5 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center sm:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden sm:block">//</span>
                <div class="max-w-[860px] ">
                    <p class="title-2 font-semibold">Этапы реализаций</p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-5 mt-[50px]">
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Идея</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Формирование замысла</li>
                            <li class="list-marker">Анализ и проработка</li>
                            <li class="list-marker">Визуализация и презентация</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">01</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0.4s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Техническое задание</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Сбор и анализ требований</li>
                            <li class="list-marker">Структурирование и документирование</li>
                            <li class="list-marker">Согласование и утверждение</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">02</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0.6s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Разработка</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Планирование и проектирование</li>
                            <li class="list-marker">Программирование</li>
                            <li class="list-marker">Тестирование и отладка</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">03</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0.8s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Подготовка приложения</li>
                            <li class="list-marker">Прохождение проверки</li>
                            <li class="list-marker">Размещение и запуск</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">04</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- -----------------------------Наши проекты--------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-5 lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex flex-col ">
            <div class="w-full flex flex-col sm:flex-row">
                <div class="flex items-center justify-center lg:justify-start">
                    <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:blog">//</span>
                    <p class="title-2 font-semibold">Наши проекты</p>
                </div>
                <div class="flex sm:ml-auto text-[var(--accent-color)]">
                    <div class=" flex gap-[40px] z-10 lg:mt-0 w-full lg:w-auto">
                        <button class="mr-auto slider-button" id="prevBtn">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="slider-button" id="nextBtn">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden flex flex-col ml-0">
                {{-- слайдер проектов --}}
                <div class="flex justify-start gap-[50px] mt-[50px] lg:mt-[100px]" id="slider">
                    {{-- 1 карточка --}}
                    <div class="w-[400px] h-max sm:w-[550px] sm:h-[500px] slide rounded-[10px]">
                        <div class="flex flex-col">
                            <div>
                                <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                            </div>
                            <div
                                class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Unite Gaming</p>
                                    <p class="small-text">Приложение сетевых игр </p>
                                </div>
                                <a href="">
                                    <div
                                        class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- 2 карточка --}}
                    <div class="w-[400px] h-max sm:w-[550px] sm:h-[500px] slide">
                        <div class="flex flex-col">
                            <div>
                                <img src="{{ asset('img/home-page/banner_3.png') }}" alt="">
                            </div>
                            <div
                                class="hover-button flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Museum Arcadag</p>
                                    <p class="small-text">Музей Ахалского велоята</p>
                                </div>
                                <a href="">
                                    <div
                                        class="w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- 3 карточка --}}
                    <div class="w-[400px] h-max sm:w-[550px] sm:h-[500px] slide">
                        <div class="flex flex-col">
                            <div>
                                <img src="{{ asset('img/home-page/banner_3.png') }}" alt="">
                            </div>
                            <div
                                class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Museum Arcadag</p>
                                    <p class="small-text">Музей Ахалского велоята</p>
                                </div>
                                <a href="">
                                    <div
                                        class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection