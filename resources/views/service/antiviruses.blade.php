@extends('layouts.app')
@section('content')

    <x-service-component />
    {{-- -------------------------------------------------- --}}
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
                        <p class="base-text">Антивирус Касперского</p>
                        <div class="mt-[35px] space-y-[35px]">
                            <p class="relative inline-block">
                                Продукт обеспечивает защиту в режиме реального времени от основных информационных угроз — как известных, так и новых.
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                            <p class="relative inline-block">
                                В Kaspersky Anti-Virus входят новейшие технологии защиты от основных вредоносных программ, в том числе от эксплойтов, 
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                            <p class="relative inline-block">
                                Антивирус работает незаметно благодаря облачной защите, интеллектуальному сканированию и компактным обновлениям.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Блок 2 -->
                <div class="flex w-full flex-wrap h-max justify-start">
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Kaspersky Anti-Virus
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 копьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">01</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center justify-end text-[var(--comment-color)]">
                                            <p class="smaii-text font-semibold">продление: 340 тм</p>
                                        </div>
                                        <p class="number font-semibold">Установка: 440 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Kaspersky Internet Security
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">02</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center justify-end text-[var(--comment-color)]">
                                            <p class="smaii-text font-semibold">продление: 440 тм</p>
                                        </div>
                                        <p class="number font-semibold">Установка: 560 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Kaspersky Internet Security
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">3 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">03</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <p class="smaii-text font-semibold justify-end text-[var(--comment-color)]">продление: 460 тм</p>
                                        </div>
                                        <p class="number font-semibold">Установка: 620 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Kaspersky Internet Security
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">5 компьютеров</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">04</div>
                                <div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center justify-end text-[var(--comment-color)]">
                                            <p class="smaii-text font-semibold">продление: 340 тм</p>
                                        </div>
                                        <p class="number font-semibold">Установка: 440 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                   
                </div>

            </div>
            {{-- --------------------------------------------------------------------------------------- --}}
            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                <div class="flex w-full lg:w-[400px] hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="bg-[var(--accent-color)] w-full h-full sm:min-w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                        <p class="base-text">Антивирус ESET</p>
                        <div class="mt-[35px] space-y-[35px]">
                            <p class="relative inline-block">
                                Официальный антивирус гарантирует надежную защиту устройств, безопасное соединение с интернетом и мгновенное удаление угроз.
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                            <ul class="ml-[10px] text-[var(--white-color)] font-semibold group-hover:text-[var(--white-color)]">
                                <li class="list-marker">широкий выбор пакетов </li>
                                <li class="list-marker">регулярные обнавления</li>
                                <li class="list-marker">продукция подходит для любых ОС</li>
                            </ul>
                            <p class="relative inline-block">
                                Предлагаем защиту для устройств с функциями антивируса, менеджмента паролей и родительского контроля.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Блок 2 -->
                <div class="flex w-full flex-wrap h-max justify-start">
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                ESET NOD32
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 копьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">01</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 680 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Eset Internet Security
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">02</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 560 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Eset Home Security Premuim
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">3 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">03</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 620 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div
                            class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Eset Home Security Premuim
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">5 компьютеров</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">04</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 440 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                   
                </div>
            
            </div>
            {{-- ---------------------------------------------------------------------------- --}}
            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                <div class="flex w-full lg:w-[400px] hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="bg-[var(--accent-color)] w-full h-full sm:min-w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                        <p class="base-text">Антивирус ESET</p>
                        <div class="mt-[35px] space-y-[35px]">
                            <p class="relative inline-block">
                                Официальный антивирус гарантирует надежную защиту устройств, безопасное соединение с интернетом и мгновенное удаление угроз.
                                <span class="absolute left-0 w-full h-[2px] bg-[var(--white-color)] bottom-[-15px]"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Блок 2 -->
                <div class="flex w-full flex-wrap h-max justify-start">
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                ESET NOD32
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 копьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">01</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 680 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Eset Internet Security
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">2 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">02</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 560 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="w-full sm:w-[50%] lg:w-[50%] 2xl:w-[33%]" href="">
                        <div class="p-[30px] h-[220px] 2xl:h-[250px] lg:h-[220px] flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Eset Home Security Premuim
                            </p>
                            <ul
                                class="ml-[10px] text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Лицензия на год</li>
                                <li class="list-marker">3 компьютера</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">03</div>
                                <div>
                                    <div class="flex flex-col">
                                        <p class="number font-semibold">Установка: 620 тм</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                   
                </div>
            
            </div>
        </div>
    </div>
{{-- ---------------------------------------------------------------------------------------------------- --}}

@endsection