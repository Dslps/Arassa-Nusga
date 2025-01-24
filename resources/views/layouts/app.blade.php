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
        <header class="header w-full max-w-[2000px] lg:h-[15vh] h-[140px] z-10 uppercase">
            <nav class="w-full flex h-full small-text">
                <div
                    class="lg:w-[800px] bg-[var(--accent-color)] h-full flex items-center px-[30px] lg:px-[60px] 2xl:px-[100px] w-full">
                    <div class=" lg:hidden block">
                        <!-- Кнопка для открытия хедера -->
                        <button id="toggle-header" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="white">
                                <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                            </svg>                            
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" fill="white">
                        <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                    </svg>
                        
                </button>
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
        <div class="w-full max-w-[2000px] mx-auto bg-[var(--template-color)] lg:h-[500px] h-max ">

            <div class="relative text-[var(--white-color)]">
                <div
                    class="flex lg:flex-row flex-col justify-between lg:items-center lg:absolute 2xl:left-[100px] 2xl:right-[100px] lg:left-[60px] lg:right-[60px] 2xl:mt-[-150px] xl:mt-[-125px] mt-[-100px]  2xl:h-[300px] xl:h-[250px] h-max lg:p-0 p-[30px] bg-[var(--accent-color)]">
                    <div class="2xl:ml-[90px] xl:ml-[60px] lg:ml-[50px] m-auto  flex items-center">
                        <div class="w-full lg:max-w-[400px]">
                            <p class="2xl:text-[46px] 2xl:text-[36px] xl:text-[28px]  font-bold text-center lg:text-start">{{ __('messages.cooperation') }}</p>
                        </div>
                    </div>
                    <div class="p-0 lg:p-10 m-auto">
                        <div class="flex items-center max-w-[680px] m-auto py-[10px] lg:py-0">
                            <p class="text-[50px] mr-[10px] hidden lg:block">//</p>
                            <p class="base-text text-center lg:text-start">{{ __('messages.write') }}</p>
                        </div>
                    </div>
                    <a class="" href="{{route('contact')}}">
                        <div
                            class="hover-button flex justify-center items-center h-[50px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] 2xl:h-[300px] 2xl:w-[300px] bg-[var(--button-color)] text-[var(--white-color)]">
                            <div class="flex items-center base-text">
                                <p class="">{{ __('messages.write-buttom') }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" fill="white" class="ml-[10px]">
                                    <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
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
                                class="bottom-link {{ Request::routeIs('blog') ? 'before:w-full' : '' }}"
                                href="{{ route('about-us') }}">{{ __('messages.nav-2') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('about-us') ? 'before:w-full' : '' }}"
                                href="{{{route('blog')}}}">{{ __('messages.nav-3') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('project') ? 'before:w-full' : '' }}"
                                href="{{ route('project') }}">{{ __('messages.nav-4') }}</a></li>
                        <li class="list-marker"><a
                                class="bottom-link {{ Request::routeIs('contact') ? 'before:w-full' : '' }}"
                                href="{{ route('contact') }}">{{ __('messages.cotact') }}</a></li>
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
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width='20' height="20" fill="white" class="mr-[10px]">
                                <path d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/>
                            </svg>
                            <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                info@arassanusga.com
                            </a>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width='20' height="20" fill="white" class="mr-[10px]">
                                <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                            </svg>
                            <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                +99312754480
                            </a>
                            <span class="mx-[10px]">/</span>
                            <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">+99361648605</a>
                        </li>
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width='20' height="20" fill="white" class="mr-[10px]">
                                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                            </svg>
                            <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : 'contact-dash' }}"
                                href="{{ route('contact') }}">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                {{ __('messages.location') }}
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="white">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>
                                    
                                </a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="20" height="20" fill="white">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                                    </svg>                                    
                                </a>
                                <a class="bottom-link {{ Request::routeIs('') ? 'before:w-full' : '' }}" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="white">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome-->
                                        <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                                    </svg>
                                    
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>
