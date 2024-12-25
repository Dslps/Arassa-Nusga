@extends('layouts.app')
@section('content')
    <div class="lg:pt-[15vh] pt-[140px]"></div>
        {{-- max-w-[2000px] --}}
        <div class="carousel-container overflow-hidden">
            <div class="carousel-wrapper w-[100vw] h-[70vh]">
                @foreach ($slides as $slide)
                <div class="carousel-item relative">
                    <div class="w-full h-full lg:w-[90%]">
                        <div class="relative w-full h-full">
                            <!-- Динамическое изображение -->
                            <img class="absolute top-0 left-0 w-full h-full object-cover object-center" 
                                 src="{{ asset('storage/' . $slide->image_path) }}" 
                                 alt="{{ $slide->title }}">
                        </div>
        
                        <!-- Контент слайдера -->
                        <div
                            class="absolute flex items-center inset-0 left-0 lg:w-[800px] w-full lg:justify-start justify-center bg-gradient-to-r from-[#243060] to-transparent">
                            <div
                                class="text-[var(--white-color)] w-[33,33%] lg:ml-[100px] m-0 flex justify-center flex-col lg:text-start text-center">
                                <p class="title">{{ $slide->title }}</p>
                                <div class="relative base-text pl-[15px] lg:ml-[10px] ml-0 max-w-[500px]" style="max-width: 400px; word-wrap: break-word; word-break: break-word; white-space: normal;">
                                    {{ $slide->description }}
                                    <div
                                        class="absolute left-[-5px] top-0 h-full border-l-[5px] border-[var(--white-color)] rounded-l-[10px]">
                                    </div>
                                </div>                                
                                <a href="">
                                    <div
                                        class="w-[230px] h-[40px] flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                                        <p>Заказать услугу <i class="lg:ml-[10px] ml-0 fa-solid fa-arrow-right-long"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-full flex">
                <div class="carousel-controller lg:justify-end px-[30px] lg:px-[60px] 2xl:px-[100px] lg:w-[800px] bg-[var(--accent-color)] flex items-center justify-between w-full lg:h-[15vh] h-[140px]">
                    <div class="items-center flex gap-[45px] lg:p-0 lg:w-auto w-full justify-between">
                        <button class="carousel-prev w-[50px] h-[50px] border-2 rounded-full">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="carousel-next w-[50px] h-[50px] border-2 rounded-full">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="px-[30px] lg:px-[60px] 2xl:px-[100px] w-[1120px]"></div>
            </div> 
        </div>
        
    {{-- ------------------------------------НАШИ УСЛУГИ------------------------------------------------------ --}}
    <div class="overlay-wrapper relative w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto pt-[80px] xl:pt-[80px] pb-[115px]">
        <div class="overlay1"></div>
        <div class="overlay2"></div>
        <div class="overlay3"></div>
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-center p-[30px] lg:p-0">
                <span class="title-2 text-[var(--accent-color)] mr-[15px]">//</span>
                <p class="title-2 font-semibold text-center lg:text-start">Наши услуги</p>
            </div>

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                <!-- Блок 2 -->
                <div class="flex flex-wrap h-max justify-start">
                    <a href="">
                        <div
                            class="animate-block bg-[var(--accent-color)] text-[var(--white-color)] p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%] flex flex-col group hover:shadow-lg hover:-translate-y-1 transition-transform duration-30">
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
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    02</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    03</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    04</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    05</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    06</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div
                            class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%]  flex flex-col bg-white group hover:shadow-lg hover:-translate-y-1 transition-transform duration-300 border-b border-r border-gray-200">
                            <p
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                Автоматизация финансового учета
                            </p>
                            <ul
                                class="lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                <li class="list-marker">Внедрение ERP-систем</li>
                                <li class="list-marker">Системы управления бюджетированием</li>
                                <li class="list-marker">Управление расчетами и платежами</li>
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div
                                    class="number text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]">
                                    07</div>
                                <a href="">
                                    <div
                                        class="button-service group-hover:shadow-md group-hover:shadow-[var(--accent-color)] transition-shadow duration-300">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>


                </div>

            </div>


        </div>
    </div>
    {{-- -----------------------------------------------О НАС--------------------------------------------------------- --}}
    <div class="w-full mx-auto max-w-[2000px] m-auto flex flex-col lg:flex-row bg-[var(--template-color)]">
        <!-- Блок с изображением -->
        <div class="image-container flex justify-center w-full 2xl:w-[800px] overflow-hidden">
            <img src="{{ asset('img/home-page/building.png') }}" alt=""
                class="animate-image w-full lg:w-auto h-auto object-cover">
        </div>

        <!-- Блок с текстом -->
        <div
            class="text-container w-full lg:w-[1120px] py-16 px-[30px] lg:px-[60px] xl:px-[100px] text-[var(--white-color)]">
            <div class="max-w-[870px]">
                <p class="title-2 max-w-[430px] mb-[40px] font-semibold animate-text">Работаем для вас с 2017 года</p>
                <ul class="lg:ml-[10px] ml-0 base-text space-y-[15px]">
                    <li class="list-marker animate-text">Консалтинговая компания «Arassa Nusga», основанная в 2017 году в
                        составе Lotta
                        Business Group, работает под девизом: «Качество. Инновации. Решения».</li>
                    <li class="list-marker animate-text">Наша команда объединяет высококвалифицированных специалистов из
                        различных
                        отраслей. Мы предлагаем широкий спектр профессиональных консалтинговых услуг, направленных на
                        повышение эффективности вашей деятельности, улучшение качества работы сотрудников, решение
                        актуальных бизнес-задач и увеличение прибыли вашей компании.</li>
                    <li class="list-marker animate-text">Мы всегда стремимся превзойти ожидания наших клиентов,
                        предоставляя больше, чем
                        от нас ожидают. Успех наших клиентов — это наша лучшая репутация.</li>
                </ul>
                <ul class="lg:ml-[10px] ml-0 mt-[30px] base-text space-y-[15px]">
                    <li class="list-marker animate-text">Компания «Arassa Nusga» объединена общим стремлением к
                        приобретению новых
                        знаний и навыков в профессиональной сфере. Мы смело реализуем свои идеи, выходя за рамки привычного,
                        и понимаем, что каждая идея может стать новой возможностью для всей компании. Именно поэтому мы
                        открыты к изменениям и готовы пересматривать устоявшиеся подходы.</li>
                    <li class="list-marker animate-text">Мы ценим сотрудников, которые стремятся к профессиональному и
                        личностному
                        росту, делятся знаниями с коллегами и работают в интересах компании. Для нас КОМАНДА — это не просто
                        группа людей, а сила, объединенная общими целями и ценностями.</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- ------------------------------НАШИ ПРОЕКТЫ-------------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-[30px] lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex flex-col lg:flex-row ">
            <div class="animate-left lg:w-[580px] w-full">
                <div class=" flex items-center">
                    <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                    <p class="title-2 font-semibold">Наши проекты</p>
                </div>
                <div class="lg:mt-[50px] mt-[20px]">
                    <ul class="space-y-[15px] text-[var(--accent-color)] font-bold">
                        <li class="list-marker">Лендинг страницы</li>
                        <li class="list-marker">Сайты каталог</li>
                        <li class="list-marker">Многостраничные сайты</li>
                    </ul>
                    <ul class="lg:mt-[50px] mt-[20px] space-y-[20px]">
                        <li>
                            Наши проекты включают разработку и поддержку веб-приложений с использованием современных
                            технологий, таких как PHP (Laravel), JavaScript (Node.js, React, jQuery), а также мобильных
                            приложений на Flutter.
                        </li>
                        <li>
                            Основное внимание уделяется созданию удобного пользовательского интерфейса, оптимизации базы
                            данных, улучшению клиентского опыта и интеграции BI-отчетности через инструменты вроде Power BI,
                            Google Looker Studio и MS Excel.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full overflow-hidden flex flex-col ml-0 lg:ml-[50px] xl:ml-[130px]">
                {{-- кнопки слайдера --}}
                <div class="animate-bottom">
                    <div class="lg:flex hidden justify-end text-[var(--accent-color)]">
                        <div class="flex gap-[40px] w-full lg:w-auto">
                            <button class="slider-button prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button class="slider-button next">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- слайдер проектов --}}
                    <div class="w-full">
                        <div class="carousel-project flex justify-start mt-[50px]">
                            {{-- 1 карточка --}}
                            <div class="carousel-itom  rounded-[10px] overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                                <div class="flex flex-col">
                                    <div class="overflow-hidden">
                                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt=""
                                            class="transform transition-transform duration-300 hover:scale-110">
                                    </div>
                                    <div class="flex justify-between h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                                        <div class="p-5">
                                            <p class="projet-size-text">Unite Gaming</p>
                                            <p class="small-text">Приложение сетевых игр</p>
                                        </div>
                                        <a href="">
                                            <div class="hover-button w-[100px] text-[var(--white-color)] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-itom  rounded-[10px] overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                                <div class="flex flex-col">
                                    <div class="overflow-hidden">
                                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt=""
                                            class="transform transition-transform duration-300 hover:scale-110">
                                    </div>
                                    <div class="flex justify-between h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                                        <div class="p-5">
                                            <p class="projet-size-text">Unite Gaming</p>
                                            <p class="small-text">Приложение сетевых игр</p>
                                        </div>
                                        <a href="">
                                            <div class="hover-button w-[100px] text-[var(--white-color)] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-itom  rounded-[10px] overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                                <div class="flex flex-col">
                                    <div class="overflow-hidden">
                                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt=""
                                            class="transform transition-transform duration-300 hover:scale-110">
                                    </div>
                                    <div class="flex justify-between h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                                        <div class="p-5">
                                            <p class="projet-size-text">Unite Gaming</p>
                                            <p class="small-text">Приложение сетевых игр</p>
                                        </div>
                                        <a href="">
                                            <div class="hover-button w-[100px] text-[var(--white-color)] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
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

        </div>

    </div>
    {{-- ----------------------------------------ПАРТНЕРЫ--------------------------------------------------------------- --}}
    @include('include.partners')
@endsection
