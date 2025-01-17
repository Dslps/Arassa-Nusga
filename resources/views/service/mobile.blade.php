@extends('layouts.app')
@section('content')
    <div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
        <div class="w-full flex">
            <!-- Левая часть с текстом и кнопкой -->
            <div
                class="animate-left lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)] flex flex-col lg:flex-row lg:items-center px-0 lg:px-[60px] 2xl:px-[100px] w-full">

                <div class="text-[var(--white-color)] lg:mt-0 mt-10 lg:text-start text-center">
                    <div class="lg:px-[0px] px-[30px]">
                        <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="title font-semibold">{{ $mobile->{'title_' . app()->getLocale()} }}</p>
                    <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="base-text">{{ $mobile->{'categories_' . app()->getLocale()} }}</p>
                    </div>
                    
                    <a href="{{route('contact')}}">
                        <div
                            class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                            <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                        </div>
                    </a>
                    <!-- Изображение для мобильных устройств -->
                    @if (isset($mobile->photos) && count($mobile->photos) > 0)
                        <div class="lg:hidden flex justify-center mt-4 pt-5">
                            <img src="{{ asset('storage/' . $mobile->photos[0]) }}" alt="mobile Image">
                        </div>
                    @endif
                </div>

            </div>
            <!-- Правая часть с изображением для десктопов -->
            <div class=" relative animate-bottom lg:flex hidden w-[1120px] px-0 lg:px-[60px] 2xl:px-[100px] h-[660px] justify-center items-center">
                <div class=" absolute w-full h-full">
                    @if (isset($mobile->photos) && count($mobile->photos) > 0)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $mobile->photos[0]) }}" alt="mobile Image">
                    @else
                        Данные отсутсвуют
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- ----------------------------------------------------------- --}}
    <div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex items-start p-[30px] lg:p-0  text-center lg:text-start">
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
                        <p class="base-text font-semibold">Наши возможности по разработке мобильных приложений</p>
                        <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                            <li class="list-marker">Мы предлагаем широкий спектр мобильных решений, которые могут удовлетворить потребности различных бизнес-сегментов</li>
                        </ul>

                    </div>
                    @foreach ($services as $index => $service)
                        <div class="animate-block p-[30px] w-full h-[250px] sm:w-[50%] 2xl:w-[25%] flex flex-col bg-white shadow hover:shadow-lg hover:-translate-y-1 transition-transform duration-300">

                            <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $service->{'title_' . app()->getLocale()} }}
                            </p>
                            <ul style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="ml-[10px] text-[var(--accent-color)] small-text font-semibold">
                                @foreach ($service->{'categories_' . app()->getLocale()} as $service)
                                    <li class="list-marker">{{ $service }}</li>
                                @endforeach
                            </ul>

                            <div class="flex items-end justify-between mt-auto">
                                <div class="number text-[var(--comment-color)] font-semibold">{{ $index + 1 }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    {{-- ----------------------------------Этапы разработки----------------------------------- --}}
    <div class="w-full px-[30px] lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="max-w-[2000px] m-auto">
            <div class="flex justify-center lg:justify-start">
                <span class="title-2 text-[var(--accent-color)] mr-[20px] hidden lg:block">//</span>
                <div class="max-w-[860px] ">
                    <p class="title-2 font-semibold">Этапы разработки</p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-5 mt-[50px]">

                    @foreach ($implementationStages as $index => $stage)
                        <div class="animate-block min-h-[220px] h-max p-[30px] bg-[var(--white-color)] flex flex-col justify-between"
                            style="animation: shadowPulse 2s ease-in-out infinite; animation-delay: {{ 0.4 * $index }}s;">

                            <!-- Титульный текст на текущем языке -->
                            <p style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="number mb-[15px] text-[var(--comment-color)] font-semibold">
                                {{ $stage->{'title_' . app()->getLocale()} }}
                            </p>

                            @php
                                $currentCategories = $stage->{'categories_' . app()->getLocale()} ?? [];
                            @endphp

                            @if (!empty($currentCategories) && is_array($currentCategories))
                                <ul style="word-break: break-word; word-wrap: break-word;  white-space: normal; max-width: 100%;" class="ml-[10px] text-[var(--accent-color)] small-text font-semibold mb-5">
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
