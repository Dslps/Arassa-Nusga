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
                {{--  1 карточка --}}
                <div class="animate-block flex flex-wrap w-full justify-start">
                    <div
                        class="bg-[var(--accent-color)] w-full sm:w-[50%] h-[250px] 2xl:w-[25%] text-[var(--white-color)] p-[30px] flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text font-semibold">Облако</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">Цифровое рабочее пространство</li>
                            <li class="list-marker">Управление задачами</li>
                            <li class="list-marker">Обмен файлами и сообщениями</li>
                            <li class="list-marker">Коммуникация</li>
                            <li class="list-marker">Работа в группах</li>
                        </ul>

                    </div>
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Для эффективной работы небольших компаний</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <div>
                                <div class="flex flex-col">
                                    <div class="flex items-center">
                                        <p class="smaii-text line-through font-semibold">230 тм</p>
                                        <div
                                            class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                            <p class="small-text">-20%</p>
                                        </div>
                                    </div>
                                    <p class="number font-semibold">200 тм</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 2 карточка --}}
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Для эффективной работы небольших компаний</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <div>
                                <div class="flex flex-col">
                                    <div class="flex items-center">
                                        <p class="smaii-text line-through font-semibold">230 тм</p>
                                        <div
                                            class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                            <p class="small-text">-20%</p>
                                        </div>
                                    </div>
                                    <p class="number font-semibold">200 тм</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3 карточка --}}
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Для эффективной работы небольших компаний</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <div>
                                <div class="flex flex-col">
                                    <div class="flex items-center">
                                        <p class="smaii-text line-through font-semibold">230 тм</p>
                                        <div
                                            class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                            <p class="small-text">-20%</p>
                                        </div>
                                    </div>
                                    <p class="number font-semibold">200 тм</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 4 карточка --}}
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Для эффективной работы небольших компаний</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <div>
                                <div class="flex flex-col">
                                    <div class="flex items-center">
                                        <p class="smaii-text line-through font-semibold">230 тм</p>
                                        <div
                                            class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                            <p class="small-text">-20%</p>
                                        </div>
                                    </div>
                                    <p class="number font-semibold">200 тм</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 5 карточка --}}
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Для эффективной работы небольших компаний</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <div>
                                <div class="flex flex-col">
                                    <div class="flex items-center">
                                        <p class="smaii-text line-through font-semibold">230 тм</p>
                                        <div
                                            class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                            <p class="small-text">-20%</p>
                                        </div>
                                    </div>
                                    <p class="number font-semibold">200 тм</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- ----------------------------------Этапы разработки----------------------------------- --}}
    <div class="w-full px-[30px] lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center lg:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden lg:block">//</span>
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
