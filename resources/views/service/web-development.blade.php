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
                            class="title font-semibold">{{ $web->{'title_' . app()->getLocale()} }}</p>
                        <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                            class="base-text">{{ $web->{'categories_' . app()->getLocale()} }}</p>
                    </div>


                    <a href="{{ route('contact') }}">
                        <div
                            class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>{{ __('messages.order a service') }} <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>

                    <!-- Изображение для мобильных устройств -->
                    @if (isset($web->photos) && count($web->photos) > 0)
                        <div class="lg:hidden flex justify-center pt-5">
                            <img src="{{ asset('storage/' . $web->photos[0]) }}" alt="web Image">
                        </div>
                    @endif
                </div>

            </div>

            <!-- Правая часть с изображением для десктопов -->
            <div
                class=" relative animate-bottom lg:flex hidden w-[1120px] px-0 lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                <div class="absolute w-full h-full">
                    @if (isset($web->photos) && count($web->photos) > 0)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $web->photos[0]) }}"
                            alt="web Image">
                    @else
                        Нет данных
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- ------------------------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0 text-center lg:text-start">
                <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                <div class="flex flex-col">
                    <p class="title-2 font-semibold">{{ __('messages.all_services') }}</p>
                    <p class="max-w-[860px] mt-2 lg:mt-0">{{ __('messages.all_web_comment') }}</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
                {{--  1 карточка --}}
                <div class="animate-block flex flex-wrap w-full justify-start">
                    <div
                        class="bg-[var(--accent-color)] w-full sm:w-[50%] h-[250px] 2xl:w-[25%] text-[var(--white-color)] p-[30px] flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <p class="base-text font-semibold">{{ __('messages.web_service_title') }}</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">{{ __('messages.web_service_comment-1') }}</li>
                            <li class="list-marker">{{ __('messages.web_service_comment-2') }}</li>
                            <li class="list-marker">{{ __('messages.web_service_comment-3') }}</li>
                        </ul>

                    </div>
                    @foreach ($services as $index => $itom)
                    <div
                        class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">
                        
                        {{-- Титульный текст на текущем языке --}}
                        <p style="word-break: break-word; word-wrap: break-word; white-space: normal; max-width: 100%;"
                            class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                            {{ $itom->{'title_' . app()->getLocale()} ?? 'Название не указано' }}
                        </p>
                
                        @php
                            $categories = $itom->{'categories_' . app()->getLocale()} ?? [];
                        @endphp
                
                        {{-- Категории --}}
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
                                    @if ($itom->discount > 0)
                                        <div class="flex items-center">
                                            <p class="small-text line-through font-semibold">
                                                {{ number_format($itom->price, 0, ',', ' ') }} тм
                                            </p>
                                            <div
                                                class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                                <p class="small-text">-{{ $itom->discount }}%</p>
                                            </div>
                                        </div>
                                    @endif
                                    <p class="number font-semibold">
                                        {{ number_format($itom->price - ($itom->price * $itom->discount) / 100, 0, ',', ' ') }} тм
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
    {{-- -------------------------------------Этапы разработки--------------------------------------- --}}
    <div class="w-full px-0 sm:px-[30px] lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center lg:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden lg:block">//</span>
                <div class="max-w-[860px] ">
                    <p class="title-2 font-semibold">{{ __('messages.implementation') }}</p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-5 mt-[50px]">

                    @foreach ($implementationStages as $index => $stage)
                        <div class="animate-block p-[30px] bg-[var(--white-color)] min-h-[220px] h-max"
                            style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: {{ 0.4 * $index }}s;">

                            <!-- Титульный текст на текущем языке -->
                            <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                                class="number mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $stage->{'title_' . app()->getLocale()} }}
                            </p>

                            <!-- Условное отображение категорий на текущем языке -->
                            @php
                                $currentCategories = $stage->{'categories_' . app()->getLocale()} ?? [];
                            @endphp

                            @if (!empty($currentCategories) && is_array($currentCategories))
                                <ul style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;"
                                    class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                    @foreach ($currentCategories as $category)
                                        <li class="list-marker">{{ $category }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <!-- Нумерация этапа -->
                            <p class="number font-semibold text-[var(--accent-color)] mt-[15px]">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    {{-- -----------------------------Наши проекты--------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-[30px] lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex flex-col ">
            <div class="w-full flex flex-col sm:flex-row">
                <div class="flex items-center justify-center lg:justify-start">
                    <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:blog">//</span>
                    <p class="title-2 font-semibold">{{ __('messages.our_projects') }}</p>
                </div>
                <div class="flex sm:ml-auto text-[var(--accent-color)]">
                    <div class=" flex gap-[40px] z-0 lg:mt-0 w-full lg:w-auto">
                        <button class="mr-auto slider-button prev">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="black">
                                <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                            </svg>  
                        </button>
                        <button class="slider-button next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="black">
                                <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                            </svg> 
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden flex flex-col ml-0">
                {{-- слайдер проектов --}}
                <div class="flex justify-start gap-[50px] mt-[50px] lg:mt-[100px]" id="slider">
                    <div class="carousel-project flex justify-start mt-[50px]">
                        {{-- 1 карточка --}}
                        @foreach ($projectstore as $projectstores)
                            <div class="carousel-item rounded-[10px] overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                                <div class="flex flex-col">
                                    @if ($projectstores->photos)
                                        <div class="overflow-hidden w-full h-[350px]">
                                            <img src="{{ asset('storage/' . $projectstores->photos) }}" alt="Изображение"
                                                class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        Нет изображения
                                    @endif
                                    <div
                                        class="flex justify-between h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                                        <div class="p-5 lg:max-w-[400px] max-w-[300px]">
                                            <p class="projet-size-text truncate">
                                                {{ $projectstores->{'title_' . app()->getLocale()} }}
                                            </p>
                                            <p class="small-text truncate">
                                                {{ $projectstores->{'description_' . app()->getLocale()} }}
                                            </p>
                                        </div>
                                        <a href="{{ route('project.show', $projectstores->id) }}">
                                            <div
                                                class="hover-button w-[100px] text-[var(--white-color)] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="black">
                                                    <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                                    <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                                </svg> 
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
