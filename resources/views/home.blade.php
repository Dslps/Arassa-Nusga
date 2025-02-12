@extends('layouts.app')
@section('content')
    @php
        Log::info('Locale in Blade: ' . app()->getLocale());
    @endphp
    <div class="lg:pt-[15vh] pt-[140px]"></div>
    {{-- max-w-[2000px] --}}
    <div class="carousel-container overflow-hidden">
        <div class="carousel-wrapper  h-[70vh]">
            @forelse ($slides as $slide)
            {{-- @csrf --}}
                <div class="carousel-item relative" style="height: 70vh !important">
                    <div class="w-full h-full lg:w-[90%]">
                        <div class="relative w-full h-full">
                            <!-- Динамическое изображение -->
                            <img class="absolute top-0 left-0 w-full h-full object-cover object-center"
                                src="{{ asset('storage/' . $slide->image_path) }}" alt="">
                        </div>

                        <!-- Контент слайдера -->
                        <div
                            class="absolute flex items-center inset-0 left-0 lg:w-[800px] w-full lg:justify-start justify-center bg-gradient-to-r from-[#243060] to-transparent">
                            <div
                                class="text-[var(--white-color)] space-y-[25px] lg:ml-[100px] m-0 flex justify-center flex-col lg:text-start text-center">
                                <p class="title"
                                    style="max-width: 450px; word-wrap: break-word; word-break: break-word; white-space: normal;">
                                    {{ $slide->{'title_' . app()->getLocale()} }}
                                </p>
                                <div class="relative flex items-center base-text pl-[30px] lg:ml-[10px] ml-0 max-w-[500px] h-[100px]"
                                    style="max-width: 450px; word-wrap: break-word; word-break: break-word; white-space: normal;">
                                    <div>
                                        {{ $slide->{'description_' . app()->getLocale()} }}
                                    </div>
                                    <div
                                        class="absolute left-[-5px] top-0 h-full border-l-[5px] rounded-full border-[var(--white-color)]">
                                    </div>
                                </div>
                                <a href="{{ route('contact') }}">
                                    <div class="w-[230px] h-[40px] flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                                        <p>{{ __('messages.order a service') }} </p>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="white" class="ml-[10px]">
                                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                                            </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 mt-4">
                    Нет данных
                </div>
            @endforelse
        </div>
        <div class="w-full flex">
            <div
                class="carousel-controller lg:justify-end px-[30px] lg:px-[60px] 2xl:px-[100px] lg:w-[800px] bg-[var(--accent-color)] flex items-center justify-between w-full lg:h-[15vh] h-[140px]">
                <div class="items-center flex gap-[45px] lg:p-0 lg:w-auto w-full justify-between">
                    <button class="carousel-prev w-[50px] h-[50px] border-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" fill="white">
                            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                        </svg>
                    </button>
                    <button class="carousel-next w-[50px] h-[50px] border-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" fill="white">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="px-[30px] lg:px-[60px] 2xl:px-[100px] hidden lg:block w-[1120px]"></div>
        </div>
    </div>


    {{-- ------------------------------------НАШИ УСЛУГИ------------------------------------------------------ --}}

    {{-- max-w-[2000px] --}}
    <div class="overlay-wrapper relative w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto pt-[80px] xl:pt-[80px] sm:pb-[80px] pb-0">
        <div class="overlay1"></div>
        <div class="overlay2"></div>
        <div class="overlay3"></div>
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-center p-[30px] lg:p-0">
                <span class="title-2 text-[var(--accent-color)] mr-[15px]">//</span>
                <p class="title-2 font-semibold text-center lg:text-start">{{ __('messages.all_services') }}</p>
            </div>

            @php
                $currentLang = App::getLocale();
                $supportedLangs = ['ru', 'en', 'tm'];
                if (!in_array($currentLang, $supportedLangs)) {
                    $currentLang = 'ru';
                }
            @endphp

            <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px] ">
                <!-- Цикл для вывода данных -->
                <div class="flex w-full flex-wrap h-max justify-start">
                    @forelse ($services as $index => $service)
                        <a href="{{ route('contact') }}">
                            <div class="animate-block p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[25%] flex flex-col  {{ $loop->first ? 'bg-[var(--accent-color)] text-[var(--white-color)]' : 'bg-white border-[1px] border-[var(--support-color)]' }}
                             group  hover:-translate-y-1 transition-transform duration-300">

                                <!-- Название -->
                                <p class="base-text truncate {{ $loop->first ? '' : 'mb-[15px] text-[var(--comment-color)] font-semibold group-hover:text-[var(--accent-color)]' }}">
                                    {{ $service->{'title_' . $currentLang} ??
                                        (($currentLang !== 'ru' ? $service->title_ru : ($currentLang !== 'en' ? $service->title_en : $service->title_tm)) ??
                                            'Название отсутствует') }}
                                </p>

                                <!-- Категории -->
                                <ul class="{{ $loop->first ? 'list-none pl-[10px] space-y-[5px] mt-5' : 'lg:ml-[10px] ml-0 text-[var(--accent-color)] font-semibold group-hover:text-[var(--accent-color)]' }}">
                                    {{-- Динамический вывод категорий на текущем языке с запасными вариантами --}}
                                    @php
                                        $categories =
                                        $service->{'categories_' . $currentLang} ??
                                        (($currentLang !== 'ru'
                                        ? $service->categories_ru
                                        : ($currentLang !== 'en'
                                        ? $service->categories_en
                                        : $service->categories_tm)) ??
                                        []);
                                    @endphp

                                    @foreach ($categories as $category)
                                        <li class="list-marker truncate">{{ $category }}</li>
                                    @endforeach
                                </ul>

                                <!-- Номер и кнопка -->
                                <div class="flex items-end justify-between mt-auto">
                                    <div
                                        class="number {{ $loop->first ? '' : 'text-[#75757558] font-semibold group-hover:text-[var(--accent-color)]' }}">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                            
                                <a href="">
                                    <div class="button-service {{ $loop->first ? '' : 'shadow-[0_5px_10px_rgba(0,0,0,0.1)] group-hover:shadow-[0_5px_10px_rgba(0,0,0,0.3)] transition-shadow duration-300' }}">
                                        <div class="button-service {{ $loop->first ? '' : 'shadow-[0_5px_10px_rgba(0,0,0,0.1)] hover:shadow-[0_5px_10px_rgba(0,0,0,0.3)] transition-shadow duration-300' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" class="transition-colors duration-300 fill-[#2f3d7c]">
                                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                                            </svg>
                                        </div>                                        
                                    </div>
                                </a>

                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-gray-500">
                            Нет данных
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- -----------------------------------------------О НАС--------------------------------------------------------- --}}
    <div class="w-full bg-[var(--template-color)]">
        <div class="w-full mx-auto max-w-[2000px] m-auto flex flex-col lg:flex-row bg-[var(--template-color)]">
            @if (
                $aboutUs &&
                    $aboutUs->image_path &&
                    $aboutUs->{'title_' . $currentLang} &&
                    $aboutUs->{'description_' . $currentLang})
                <!-- Блок с изображением -->
                <div class="image-container flex justify-center w-full lg:w-[50%] 2xl:w-[800px] lg:h-auto sm:h-[150vw] h-0 overflow-hidden" style="background-image: url('{{ asset('storage/' . $aboutUs->image_path) }}'); background-size: cover; background-position: center;"></div>

                <!-- Блок с текстом -->
                <div
                    class="text-container w-full lg:w-[50%] 2xl:w-[1120px] sm:py-16 p-10 px-[30px] lg:px-[60px] 2xl:px-[100px] text-[var(--white-color)]">
                    <div class="max-w-[870px]">
                        <p class="title-2 sm:mb-[40px] mb-5 font-semibold animate-text"
                            style="max-width: 100%; word-wrap: break-word; word-break: break-word; white-space: normal;">
                            {{ $aboutUs->{'title_' . $currentLang} ??
                                (($currentLang !== 'ru' ? $aboutUs->title_ru : ($currentLang !== 'en' ? $aboutUs->title_en : $aboutUs->title_tm)) ??
                                    'Название отсутствует') }}
                        </p>
                        <ul class="lg:ml-[10px] ml-0 base-text space-y-[15px]"
                            style="word-wrap: break-word; word-break: break-word; overflow-wrap: break-word;">
                            @foreach (explode("\n", $aboutUs->{'description_' . $currentLang} ?? '') as $line)
                                @if (trim($line) !== '')
                                    <li class="list-marker animate-text">{{ $line }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center text-white w-full p-5">
                    Нет данных
                </div>
            @endif
        </div>
    </div>
    {{-- ------------------------------НАШИ ПРОЕКТЫ-------------------------------------- --}}
    <div class="w-full max-w-[2000px] mx-auto px-[30px] lg:px-[60px] 2xl:px-[100px] mt-[50px] lg:mt-[90px]">
        <div class="flex flex-col lg:flex-row ">
            <div class="animate-left lg:w-[650px] w-full">
                <div class=" flex items-center">
                    <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden lg:block">//</span>
                    <p class="title-2 font-semibold">{{ __('messages.our_projects') }}</p>
                </div>
                <div class="lg:mt-[50px] mt-[20px]">
                    <ul class="space-y-[15px] text-[var(--accent-color)] font-bold">
                        <li class="list-marker">{{ __('messages.landing') }}</li>
                        <li class="list-marker">{{ __('messages.catalog') }}</li>
                        <li class="list-marker">{{ __('messages.many_page') }}</li>
                    </ul>
                    <ul class="lg:mt-[50px] mt-[20px] space-y-[20px]">
                        <li>
                            {{ __('messages.description_1') }}
                        </li>
                        <li>
                            {{ __('messages.description_2') }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full overflow-hidden flex flex-col ml-0 lg:ml-[50px] xl:ml-[80px]">
                {{-- кнопки слайдера --}}
                <div class="animate-bottom">
                    <div class="lg:flex hidden justify-end text-[var(--accent-color)] p-5">
                        <div class="flex gap-[40px] w-full lg:w-auto">
                            <button class="slider-button prev">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13">
                                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                                </svg>
                            </button>
                            <button class="slider-button next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13">
                                    <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- слайдер проектов --}}
                    <div class="w-full">
                        <div class="carousel-project flex justify-start mt-[50px] p-5">
                            {{-- 1 карточка --}}
                            @foreach ($projectstore as $projectstores)
                                <div class="carousel-item overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                                    <div class="flex flex-col">
                                        @if ($projectstores->photos)
                                            <div class="overflow-hidden w-full h-[200px] sm:h-[350px]">
                                                <img src="{{ asset('storage/' . $projectstores->photos) }}"
                                                    alt="Изображение" class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            Нет изображения
                                        @endif
                                        <div
                                            class="flex justify-between h-[70px] sm:h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                                            <div class="px-5 py-1 sm:p-5 lg:max-w-[400px] max-w-[300px]">
                                                <p class="projet-size-text truncate">
                                                    {{ $projectstores->{'title_' . app()->getLocale()} }}
                                                </p>
                                                <p class="small-text truncate">
                                                    {{ $projectstores->{'description_' . app()->getLocale()} }}
                                                </p>
                                            </div>
                                            <a href="{{ route('project.show', $projectstores->id) }}">
                                                <div
                                                    class="hover-button w-[70px] sm:w-[100px] text-[var(--white-color)] h-[70px] sm:h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="white">
                                                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
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

    </div>
    {{-- ----------------------------------------ПАРТНЕРЫ--------------------------------------------------------------- --}}
    @include('include.partners')
    <div class="w-full h-[200px]"></div>
@endsection
