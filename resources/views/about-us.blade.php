@extends('layouts.app')
@section('content')

<div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]">
    <div
        class="animate-left lg:w-[800px] lg:h-[660px] h-auto bg-[var(--accent-color)] flex items-center px-[30px] lg:py-[0px] py-[30px] lg:px-[60px] 2xl:px-[100px] w-full text-[var(--white-color)] break-words min-w-0">
        <div class="flex flex-col min-w-0">
            <div class="min-w-0">
                {{-- Титульное название --}}
                <p class="title-2 break-words min-w-0">{{ $aboutUs->{'title_' . app()->getLocale()} ?? __('О нас') }}</p>
                {{-- Описание --}}
                <ul class="space-y-[15px] base-text mt-[30px] break-words min-w-0">
                    @if($aboutUs->{'description_' . app()->getLocale()})
                        @foreach(explode("\n", $aboutUs->{'description_' . app()->getLocale()}) as $line)
                            <li class="list-marker break-words min-w-0">{{ $line }}</li>
                        @endforeach
                    @else
                        <li class="list-marker break-words min-w-0">{{ __('messages.default_description_line1') }}</li>
                        <li class="list-marker break-words min-w-0"><a href="#">{{ __('messages.default_description_line2_with_link') }}</a></li>
                    @endif
                </ul>
            </div>
            
            {{-- Дополнительная информация --}}
            @if($aboutUs->{'additional_' . app()->getLocale()})
                <div class="lg:hidden block mt-10 break-words min-w-0">
                    <div class="flex items-start min-w-0">
                        <div class="space-y-5 break-words min-w-0">
                            {!! nl2br(e($aboutUs->{'additional_' . app()->getLocale()})) !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    {{-- Дополнительная информация для больших экранов --}}
    @if($aboutUs->{'additional_' . app()->getLocale()})
        <div
            class="animate-bottom lg:flex w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] justify-start items-center hidden break-words min-w-0">
            <div class="min-w-0">
                <div class="flex items-start min-w-0">
                    <span class="title leading-[70px] mr-[15px] text-[var(--accent-color)]">//</span>
                    <div class="space-y-5 break-words min-w-0">
                        {!! nl2br(e($aboutUs->{'additional_' . app()->getLocale()})) !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Блок с изображением --}}
<div
    class="animate-left z-[-10] lg:block hidden w-full max-w-[2000px] h-max lg:mt-[-100px] mx-auto overflow-hidden relative">
    <div class="relative w-full h-[800px] overflow-hidden">
        <div class="absolute flex justify-center z-[-10] w-full h-full">
            @if(!empty($aboutUs->photos))
                @php
                    // Проверяем, является ли photos массивом. Если нет, разбиваем строку на массив по запятой.
                    $photos = is_array($aboutUs->photos) ? $aboutUs->photos : explode(',', $aboutUs->photos);
                @endphp

                @if(count($photos) > 0)
                    @foreach($photos as $photo)
                        {{-- Убираем возможные пробелы и экранирование символов --}}
                        @php
                            $photo = trim($photo, ' "');
                        @endphp
                        <img class="object-cover h-full min-w-[2000px]" src="{{ Storage::url($photo) }}"
                            alt="{{ __('messages.about_us_photo') }}">
                    @endforeach
                @else
                    <img class="object-cover h-full min-w-[2000px]"
                        src="{{ asset('img/home-page/corporate.png') }}" {{-- Исправлена опечатка --}}
                        alt="{{ __('messages.default_about_us_image') }}">
                @endif
            @else
                <img class="object-cover h-full min-w-[2000px]"
                    src="{{ asset('img/home-page/corporate.png') }}" {{-- Исправлена опечатка --}}
                    alt="{{ __('messages.default_about_us_image') }}">
            @endif
        </div>
    </div>
