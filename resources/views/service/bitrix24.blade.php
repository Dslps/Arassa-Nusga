@extends('layouts.app')
@section('content')
    {{-- ---------------------------начальная часть страницы-------------------------------- --}}
    <div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
        <div class="w-full flex">
            <!-- Левая часть с текстом и кнопкой -->
            <div
                class="animate-left lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)] flex flex-col lg:flex-row lg:items-center px-0 lg:px-[60px] 2xl:px-[100px] w-full">

                <div class="text-[var(--white-color)] lg:mt-0 mt-10 lg:text-start text-center">
                    <div class="lg:px-0 px-[30px]">
                        <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                            class="title font-semibold">{{ $bitrix24->{'title_' . app()->getLocale()} }}</p>
                        <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                            class="base-text">{{ $bitrix24->{'description_' . app()->getLocale()} }}</p>
                    </div>

                    <a href="{{ route('contact') }}">
                        <div
                            class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>
                    {{-- на маленьких экранах --}}
                    @if (isset($bitrix24->photos) && count($bitrix24->photos) > 0)
                        <div class="lg:hidden flex justify-center pt-5">
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
            <div
                class="relative animate-bottom lg:flex hidden w-[1120px] px-0 lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                <div class="absolute w-full h-full">
                    @if (isset($bitrix24->photos) && count($bitrix24->photos) > 0)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $bitrix24->photos[0]) }}"
                            alt="Bitrix24 Image">
                    @else
                        Данные отсутсвуют
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- ------------------------------------спискок предлагаемых услуг с ценой------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] lg:block hidden">//</span>
                <div class="max-w-[860px]  sm:px-0">
                    <p class="title-2 font-semibold text-center lg:text-start">{{ __('messages.all_services') }}</p>
                    <p class="base-text text-center lg:text-start lg:px-0 px-[30px]">
                        {{ __('messages.all_services_comment') }}</p>
                </div>
            </div>


            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                {{--  1 карточка --}}
                <div class="animate-block flex flex-wrap w-full justify-start">
                    <div
                        class="bg-[var(--accent-color)] w-full sm:w-[50%] h-[250px] 2xl:w-[25%] text-[var(--white-color)] p-[30px] flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text font-semibold">{{ __('messages.bitrix_cloud') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.bitrix_cloud_comment-1') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_cloud_comment-2') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_cloud_comment-3') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_cloud_comment-4') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_cloud_comment-5') }}</li>
                        </ul>

                    </div>

                    @foreach ($bitrix24Cloud as $index => $cloud)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">

                            {{-- Титульный текст на текущем языке --}}
                            <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $cloud->{'title_' . app()->getLocale()} ?? 'Название не указано' }}
                            </p>

                            {{-- Категории на текущем языке --}}
                            <ul style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($cloud->{'categories_' . app()->getLocale()} ?? [] as $category)
                                    <li class="list-marker">{{ $category }}</li>
                                @endforeach
                            </ul>

                            <div class="flex items-end justify-between mt-auto">
                                {{-- Номер --}}
                                <div class="number text-[var(--comment-color)] font-semibold">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                {{-- Цена и скидка --}}
                                <div>
                                    <div class="flex flex-col">
                                        @if ($cloud->discount > 0)
                                            <div class="flex items-center">
                                                <p class="small-text line-through font-semibold">
                                                    {{ number_format($cloud->price, 0, ',', ' ') }} тм
                                                </p>
                                                <div
                                                    class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                    <p class="small-text">-{{ $cloud->discount }}%</p>
                                                </div>
                                            </div>
                                        @endif
                                        <p class="number font-semibold">
                                            {{ number_format($cloud->price - ($cloud->price * $cloud->discount) / 100, 0, ',', ' ') }}
                                            тм
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
                        <p class="base-text font-semibold">{{ __('messages.bitrix_box') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.bitrix_box_comment-1') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_box_comment-2') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_box_comment-3') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_box_comment-4') }}</li>
                            <li class="list-marker">{{ __('messages.bitrix_box_comment-5') }}</li>
                        </ul>

                    </div>



                    @foreach ($boxes as $index => $box)
                        <div
                            class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                            <!-- Название Коробки -->
                            <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                                class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $box->{'title_' . app()->getLocale()} }}
                            </p>
                            <!-- Список Категорий -->
                            <ul style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                                class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
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
                                                $originalPrice = $box->price / (1 - $box->discount / 100);
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
                                            <p class="number font-semibold">{{ number_format($box->price, 0, ',', ' ') }}
                                                тм</p>
                                        @else
                                            <p class="number font-semibold">{{ number_format($box->price, 0, ',', ' ') }}
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
    {{-- ----------------------------------------------------------Этапы реализаций------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center lg:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden lg:block">//</span>
                <div class="max-w-[860px]">
                    <p class="title-2 font-semibold">{{ __('messages.implementation') }}</p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-5 mt-[50px]">
                    @foreach ($implementationStages as $index => $stage)
                        <div class="animate-block min-h-[220px] h-max p-[30px] bg-[var(--white-color)] flex flex-col justify-between"
                            style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: {{ 0.4 * $index }}s;">
                            <!-- Титульный текст на текущем языке -->
                            <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                                class="number mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $stage->{'title_' . app()->getLocale()} }}
                            </p>
                            <!-- Условное отображение категорий на текущем языке -->
                            @php
                                $currentCategories = $stage->{'categories_' . app()->getLocale()} ?? [];
                            @endphp
                            @if (!empty($currentCategories) && is_array($currentCategories))
                                <ul style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                                    class="ml-[10px] text-[var(--accent-color)] small-text font-semibold mb-5">
                                    @foreach ($currentCategories as $category)
                                        <li class="list-marker">{{ $category }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <!-- Нумерация этапа -->
                            <p class="number font-semibold text-[var(--accent-color)] mt-auto">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
