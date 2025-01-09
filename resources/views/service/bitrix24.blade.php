@extends('layouts.app')
@section('content')
    {{-- ---------------------------начальная часть страницы-------------------------------- --}}
    <div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
        <div class="w-full flex">
            <!-- Левая часть с текстом и кнопкой -->
            <div class="animate-left lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)] flex flex-col lg:flex-row lg:items-center px-[30px] lg:px-[60px] 2xl:px-[100px] w-full">
               
               <div class="text-[var(--white-color)] lg:mt-0 mt-10 lg:text-start text-center">
                    <!-- Динамический Титульный Текст -->
                    <p class="title font-semibold">{{ $bitrix24->{'title_' . app()->getLocale()} }}</p>
                    
                    <!-- Динамическое Описание -->
                    <p class="base-text">{{ $bitrix24->{'description_' . app()->getLocale()} }}</p>
                    
                    <!-- Кнопка Заказать Услугу -->
                    <a href="{{ $bitrix24->service_url ?? '#' }}"> <!-- Предполагается, что в модели есть поле service_url -->
                        <div class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>
                    
                    <!-- Изображение для мобильных устройств -->
                    @if(isset($bitrix24->photos) && count($bitrix24->photos) > 0)
                        <div class="lg:hidden flex justify-center mt-4 py-5">
                            <img src="{{ asset('storage/' . $bitrix24->photos[0]) }}" alt="Bitrix24 Image">
                        </div>
                    @else
                        <div class="lg:hidden block mt-4">
                            <img src="{{ asset('img/service/bitrix24/box-corp.png') }}" alt="Bitrix24 Image">
                        </div>
                    @endif
               </div>
                
            </div>
            
            <!-- Правая часть с изображением для десктопов -->
            <div class="animate-bottom lg:flex hidden w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                @if(isset($bitrix24->photos) && count($bitrix24->photos) > 0)
                    <img class="w-full h-full" src="{{ asset('storage/' . $bitrix24->photos[0]) }}" alt="Bitrix24 Image">
                @else
                    <img class="w-full h-full" src="{{ asset('img/service/bitrix24/box-corp.png') }}" alt="Bitrix24 Image">
                @endif
            </div>
            
        </div>
    </div>
    {{-- ------------------------------------спискок предлагаемых услуг с ценой------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] lg:block hidden">//</span>
                <div class="max-w-[860px]  sm:px-0">
                    <p class="title-2 font-semibold text-center lg:text-start">Наши услуги</p>
                    <p class="base-text text-center lg:text-start lg:px-0 px-[30px]">The quiet forest was alive with the sounds of nature. Birds chirped melodiously, and
                        a gentle breeze rustled the leaves, carrying the earthy scent of pine and moss. Sunlight streamed
                        through the</p>
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
                    @foreach ($bitrix24Cloud as $index => $cloud)
<div
    class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
    
    {{-- Титульный текст --}}
    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
        {{ $cloud->title_ru ?? 'Название не указано' }}
    </p>
    
    {{-- Категории --}}
    <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
        @foreach ($cloud->categories_ru ?? [] as $category)
        <li class="list-marker">{{ $category }}</li>
        @endforeach
    </ul>

    <div class="flex items-end justify-between mt-auto">
        {{-- Порядковый номер --}}
        <div class="number text-[var(--comment-color)] font-semibold">
            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
        </div>

        {{-- Цена и скидка --}}
        <div>
            <div class="flex flex-col">
                @if ($cloud->discount > 0)
                <div class="flex items-center">
                    <p class="smaii-text line-through font-semibold">
                        {{ $cloud->price }} тм
                    </p>
                    <div
                        class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                        <p class="small-text">-{{ $cloud->discount }}%</p>
                    </div>
                </div>
                @endif
                <p class="number font-semibold">
                    {{ $cloud->price - ($cloud->price * $cloud->discount / 100) }} тм
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
               

                </div>
            </div>
        </div>
    </div>
    {{-- ------------------------------------------Битрикс коробка--------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
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
                  
               
                
                    @foreach ($boxes as $index => $box)
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        
                        <!-- Название Коробки -->
                        <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                            {{ $box->{'title_' . app()->getLocale()} }}
                        </p>
                        
                        <!-- Список Категорий -->
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            @foreach ($box->{'categories_' . app()->getLocale()} as $category)
                                <li class="list-marker">{{ $category }}</li>
                            @endforeach
                        </ul>
                        
                        <!-- Нижняя Часть Карточки с Номером и Ценой -->
                        <div class="flex items-end justify-between mt-auto">
                            
                            <!-- Номер Коробки -->
                            <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                            
                            <!-- Ценообразование -->
                            <div>
                                <div class="flex flex-col">
                                    @if ($box->discount && $box->discount < 100)
                                        @php
                                            // Расчет оригинальной цены, если скидка указана и меньше 100%
                                            $originalPrice = $box->price / (1 - ($box->discount / 100));
                                        @endphp
                                        <div class="flex items-center">
                                            <p class="small-text line-through font-semibold">
                                                {{ number_format($originalPrice, 0, ',', ' ') }} тм
                                            </p>
                                            <div
                                                class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                <p class="small-text">-{{ $box->discount }}%</p>
                                            </div>
                                        </div>
                                        <p class="number font-semibold">{{ number_format($box->price, 0, ',', ' ') }} тм</p>
                                    @else
                                        <p class="number font-semibold">{{ number_format($box->price, 0, ',', ' ') }} тм</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
                    
                    

                    {{-- 2 карточка --}}
                    

                </div>
            </div>
        </div>
    </div>
    {{-- ----------------------------------------------------------Этапы реализаций------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center lg:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden lg:block">//</span>
                <div class="max-w-[860px]">
                    <p class="title-2 font-semibold">Этапы реализаций</p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-5 mt-[50px]">
                    <div class="animate-block p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Идея</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Формирование замысла</li>
                            <li class="list-marker">Анализ и проработка</li>
                            <li class="list-marker">Визуализация и презентация</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">01</p>
                    </div>
                    <div class="animate-block p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0.4s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Техническое задание</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Сбор и анализ требований</li>
                            <li class="list-marker">Структурирование и документирование</li>
                            <li class="list-marker">Согласование и утверждение</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">02</p>
                    </div>
                    <div class="animate-block p-[30px] bg-[var(--white-color)]"
                        style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: 0.6s;">
                        <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Разработка</p>
                        <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                            <li class="list-marker">Планирование и проектирование</li>
                            <li class="list-marker">Программирование</li>
                            <li class="list-marker">Тестирование и отладка</li>
                        </ul>
                        <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">03</p>
                    </div>
                    <div class="animate-block p-[30px] bg-[var(--white-color)]"
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
@endsection