</div>








    {{-- -------------------------------Принципы работы ----------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[80px] ">
        <div class="max-w-[2000px] m-auto">
            <div>
                <p class="title-2 pl-0 lg:pl-4 lg:text-start text-center mb-[60px]">Принципы нашей работы</p>
            </div>
            <div class="grid lg:text-start text-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($principles as $principle)
                <div class="flex flex-col p-4">
                    <!-- Изображение -->
                    @if($principle->photos)
                    <img class="lg:w-[80px] w-[50px] lg:h-[80px] h-[50px] object-cover lg:mx-0 mx-auto" src="{{ asset('storage/' . $principle->photos) }}" alt="{{ $principle->{'title_' . app()->getLocale()} }}">
                    @else
                    <img class="lg:w-[80px] w-[50px] lg:h-[80px] h-[50px] object-cover lg:mx-0 mx-auto" src="{{ asset('img/default-placeholder.png') }}" alt="Placeholder">
                    @endif
    
                    <!-- Заголовок -->
                    <p class="relative base-text mt-[20px] mb-[30px] after:content-[''] after:block after:w-[20px] after:h-[2px] after:bg-[var(--accent-color)] after:absolute lg:after:left-[10px] after:top-full after:mt-[15px] after:left-1/2 after:translate-x-[-50%]">
                        {{ $principle->{'title_' . app()->getLocale()} }}
                    </p>
    
                    <!-- Описание -->
                    <div class="small-text font-semibold text-[var(--comment-color)]">
                        {{ $principle->{'description_' . app()->getLocale()} }}
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center text-gray-500">
                    <p>Принципы работы отсутствуют.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    
    
    {{-- ------------------------------------------О нас-------------------------------------------- --}}
    <div class="w-full mx-auto max-w-[2000px] m-auto flex flex-col lg:flex-row mt-[115px]">
        <div class="xl:flex hidden justify-center w-full lg:w-[850px] object-cover overflow-hidden relative">
            @if (!empty($companyDescriptions->first()->photos)) 
                <img src="{{ asset('storage/' . explode(',', $companyDescriptions->first()->photos)[0]) }}" 
                     alt="Описание компаний" 
                     class="w-full lg:w-auto h-auto object-cover">
            @else
                <img src="{{ asset('img/default-placeholder.png') }}" 
                     alt="Заглушка" 
                     class="w-full lg:w-auto h-auto object-cover">
            @endif
        </div>
        

        <div class="relarive lg:w-max w-full relative lg:ml-auto">
            <div
                class=" w-full xl:w-[400px] h-max xl:h-[450px] bg-[var(--accent-color)] text-[var(--white-color)] p-10 relative xl:absolute xl:left-[-400px] left-0 3xl:bottom-[30px] bottom-0 z-0">
                <div class="w-full h-full flex flex-col">
                    <div class="mb-auto">
                        <!-- Верхний текст -->
                        @if($achievements->isNotEmpty())
                            @foreach($achievements as $achievement)
                                <p>{{ $achievement->{'top_text_' . app()->getLocale()} }}</p>
                            @endforeach
                        @else
                            <!-- Текст по умолчанию -->
                            <p>Our achievements are milestones that inspire us to strive for more.</p>
                        @endif
                    </div>
                    <div class="mt-auto flex flex-col gap-[15px]">
                        @if($achievements->isNotEmpty())
                            @foreach($achievements as $achievement)
                                <!-- Титульный текст -->
                                <p class="text-[36px]">
                                    {{ $achievement->{'title_' . app()->getLocale()} }}
                                </p>
                                <!-- Описание -->
                                <p class="small-text">
                                    {{ $achievement->{'description_' . app()->getLocale()} }}
                                </p>
                            @endforeach
                        @else
                            <!-- Текст по умолчанию -->
                            <p class="text-[36px]">Success is not just about</p>
                            <p class="small-text">
                                Success is not just about achieving goals; it's about the journey and the lessons learned along the way.
                                Every challenge you face is an opportunity to grow, and every step forward, no matter how small, brings you closer to your dreams.
                            </p>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="w-full xl:max-w-[800px]  mr-0 lg:mr-[100px] text-[var(--template-color)] p-10">
                @foreach ($companyDescriptions as $description)
                    <!-- Динамическое отображение заголовка на основе текущего языка -->
                    <p class="title-2 max-w-[430px] mb-[40px] font-semibold break-words">{{ $description->{'title_' . app()->getLocale()} }}</p>
            
                    <!-- Список на основе текущего языка -->
                    <ul class="ml-[10px] base-text space-y-[15px]">
                        @foreach (preg_split('/\r\n|\r|\n/', $description->{'description_' . app()->getLocale()}) as $item)
                            @if (trim($item)) <!-- Игнорируем пустые строки -->
                                <li class="list-marker break-words">{{ $item }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>
            
            
            
        </div>
    </div>
    {{-- ---------------------------------НАШЕ РУКОВОДСТВО---------------------------------------------- --}}
    <div class="w-full mx-auto max-w-[2000px] mt-[115px] pb-[90px] px-5 lg:px-[100px]">
        <div>
            <p class="title-2 text-center lg:text-start">Наше руководство</p>
            <div class="flex mt-[10px] lg:mt-[40px] lg:justify-start justify-center items-center">
                <span class="mr-[10px] text-[36px] font-semibold text-[var(--accent-color)] hidden lg:block">//</span>
                <p class="base-text">Персонал - гордость нашего бизнеса</p>
            </div>
        </div>
    
        <!-- Грид-сетка для карточек -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[50px] mt-[40px] justify-items-center">
            @forelse($employees as $employee)
                <div class="flex flex-col items-center">
                    @if($employee->photo)
                        <img class="w-full h-auto object-cover max-w-full aspect-square" 
                            src="{{ asset('storage/' . $employee->photo) }}" alt="{{ $employee->{'name_' . app()->getLocale()} }}">
                    @else
                        <img class="w-full h-auto object-cover max-w-full aspect-square" 
                            src="{{ asset('img/default-avatar.png') }}" alt="Нет фото">
                    @endif
                    <div class="mt-[20px] text-center">
                        <p class="base-text font-semibold text-[var(--comment-color)]">
                            {{ $employee->{'position_' . app()->getLocale()} }}
                        </p>
                        <p class="number font-semibold">{{ $employee->{'name_' . app()->getLocale()} }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-3">Сотрудники не найдены.</p>
            @endforelse
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
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate1.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate2.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate3.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate4.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate1.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate2.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate3.png') }}"
                        alt="">
                </div>
                <div>
                    <img class="max-w-[400px] max-h-[460px]" src="{{ asset('img/about-us/certificate4.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
