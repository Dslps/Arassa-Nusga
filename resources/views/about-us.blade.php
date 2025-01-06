@extends('layouts.app')
@section('content')
    <x-start-content />
    {{-- -------------------------------Принципы работы ----------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[80px] ">
        <div class="max-w-[2000px] m-auto">
            <div>
                <p class="title-2 pl-0 lg:pl-[30px] lg:text-start text-center mb-[60px]">Принципы нашей работы</p>
            </div>
            <div class="grid lg:text-start text-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col p-4">
                    <img class="lg:w-[80px] w-[50px] lg:mx-0 mx-auto" src="{{ asset('img/about-us/1.png') }}" alt="">
                    <p class="relative base-text mt-[20px] mb-[30px] after:content-[''] after:block after:w-[20px] after:h-[2px] after:bg-[var(--accent-color)] after:absolute lg:after:left-[10px] after:top-full after:mt-[15px]  after:left-1/2 after:translate-x-[-50%]">
                        Партнерские отношения
                    </p>
                    <div class="small-text font-semibold text-[var(--comment-color)]">
                        Наша компания всегда нацелена на совместное развитие, поэтому у нас много партнеров по всему миру.
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <img class="lg:w-[80px] w-[50px] lg:mx-0 mx-auto" src="{{ asset('img/about-us/2.png') }}" alt="">
                    <p class="relative base-text mt-[20px] mb-[30px] after:content-[''] after:block after:w-[20px] after:h-[2px] after:bg-[var(--accent-color)] after:absolute lg:after:left-[10px] after:top-full after:mt-[15px]  after:left-1/2 after:translate-x-[-50%]">
                        Индивидуальный подход
                    </p>
                    <div class="small-text font-semibold text-[var(--comment-color)]">
                        В своей работе мы всегда ориентируемся и учитываем индивидуальные особенности каждого клиента.
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <img class="lg:w-[80px] w-[50px] lg:mx-0 mx-auto" src="{{ asset('img/about-us/3.png') }}" alt="">
                    <p class="relative base-text mt-[20px] mb-[30px] after:content-[''] after:block after:w-[20px] after:h-[2px] after:bg-[var(--accent-color)] after:absolute lg:after:left-[10px] after:top-full after:mt-[15px]  after:left-1/2 after:translate-x-[-50%]">
                        Командная работа
                    </p>
                    <div class="small-text font-semibold text-[var(--comment-color)]">
                        Наша команда объединяет знания многих сертифицированных профессионалов из разных отраслей.
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <img class="lg:w-[80px] w-[50px] lg:mx-0 mx-auto" src="{{ asset('img/about-us/4.png') }}" alt="">
                    <p class="relative base-text mt-[20px] mb-[30px] after:content-[''] after:block after:w-[20px] after:h-[2px] after:bg-[var(--accent-color)] after:absolute lg:after:left-[10px] after:top-full after:mt-[15px]  after:left-1/2 after:translate-x-[-50%]">
                        Гарантия качества
                    </p>
                    <div class="small-text font-semibold text-[var(--comment-color)]">
                        Благодаря солидному опыту и глубоким знаниям качество наших услуг всегда на высоте.
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- ------------------------------------------О нас-------------------------------------------- --}}
    <div class="w-full mx-auto max-w-[2000px] m-auto flex flex-col lg:flex-row mt-[115px]">
        <div class="lg:flex hidden justify-center w-full lg:w-[850px] overflow-hidden relative">
            <img src="{{ asset('img/about-us/business-meeting-room.png') }}" alt=""
                class="w-full lg:w-auto h-auto object-cover">
        </div>

        <div class="relarive lg:w-max w-full relative lg:ml-auto">
            <div
                class=" w-full lg:w-[400px] h-max lg:h-[450px] bg-[var(--accent-color)] text-[var(--white-color)] p-10 relative lg:absolute 2xl:left-[-420px] lg:left-[-400px] z-0  2xl:bottom-[50px] lg:bottom-0">
                <div class="w-full h-full flex flex-col">
                    <div class="mb-auto ">
                        <p>Наши достижения</p>
                    </div>
                    <div class="mt-auto flex flex-col gap-[15px]">
                        <p class="text-[36px]">48 Success is not just about</p>
                        <p class="small-text">Success is not just about achieving goals; it's about the journey and the
                            lessons learned along the way. Every challenge you face is an opportunity to grow, and every
                            step forward, no matter how small, brings you closer to your dreams.</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:max-w-[650px] mr-0 lg:mr-[100px] text-[var(--template-color)] p-10">

                <p class="title-2 max-w-[430px] mb-[40px] font-semibold">Работаем для вас с 2017 года</p>
                <ul class="ml-[10px] base-text space-y-[15px]">
                    <li class="list-marker">Консалтинговая компания «Arassa Nusga», основанная в 2017 году в составе
                        Lotta
                        Business Group, работает под девизом: «Качество. Инновации. Решения».</li>
                    <li class="list-marker">Наша команда объединяет высококвалифицированных специалистов из различных
                        отраслей. Мы предлагаем широкий спектр профессиональных консалтинговых услуг, направленных на
                        повышение эффективности вашей деятельности, улучшение качества работы сотрудников, решение
                        актуальных бизнес-задач и увеличение прибыли вашей компании.</li>
                    <li class="list-marker">Мы всегда стремимся превзойти ожидания наших клиентов, предоставляя больше,
                        чем
                        от нас ожидают. Успех наших клиентов — это наша лучшая репутация.</li>
                </ul>
                <ul class="ml-[10px] mt-[30px] base-text space-y-[15px]">
                    <li class="list-marker">Компания «Arassa Nusga» объединена общим стремлением к приобретению новых
                        знаний и навыков в профессиональной сфере. Мы смело реализуем свои идеи, выходя за рамки
                        привычного,
                        и понимаем, что каждая идея может стать новой возможностью для всей компании. Именно поэтому мы
                        открыты к изменениям и готовы пересматривать устоявшиеся подходы.</li>
                    <li class="list-marker">Мы ценим сотрудников, которые стремятся к профессиональному и личностному
                        росту, делятся знаниями с коллегами и работают в интересах компании. Для нас КОМАНДА — это не
                        просто
                        группа людей, а сила, объединенная общими целями и ценностями.</li>
                </ul>

            </div>
        </div>
    </div>
    {{-- ---------------------------------НАШЕ РУКОВОДСТВО---------------------------------------------- --}}
    <div class="w-full mx-auto max-w-[2000px] m-auto flex mt-[115px] pb-[90px]">
        <div class="w-full lg:px-[100px] px-10">
            <div class="">
                <p class="title-2 lg:text-start text-center">Наше руководство</p>
                <div class="flex mt-[10px] lg:mt-[40px] lg:justify-start justify-center items-center">
                    <span class="mr-[10px] text-[36px] font-semibold text-[var(--accent-color)] lg:block hidden">//</span>
                    <p class="base-text">Персонал - гордость нашего бизнеса</p>
                </div>
            </div>

            <div class="flex flex-wrap lg:gap-[100px] gap-[50px] justify-center mt-[40px]">
                {{-- 1 карточка --}}
                <div class="flex-col flex">
                    <img class="lg:w-[500px] lg:h-[500px] sm:w-[400px] sm:h-[400px] w-full h-auto"
                        src="{{ asset('img/about-us/petrosov-alexander.png') }}" alt="">
                    <div class="mt-[20px]">
                        <p class="base-text font-semibold text-[var(--comment-color)]">Директор</p>
                        <p class="number font-semibold">Александр Петросов</p>
                        <ul class="mt-[15px] space-y-[5px]">
                            <li>lorem</li>
                            <li>lorem</li>
                            <li>lorem</li>
                        </ul>
                    </div>
                </div>
                {{-- 2 карточка --}}
                <div class="flex-col flex">
                    <img class="lg:w-[500px] lg:h-[500px] sm:w-[400px] sm:h-[400px] w-full h-auto"
                        src="{{ asset('img/about-us/petrosova-gulshat.png') }}" alt="">
                    <div class="mt-[20px]">
                        <p class="base-text font-semibold text-[var(--comment-color)]">Заместитель директора</p>
                        <p class="number font-semibold">Гульшат Петросова</p>
                        <ul class="mt-[15px] space-y-[5px]">
                            <li>lorem</li>
                            <li>lorem</li>
                            <li>lorem</li>
                        </ul>
                    </div>
                </div>
                {{-- 3 карточка --}}
                <div class="flex-col flex">
                    <img class="lg:w-[500px] lg:h-[500px] sm:w-[400px] sm:h-[400px] w-full h-auto"
                        src="{{ asset('img/about-us/ikonnikov-roman.png') }}" alt="">
                    <div class="mt-[20px]">
                        <p class="base-text font-semibold text-[var(--comment-color)]">Операционный Директор</p>
                        <p class="number font-semibold">Роман Иконников</p>
                        <ul class="mt-[15px] space-y-[5px]">
                            <li>lorem</li>
                            <li>lorem</li>
                            <li>lorem</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- --------------------НАШИ ПАРТНЕРЫ------------------ --}}
    @include('include.partners')
    {{-- ----------------------Сертификаты-------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-0 lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex sm:flex-row flex-col justify-between px-10">
            <div class="flex items-center">
                <span class="title-2 text-[var(--accent-color)] mr-[15px]">//</span>
                <p class="title-2 font-semibold sm:text-start text-center">Наши сертификаты</p>
            </div>
            <div class="flex gap-[50px] sm:mt-0 mt-5 mx-auto sm:mx-0">
                <button type="button" id="carousel-prev-certificates" class="slider-button group">
                    <span class="">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" id="carousel-next-certificates" class="slider-button group">
                    <span class="">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class=" flex mt-[75px] overflow-hidden" id="carousel-container">
            <div class="flex gap-[40px]" id="carousel-content-certificates">
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{asset('img/about-us/certificate1.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate2.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate3.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate4.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{asset('img/about-us/certificate1.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate2.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate3.png')}}" alt="">    
                </div>              
                <div>
                    <img class="max-w-[400px] max-h-[460px]"  src="{{asset('img/about-us/certificate4.png')}}" alt="">    
                </div>              
            </div>
        </div>
    </div>
@endsection
