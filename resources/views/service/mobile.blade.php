@extends('layouts.app')
@section('content')
    <x-service-component />
    {{-- ----------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0  text-center lg:text-start">
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
                        <p class="base-text">Наши возможности по разработке мобильных приложений</p>
                        <ul class="list-none pl-[10px] space-y-[5px] mt-[30px] small-text">
                            <li class="list-marker">Мы предлагаем широкий спектр мобильных решений, которые могут
                                удовлетворить потребности различных бизнес-сегментов. Наша команда обладает опытом в
                                создании надежных и удобных приложений, которые оптимизируют процессы и обеспечивают высокий
                                уровень взаимодействия с пользователями. Вот несколько категорий мобильных приложений,
                                которые мы можем разработать:</li>
                        </ul>
                    </div>
                </div>
                <!-- Блок 2 -->
                <div class="flex flex-wrap h-max justify-start">
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Приложения для бизнеса
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Приложения для управления проектами</li>
                                <li class="list-marker">Приложения для учёта и планирования</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    01
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Электронная коммерция
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Интернет-магазины</li>
                                <li class="list-marker">Приложения для продажи товаров и услуг</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    02
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Образовательные приложения
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Онлайн-курсы</li>
                                <li class="list-marker">Приложения для обучения языкам</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    03
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Приложения для новостей и медиа
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Новости</li>
                                <li class="list-marker">Доска объявлений</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    04
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Приложения для финансов и учета
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Банкинг</li>
                                <li class="list-marker">Программы для ведения бюджета</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    05
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[250px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Приложения для работы с данными и аналитика
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Программы для визуализации данных</li>
                                <li class="list-marker">Приложения для статистики</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    06
                                </div>
                            </div>
                        </div>
                    </a>


                </div>

            </div>
        </div>
    </div>
    {{-- ----------------------------------Этапы разработки----------------------------------- --}}
    <div class="w-full px-0 sm:px-5 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center sm:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden sm:block">//</span>
                <div class="max-w-[860px] ">
                    <p class="title-2 font-semibold">Этапы разработки</p>
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
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 1s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Подготовка приложения</li>
                            <li class="list-marker">Прохождение проверки</li>
                            <li class="list-marker">Размещение и запуск</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">05</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 1.2s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Подготовка приложения</li>
                            <li class="list-marker">Прохождение проверки</li>
                            <li class="list-marker">Размещение и запуск</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">06</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 1.4s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Подготовка приложения</li>
                            <li class="list-marker">Прохождение проверки</li>
                            <li class="list-marker">Размещение и запуск</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">07</p>
                    </div>
                    <div class="p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 1.8s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Подготовка приложения</li>
                            <li class="list-marker">Прохождение проверки</li>
                            <li class="list-marker">Размещение и запуск</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">08</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
