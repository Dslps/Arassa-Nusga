<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/jquery.min.js', 'resources/js/app.js', 'resources/css/slick.css', 'resources/js/slick.min.js'])
</head>

<body>
    <div style="background: linear-gradient(to right, #243060 41.65%, #243060 41.65%, #fff 41.65%, #fff 60%);" class="top-box z-[50] fixed w-full lg:h-[15vh] h-[140px] flex justify-center">
        <header class="header w-full max-w-[2000px] lg:h-[15vh] h-[140px] z-10">
            <nav class="w-full flex h-full small-text">
                <div
                    class="lg:w-[800px] bg-[var(--accent-color)] h-full flex items-center px-[30px] lg:px-[60px] 2xl:px-[100px] w-full">
                    <div class=" lg:hidden block">
                        <!-- Кнопка для открытия хедера -->
                        <button id="toggle-header" class="text-white">
                            <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
                        </button>
                    </div>

                    <a href="{{ route('home') }}">
                        <img class="w-[120px] h-[35px] sm:w-[160px] sm:h-[45px] xl:w-[180px] xl:h-[50px] 2xl:w-[200px] 2xl:h-[55px] ml-[20px] xl:ml-[20px]  2xl:ml-[40px]"
                            src="{{ asset('img/logo.png') }}" alt="">
                    </a>

                    <div class="flex text-white gap-[5px] ml-auto">
                        <p class="font-semibold">
                            <a href="{{ route('language.switch', ['locale' => 'ru']) }}">Rus</a>
                        </p>
                        <span>/</span>
                        <p class="font-semibold">
                            <a href="{{ route('language.switch', ['locale' => 'tm']) }}">Tm</a>
                        </p>
                        <span>/</span>
                        <p class="font-semibold">
                            <a href="{{ route('language.switch', ['locale' => 'en']) }}">Eng</a>
                        </p>
                    </div>






                </div>
                <div
                    class="lg:flex bg-[var(--white-color)] items-center justify-between px-[30px] lg:px-[60px] 2xl:px-[100px] w-[1120px] hidden">
                    <div class="flex gap-[5px]">
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ Request::routeIs('home') ? 'before:w-full' : '' }}">
                                {{ __('messages.nav-0') }}
                            </a>
                        </p>



                        <span class=" font-black text-[var(--accent-color)]">//</span>
                        <div class="relative group">
                            <!-- Основная кнопка -->
                            <p class="font-semibold relative inline-block">
                                <a href="{{ route('bitrix24') }}"
                                    class="nav-link {{ Request::routeIs('bitrix24') ? 'before:w-full' : '' }}">
                                    {{ __('messages.nav-1') }}
                                </a>
                            </p>

                            <!-- Выпадающий список -->
                            <div
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-2 w-[250px] bg-[var(--accent-color)] text-[var(--white-color)] rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 p-[15px]">
                                <a href="{{ asset('bitrix24') }}"
                                    class="block px-4 py-2 text-[var(--white-color)">{{ __('messages.nav-5') }}</a>
                                <a href="{{ asset('mobile') }}"
                                    class="block px-4 py-2 text-[var(--white-color)">{{ __('messages.nav-6') }}</a>
                                <a href="{{ asset('web-development') }}"
                                    class="block px-4 py-2 text-[var(--white-color)">{{ __('messages.nav-7') }}</a>
                                <a href="{{ asset('antiviruses') }}"
                                    class="block px-4 py-2 text-[var(--white-color)">{{ __('messages.nav-8') }}</a>
                            </div>
                        </div>

                        <span class=" font-black text-[var(--accent-color)]">//</span>
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('about-us') }}"
                                class="nav-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}">
                                {{ __('messages.nav-2') }}
                            </a>
                        </p>
                        <span class=" font-black text-[var(--accent-color)]">//</span>
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('blog') }}"
                                class="nav-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}">
                                {{ __('messages.nav-3') }}
                            </a>
                        </p>
                        <span class=" font-black text-[var(--accent-color)]">//</span>
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('project') }}"
                                class="nav-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}">
                                {{ __('messages.nav-4') }}
                            </a>
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold relative inline-block">
                            <a href="{{ route('contact') }}"
                                class="nav-link {{ Request::routeIs('contact') ? 'before:w-full' : '' }}">
                                +993-(71)-55-66-84
                            </a>
                        </p>
                    </div>
                </div>
            </nav>

            <div id="full-header"
                class="hidden fixed top-0 left-0 w-full h-screen bg-[var(--accent-color)] text-white p-[60px] flex gap-8">
                <button id="close-header" class="text-white absolute top-[50px] left-[35px]">
                    <i class="text-[25px] fa-solid fa-xmark"></i></button>
                <div class="flex flex-col mt-5">
                    <div class="flex flex-col space-y-5 mt-5">
                        <p style="font-size: 24px; font-weight:600;" class=""><a
                                href="{{ route('home') }}">{{ __('messages.nav-0') }}</a></p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('about-us') }}">{{ __('messages.nav-2') }}</a></p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('blog') }}">{{ __('messages.nav-3') }}</a></p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('project') }}">{{ __('messages.nav-4') }}</a></p>
                    </div>
                    <div class="space-y-5 mt-5">
                        <p style="font-size: 24px; font-weight:600;">Услуги</p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('bitrix24') }}">{{ __('messages.nav-5') }}</a></p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('mobile') }}">{{ __('messages.nav-6') }}</a>
                        </p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('web-development') }}">{{ __('messages.nav-7') }}</a></p>
                        <p style="font-size: 20px;" class=""><a
                                href="{{ route('antiviruses') }}">{{ __('messages.nav-8') }}</a></p>
                    </div>
                    <div>
                        <p class="mt-5" style="font-size: 24px; font-weight:600;">Связь с нами:</p>
                        <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                            <li>
                                <a class="bottom-link" href="{{ route('contact') }}">
                                    <i class="mr-[10px] fa-regular fa-envelope"></i>
                                    info@arassanusga.com
                                </a>
                            </li>
                            <li>
                                <a class="bottom-link" href="{{ route('contact') }}">
                                    <i class="mr-[10px] fa-solid fa-phone"></i>
                                    +99312754480
                                </a>
                                <span>/</span>
                                <a class="bottom-link" href="{{ route('contact') }}">+99361648605</a>
                            </li>
                            <li>
                                <a class="bottom-link" href="{{ route('contact') }}">
                                    <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                    Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан
                                </a>
                            </li>
                            <li>
                                <div class="flex gap-[10px]">
                                    <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                        href=""><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                        href=""><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                        href=""><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>



    @yield('content')

    <footer class="w-full bg-[var(--template-color)]">
        <div class="w-full max-w-[2000px] mx-auto bg-[var(--template-color)] lg:h-[500px] h-max mt-[250px]">

            <div class="relative text-[var(--white-color)]">
                <div
                    class="flex lg:flex-row flex-col justify-between lg:items-center lg:absolute 2xl:left-[100px] 2xl:right-[100px] lg:left-[60px] lg:right-[60px] 2xl:mt-[-150px] xl:mt-[-125px] mt-[-100px]  2xl:h-[300px] xl:h-[250px] h-max lg:p-0 p-[30px] bg-[var(--accent-color)]">
                    <div class="xl:ml-[90px] lg:ml-[50px] m-auto  flex items-center">
                        <div class="w-full lg:max-w-[400px]">
                            <p class="title-2 text-center lg:text-start">{{ __('messages.cooperation') }}</p>
                        </div>
                    </div>
                    <div class="p-0 lg:p-10 m-auto">
                        <div class="flex items-center max-w-[680px] m-auto py-[10px] lg:py-0">
                            <p class="title mr-[10px] hidden lg:blog">//</p>
                            <p class="base-text text-center lg:text-start">{{ __('messages.write') }}</p>
                        </div>
                    </div>
                    <a class="" href="">
                        <div
                            class="hover-button flex justify-center items-center h-[50px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] 2xl:h-[300px] 2xl:w-[300px] bg-[var(--button-color)] text-[var(--white-color)]">
                            <div class="flex items-center base-text">
                                <p class="">{{ __('messages.write-buttom') }}</p>
                                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    width="15" height="15" fill="white">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                    <path
                                        d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                </svg>

                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div
                class="flex flex-wrap justify-center text-[var(--white-color)] px-[30px] lg:px-[100px] 2xl:pt-[180px] xl:pt-[160px] lg:pt-[140px] pt-[30px]">
                <div class="flex-1 p-5">
                    <p class="">{{ __('messages.navigation') }}</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('home') ? 'before:w-full' : '' }}"
                                href="{{ route('home') }}">{{ __('messages.nav-0') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}"
                                href="{{ route('about-us') }}">{{ __('messages.nav-1') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}"
                                href="{{ route('blog') }}">{{ __('messages.nav-2') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}"
                                href="{{ route('project') }}">{{ __('messages.nav-4') }}</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">{{ __('messages.service') }}</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('bitrix24') ? 'before:w-full' : '' }}"
                                href="{{ route('bitrix24') }}">{{ __('messages.nav-5') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('mobile') ? 'before:w-full' : 'mobile' }}"
                                href="{{ route('mobile') }}">{{ __('messages.nav-6') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('web-development') ? 'before:w-full' : '' }}"
                                href="{{ route('web-development') }}">{{ __('messages.nav-7') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('antiviruses') ? 'before:w-full' : '' }}"
                                href="{{ route('antiviruses') }}">{{ __('messages.nav-8') }}</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">{{ __('messages.confidentiality') }}</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                href="">{{ __('messages.policy') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                href="">{{ __('messages.agreement') }}</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">{{ __('messages.cotact') }}</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-regular fa-envelope"></i>
                                info@arassanusga.com
                            </a>
                        </li>
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-phone"></i>
                                +99312754480
                            </a>
                            <span>/</span>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">+99361648605</a>
                        </li>
                        <li>
                            <a class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                {{ __('messages.location') }}
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-instagram"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}"
                                    href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>
