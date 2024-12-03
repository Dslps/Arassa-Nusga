@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="max-w-[2000px] m-auto">
            <div class="carousel-container relative">
                <div class="carousel-wrapper w-full flex">
                    <!-- Первый слайд -->
                    <div class="carousel-item relative">
                        <img class="w-full h-auto" src="{{ asset('img/home-page/corparate.png') }}" alt="">
                        <div
                            class="absolute flex items-center inset-0 left-0 lg:w-[800px] w-full lg:justify-start justify-center bg-gradient-to-r from-[#243060] to-transparent">
                            <div
                                class="text-[var(--white-color)] w-[33,33%] lg:ml-[100px] m-0 flex justify-center flex-col lg:text-start text-center ">
                                <p class="title">Качество</p>
                                <div class="relative base-text pl-[15px] ml-[10px] max-w-[500px]">
                                    Мы не стремимся быть лучше всех, мы стремимся быть лучше, чем вчера. Потому что качество
                                    — это движение вперед, где каждая ступень ведет к совершенству.
                                    <div
                                        class="absolute left-[-5px] top-0 h-full border-l-[5px] border-[var(--white-color)] rounded-l-[10px]">
                                    </div>
                                </div>
                                <a href="">
                                    <div
                                        class="w-[230px] h-[40px] flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                                        <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item relative">
                        <img class="w-full h-auto" src="{{ asset('img/home-page/corparate.png') }}" alt="">
                        <div
                            class="absolute flex items-center inset-0 left-0 lg:w-[800px] w-full lg:justify-start justify-center bg-gradient-to-r from-[#243060] to-transparent">
                            <div
                                class="text-[var(--white-color)] w-[33,33%] lg:ml-[100px] m-0 flex justify-center flex-col lg:text-start text-center ">
                                <p class="title">Качество</p>
                                <div class="relative base-text pl-[15px] ml-[10px] max-w-[500px]">
                                    Мы не стремимся быть лучше всех, мы стремимся быть лучше, чем вчера. Потому что качество
                                    — это движение вперед, где каждая ступень ведет к совершенству.
                                    <div
                                        class="absolute left-[-5px] top-0 h-full border-l-[5px] border-[var(--white-color)] rounded-l-[10px]">
                                    </div>
                                </div>
                                <a href="">
                                    <div
                                        class="w-[230px] h-[40px] flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                                        <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item relative">
                        <img class="w-full h-auto" src="{{ asset('img/home-page/corparate.png') }}" alt="">
                        <div
                            class="absolute flex items-center inset-0 left-0 lg:w-[800px] w-full lg:justify-start justify-center bg-gradient-to-r from-[#243060] to-transparent">
                            <div
                                class="text-[var(--white-color)] w-[33,33%] lg:ml-[100px] m-0 flex justify-center flex-col lg:text-start text-center ">
                                <p class="title">Качество</p>
                                <div class="relative base-text pl-[15px] ml-[10px] max-w-[500px]">
                                    Мы не стремимся быть лучше всех, мы стремимся быть лучше, чем вчера. Потому что качество
                                    — это движение вперед, где каждая ступень ведет к совершенству.
                                    <div
                                        class="absolute left-[-5px] top-0 h-full border-l-[5px] border-[var(--white-color)] rounded-l-[10px]">
                                    </div>
                                </div>
                                <a href="">
                                    <div
                                        class="w-[230px] h-[40px] flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                                        <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Кнопки переключения слайдов -->
            <div
                class="lg:max-w-[800px] w-full h-[140px] bg-[var(--accent-color)] text-[var(--white-color)] flex items-center">
                <div class="carousel-dots flex gap-5 justify-center ml-[100px] ">
                    <span class="dot w-3 h-3 bg-[var(--white-color)] rounded-full mx-2 cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-[var(--white-color)] rounded-full mx-2 cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-[var(--white-color)] rounded-full mx-2 cursor-pointer"></span>
                </div>
                <div class="ml-auto flex gap-[45px] pr-[45px]">
                    <button class="carousel-prev w-[50px] h-[50px] border-2 rounded-full">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button class="carousel-next w-[50px] h-[50px] border-2 rounded-full">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------------------------------НАШИ УСЛУГИ------------------------------------------------------ --}}
    <div class="w-full px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <p class="title-2 font-semibold text-center lg:text-start">Наши услуги</p>

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                <div class="flex w-full h-max lg:w-[300px] 2xl:w-[400px] lg:h-[500px]">
                    <div class="bg-[var(--accent-color)] w-full lg:w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                        <p class="base-text">Бизнес консалтинг</p>
                        <ul class="list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">Стратегическое планирование</li>
                            <li class="list-marker">Оптимизация бизнес-процессов</li>
                            <li class="list-marker">Управление изменениями</li>
                        </ul>
                        <div class="flex items-center justify-between mt-auto">
                            <div class="number">01</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            
                <div class="flex flex-wrap max-w-[1300px] justify-start ">
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">02</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
            
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">03</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">04</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
            
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">05</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">06</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
            
                    <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[400px] lg:h-[250px] flex flex-col bg-white ">
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового учета</p>
                        <ul class="ml-[10px]">
                            <li class="list-marker">Внедрение ERP-систем</li>
                            <li class="list-marker">Системы управления бюджетированием</li>
                            <li class="list-marker">Управление расчетами и платежами</li>
                        </ul>
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">07</div>
                            <a href="">
                                <div class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
            
                   

                </div>
            </div>
            
            
        </div>
    </div>
    {{-- -----------------------------------------------О НАС--------------------------------------------------------- --}}
        <div class="w-full mx-auto max-w-[2000px] m-auto flex flex-col lg:flex-row bg-[var(--template-color)] mt-[115px]">
            <div class="flex justify-center w-full lg:w-[850px] overflow-hidden">
                <img src="{{ asset('img/home-page/building.png') }}" alt="" class="w-full lg:w-auto h-auto object-cover">
            </div>
            
            <div class="px-10 py-16 lg:p-[80px] xl:p-[100px] text-[var(--white-color)]">
                <div class="max-w-[870px]">
                    <p class="title-2 max-w-[430px] mb-[40px] font-semibold">Работаем для вас с 2017 года</p>
                    <ul class="ml-[10px] base-text space-y-[15px]">
                        <li class="list-marker">Консалтинговая компания «Arassa Nusga», основанная в 2017 году в составе Lotta Business Group, работает под девизом: «Качество. Инновации. Решения».</li>
                        <li class="list-marker">Наша команда объединяет высококвалифицированных специалистов из различных отраслей. Мы предлагаем широкий спектр профессиональных консалтинговых услуг, направленных на повышение эффективности вашей деятельности, улучшение качества работы сотрудников, решение актуальных бизнес-задач и увеличение прибыли вашей компании.</li>
                        <li class="list-marker">Мы всегда стремимся превзойти ожидания наших клиентов, предоставляя больше, чем от нас ожидают. Успех наших клиентов — это наша лучшая репутация.</li>
                    </ul>
                    <ul class="ml-[10px] mt-[30px] base-text space-y-[15px]">
                        <li class="list-marker">Компания «Arassa Nusga» объединена общим стремлением к приобретению новых знаний и навыков в профессиональной сфере. Мы смело реализуем свои идеи, выходя за рамки привычного, и понимаем, что каждая идея может стать новой возможностью для всей компании. Именно поэтому мы открыты к изменениям и готовы пересматривать устоявшиеся подходы.</li>
                        <li class="list-marker">Мы ценим сотрудников, которые стремятся к профессиональному и личностному росту, делятся знаниями с коллегами и работают в интересах компании. Для нас КОМАНДА — это не просто группа людей, а сила, объединенная общими целями и ценностями.</li>
                    </ul>
                </div>
            </div>
        </div>
    {{-- ------------------------------НАШИ ПРОЕКТЫ-------------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-10 lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex flex-col lg:flex-row ">
            <div class=" lg:w-[580px] w-full">
                <p class="title-2 font-semibold">Наши проекты</p>
                <div class="ml-[30px] mt-[50px]">
                    <ul class="space-y-[15px] text-[var(--accent-color)] font-bold">
                        <li class="list-marker">Лендинг страницы</li>
                        <li class="list-marker">Сайты каталог</li>
                        <li class="list-marker">Многостраничные сайты</li>
                    </ul>
                    <ul class="mt-[50px] space-y-[20px]">
                        <li>
                            Наши проекты включают разработку и поддержку веб-приложений с использованием современных технологий, таких как PHP (Laravel), JavaScript (Node.js, React, jQuery), а также мобильных приложений на Flutter. 
                        </li>
                        <li>
                            Основное внимание уделяется созданию удобного пользовательского интерфейса, оптимизации базы данных, улучшению клиентского опыта и интеграции BI-отчетности через инструменты вроде Power BI, Google Looker Studio и MS Excel.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full overflow-hidden flex flex-col ml-0 lg:ml-[50px] xl:ml-[130px]">
                {{-- кнопки слайдера --}}
                <div class="flex lg:ml-auto lg:mr-[150px] text-[var(--accent-color)] relative">
                    <div class=" flex absolute gap-[40px] z-10 lg:mt-0 sm:mt-[275px] mt-[225px] w-full lg:w-auto">
                        <button class="mr-auto button-service" id="prevBtn">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="button-service" id="nextBtn">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            
                {{-- слайдер проектов --}}
                <div class="flex justify-start gap-[50px] mt-[50px] lg:mt-[100px]" id="slider">
                    {{-- 1 карточка --}}
                    <div class="w-[400px] h-max sm:w-[550px] sm:h-[500px] slide rounded-[10px]">
                        <div class="flex flex-col">
                            <div>
                                <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                            </div>
                            <div class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Unite Gaming</p>
                                    <p class="small-text">Приложение сетевых игр </p>
                                </div>
                                <a href="">
                                    <div class="w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
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
                            <div class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Museum Arcadag</p>
                                    <p class="small-text">Музей Ахалского велоята</p>
                                </div>
                                <a href="">
                                    <div class="w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
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
                            <div class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                                <div class="p-5">
                                    <p class="projet-size-text">Museum Arcadag</p>
                                    <p class="small-text">Музей Ахалского велоята</p>
                                </div>
                                <a href="">
                                    <div class="w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
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
    {{-- ----------------------------------------ПАРТНЕРЫ--------------------------------------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-10 lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div>
            <div class="flex justify-between">
                <p class="title-2 font-semibold">Наши парнеры</p>
                <div class="flex gap-[40px]">
                    <button class="button-service" id="prevBtn">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button class="button-service" id="nextBtn">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-6">
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/akbulut-logo.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/akinsoft.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/altynyunus5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/bazarym5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/bitrix245.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/dukanym5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/emay5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/gochdash.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/golf-club-logo.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/hayyat5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center border-r-2 border-b-2 border-gray-300">
                    <img src="{{ asset('img/home-page/jayym-new5.png') }}" alt="">
                </div>
                <div class="w-[250px] h-[250px] flex justify-center items-center">
                    <img src="{{ asset('img/home-page/kitap-market-logo2.png') }}" alt="">
                </div>
            </div>
            
        </div>
    </div>
@endsection
