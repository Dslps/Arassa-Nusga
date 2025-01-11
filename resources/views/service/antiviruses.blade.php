@extends('layouts.app')
@section('content')
    <div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
        <div class="w-full flex">
            <!-- Левая часть с текстом и кнопкой -->
            <div
                class="animate-left lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)] flex flex-col lg:flex-row lg:items-center px-[30px] lg:px-[60px] 2xl:px-[100px] w-full">

                <div class="text-[var(--white-color)] lg:mt-0 mt-10 lg:text-start text-center">
                    <!-- Динамический Титульный Текст -->
                    <p class="title font-semibold">{{ $antiviruses->{'title_' . app()->getLocale()} }}</p>

                    <!-- Динамическое Описание -->
                    <p class="base-text">{{ $antiviruses->{'categories_' . app()->getLocale()} }}</p>

                    <!-- Кнопка Заказать Услугу -->
                    <a href="{{ $antiviruses->service_url ?? '#' }}">
                        <div
                            class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>

                    <!-- Изображение для мобильных устройств -->
                    @if (isset($antiviruses->photos) && count($antiviruses->photos) > 0)
                        <div class="lg:hidden flex justify-center mt-4 py-5">
                            <img src="{{ asset('storage/' . $antiviruses->photos[0]) }}" alt="antiviruses Image">
                        </div>
                    @endif
                </div>

            </div>

            <!-- Правая часть с изображением для десктопов -->
            <div
                class="animate-bottom lg:flex hidden w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                @if (isset($antiviruses->photos) && count($antiviruses->photos) > 0)
                    <img class="w-full h-full" src="{{ asset('storage/' . $antiviruses->photos[0]) }}"
                        alt="antiviruses Image">
                @endif
            </div>

        </div>
    </div>
    {{-- -------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0 text-center lg:text-start">
                <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                <div class="flex flex-col">
                    <p class="title-2 font-semibold">Что входит в услугу</p>
                    <p class="max-w-[860px] mt-2 lg:mt-0">The quiet forest was alive with the sounds of nature. Birds
                        chirped melodiously,
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

                    @foreach ($kaspersky as $index => $kasper)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">

                            <!-- Название Коробки -->
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $kasper->{'title_' . app()->getLocale()} }}
                            </p>

                            <!-- Список Категорий -->
                            <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($kasper->{'categories_' . app()->getLocale()} as $category)
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
                                        @if ($kasper->discount && $kasper->discount < 100)
                                            @php
                                                // Расчет оригинальной цены, если скидка указана и меньше 100%
                                                $originalPrice = $kasper->price / (1 - $kasper->discount / 100);
                                            @endphp
                                            <div class="flex items-center">
                                                <p class="small-text line-through font-semibold">
                                                    {{ number_format($originalPrice, 0, ',', ' ') }} тм
                                                </p>
                                                <div
                                                    class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                    <p class="small-text">-{{ $kasper->discount }}%</p>
                                                </div>
                                            </div>
                                            <p class="number font-semibold">
                                                {{ number_format($kasper->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">
                                                {{ number_format($kasper->price, 0, ',', ' ') }}
                                                тм</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            {{-- --------------------------------------------------------------------------------------- --}}
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
                    @foreach ($eset as $index => $item)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $item->{'title_' . app()->getLocale()} }}
                            </p>
                            <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($item->{'categories_' . app()->getLocale()} as $category)
                                    <li class="list-marker">{{ $category }}</li>
                                @endforeach
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                                <div>
                                    <div class="flex flex-col">
                                        @if ($item->discount && $item->discount < 100)
                                            @php
                                                $originalPrice = $item->price / (1 - $kasper->discount / 100);
                                            @endphp
                                            <div class="flex items-center">
                                                <p class="small-text line-through font-semibold">
                                                    {{ number_format($originalPrice, 0, ',', ' ') }} тм
                                                </p>
                                                <div
                                                    class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                    <p class="small-text">-{{ $item->discount }}%</p>
                                                </div>
                                            </div>
                                            <p class="number font-semibold">
                                                {{ number_format($item->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">
                                                {{ number_format($item->price, 0, ',', ' ') }}
                                                тм</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            {{-- ---------------------------------------------------------------------------- --}}
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
                    @foreach ($pro32 as $index => $pro32s)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                            <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $pro32s->{'title_' . app()->getLocale()} }}
                            </p>
                            <ul class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($pro32s->{'categories_' . app()->getLocale()} as $category)
                                    <li class="list-marker">{{ $category }}</li>
                                @endforeach
                            </ul>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                                <div>
                                    <div class="flex flex-col">
                                        @if ($pro32s->discount && $pro32s->discount < 100)
                                            @php
                                                $originalPrice = $pro32s->price / (1 - $kasper->discount / 100);
                                            @endphp
                                            <div class="flex items-center">
                                                <p class="small-text line-through font-semibold">
                                                    {{ number_format($originalPrice, 0, ',', ' ') }} тм
                                                </p>
                                                <div
                                                    class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                    <p class="small-text">-{{ $pro32s->discount }}%</p>
                                                </div>
                                            </div>
                                            <p class="number font-semibold">
                                                {{ number_format($pro32s->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">
                                                {{ number_format($pro32s->price, 0, ',', ' ') }}
                                                тм</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    {{-- ---------------------------------------------------------------------------------------------------- --}}
@endsection
