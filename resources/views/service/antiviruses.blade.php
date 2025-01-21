@extends('layouts.app')
@section('content')
    <div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
        <div class="w-full flex">
            <!-- Левая часть с текстом и кнопкой -->
            <div
                class="animate-left lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)] flex flex-col lg:flex-row lg:items-center px-0 lg:px-[60px] 2xl:px-[100px] w-full">

                <div class="text-[var(--white-color)] lg:mt-0 mt-10 lg:text-start text-center">
                    <div class="lg:px-0 px-[30px]">
                        <p class="title font-semibold">{{ $antiviruses->{'title_' . app()->getLocale()} }}</p>
                        <p class="base-text">{{ $antiviruses->{'categories_' . app()->getLocale()} }}</p>
                    </div>


                    <a href="{{ route('contact') }}">
                        <div
                            class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>{{ __('messages.order a service') }}<i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>

                    <!-- Изображение для мобильных устройств -->
                    @if (isset($antiviruses->photos) && count($antiviruses->photos) > 0)
                        <div class="lg:hidden flex justify-center mt-4 pt-5">
                            <img src="{{ asset('storage/' . $antiviruses->photos[0]) }}" alt="antiviruses Image">
                        </div>
                    @endif
                </div>

            </div>

            <!-- Правая часть с изображением для десктопов -->
            <div
                class="relative animate-bottom lg:flex hidden w-[1120px] px-0 lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                <div class="absolute w-full h-full">
                    @if (isset($antiviruses->photos) && count($antiviruses->photos) > 0)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $antiviruses->photos[0]) }}"
                            alt="antiviruses Image">
                    @else
                        Нет данных
                    @endif
                </div>
            </div>


        </div>
    </div>
    {{-- -------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0 text-center lg:text-start">
                <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                <div class="flex flex-col">
                    <p class="title-2 font-semibold">{{ __('messages.all_services') }}</p>
                    <p class="max-w-[860px] mt-2 lg:mt-0">{{ __('messages.all_antiviruses_comment') }}</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                {{--  1 карточка --}}
                <div class="animate-block flex flex-wrap w-full justify-start">
                    <div
                        class="bg-[var(--accent-color)] w-full sm:w-[50%] h-[250px] 2xl:w-[25%] text-[var(--white-color)] p-[30px] flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text font-semibold">{{ __('messages.kaspersky_title') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.kaspersky_comment') }}</li>
                        </ul>

                    </div>

                    @foreach ($kaspersky as $index => $kasper)
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        
                        {{-- Титульный текст на текущем языке --}}
                        <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                            class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                            {{ $kasper->{'title_' . app()->getLocale()} ?? 'Название не указано' }}
                        </p>
                
                        @php
                            $categories = $kasper->{'categories_' . app()->getLocale()} ?? [];
                        @endphp
                
                        {{-- Категории на текущем языке --}}
                        @if (!empty($categories))
                            <ul style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($categories as $category)
                                    @if (!empty($category))
                                        <li class="list-marker">{{ $category }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                
                        <div class="flex items-end justify-between mt-auto">
                            <div class="number text-[var(--comment-color)] font-semibold">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            {{-- Цена и скидка --}}
                            <div>
                                <div class="flex flex-col">
                                    @if ($kasper->discount > 0)
                                        <div class="flex items-center">
                                            <p class="small-text line-through font-semibold">
                                                {{ number_format($kasper->price, 0, ',', ' ') }} тм
                                            </p>
                                            <div
                                                class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                <p class="small-text">-{{ $kasper->discount }}%</p>
                                            </div>
                                        </div>
                                    @endif
                                    <p class="number font-semibold">
                                        {{ number_format($kasper->price - ($kasper->price * $kasper->discount) / 100, 0, ',', ' ') }} тм
                                    </p>
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
                        <p class="base-text font-semibold">{{ __('messages.eset_title') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.eset_comment') }}</li>
                        </ul>

                    </div>
                    @foreach ($eset as $index => $item)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                            <!-- Название Коробки -->
                            <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $item->{'title_' . app()->getLocale()} }}
                            </p>

                            @php
                                $categories = $item->{'categories_' . app()->getLocale()};
                            @endphp

                            <!-- Список Категорий -->
                            @if (!empty($categories))
                                <ul style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                    class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                    @foreach ($categories as $category)
                                        @if (!empty($category))
                                            <li class="list-marker">{{ $category }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                            <!-- Нижняя Часть Карточки с Номером и Ценой -->
                            <div class="flex items-end justify-between mt-auto">
                                <!-- Номер Коробки -->
                                <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                                <!-- Ценообразование -->
                                <div>
                                    <div class="flex flex-col">
                                        @if ($item->discount && $item->discount < 100)
                                            @php
                                                // Расчет оригинальной цены, если скидка указана и меньше 100%
                                                $originalPrice = $item->price / (1 - $item->discount / 100);
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
                                            <p class="number font-semibold">{{ number_format($item->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">{{ number_format($item->price, 0, ',', ' ') }}
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
                        <p class="base-text font-semibold">{{ __('messages.pro32_title') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.pro32_comment') }}</li>
                        </ul>

                    </div>
                    @foreach ($pro32 as $index => $pro)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                            <!-- Название Коробки -->
                            <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $pro->{'title_' . app()->getLocale()} }}
                            </p>

                            @php
                                $categories = $pro->{'categories_' . app()->getLocale()};
                            @endphp

                            <!-- Список Категорий -->
                            @if (!empty($categories))
                                <ul style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                    class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                    @foreach ($categories as $category)
                                        @if (!empty($category))
                                            <li class="list-marker">{{ $category }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                            <!-- Нижняя Часть Карточки с Номером и Ценой -->
                            <div class="flex items-end justify-between mt-auto">
                                <!-- Номер Коробки -->
                                <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                                <!-- Ценообразование -->
                                <div>
                                    <div class="flex flex-col">
                                        @if ($pro->discount && $pro->discount < 100)
                                            @php
                                                // Расчет оригинальной цены, если скидка указана и меньше 100%
                                                $originalPrice = $pro->price / (1 - $pro->discount / 100);
                                            @endphp
                                            <div class="flex items-center">
                                                <p class="small-text line-through font-semibold">
                                                    {{ number_format($originalPrice, 0, ',', ' ') }} тм
                                                </p>
                                                <div
                                                    class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                    <p class="small-text">-{{ $pro->discount }}%</p>
                                                </div>
                                            </div>
                                            <p class="number font-semibold">{{ number_format($pro->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">{{ number_format($pro->price, 0, ',', ' ') }}
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
