@extends('layouts.app')
@section('content')
<div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]">
    <div
        class="animate-left lg:w-[800px] lg:h-[660px] h-auto bg-[var(--accent-color)] flex items-center px-[30px] lg:py-[0px] py-[30px] lg:px-[60px] 2xl:px-[100px] w-full text-[var(--white-color)]">
        <div class="flex flex-col">
            <div>
                <p class="title-2">О нас</p>
                <ul class="space-y-[15px] base-text mt-[30px]">
                    <li class="list-marker">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque alias aut
                        quis officiis! Aperiam praesentium vitae eligendi, laboriosam labore modi, quae illum quibusdam
                        dolor ex adipisci porro quidem pariatur commodi!</li>
                    <li class="list-marker"><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Reprehenderit corrupti dignissimos fugiat laborum nemo! Iste, eaque, fugiat blanditiis
                            quisquam quam laboriosam odio expedita voluptas labore incidunt error, ipsa at ipsum!</a>
                    </li>
                </ul>
            </div>
            <div class="lg:hidden block mt-10">
                <div class="flex items-start">
                    <div class=" space-y-5">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis, magnam explicabo
                            dolore quidem a neque. Sint rem labore, ratione eum itaque ipsa mollitia asperiores commodi?
                            Blanditiis in expedita nisi. Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dolorum architecto ducimus est debitis quaerat earum dignissimos qui atque optio, iste
                            voluptate sunt mollitia quam vero minus quasi, cupiditate corrupti nobis?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis, magnam explicabo
                            dolore quidem a neque. Sint rem labore, ratione eum itaque ipsa mollitia asperiores commodi?
                            Blanditiis in expedita nisi. Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dolorum architecto ducimus est debitis quaerat earum dignissimos qui atque optio, iste
                            voluptate sunt mollitia quam vero minus quasi, cupiditate corrupti nobis?
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div
        class="animate-bottom lg:flex w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] justify-center items-center hidden">
        <div>
            <div class="flex items-start">
                <span class="title leading-[70px] mr-[15px] text-[var(--accent-color)]">//</span>
                <div class=" space-y-5">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis, magnam explicabo
                        dolore quidem a neque. Sint rem labore, ratione eum itaque ipsa mollitia asperiores commodi?
                        Blanditiis in expedita nisi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                        architecto ducimus est debitis quaerat earum dignissimos qui atque optio, iste voluptate sunt
                        mollitia quam vero minus quasi, cupiditate corrupti nobis?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veritatis, magnam explicabo
                        dolore quidem a neque. Sint rem labore, ratione eum itaque ipsa mollitia asperiores commodi?
                        Blanditiis in expedita nisi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                        architecto ducimus est debitis quaerat earum dignissimos qui atque optio, iste voluptate sunt
                        mollitia quam vero minus quasi, cupiditate corrupti nobis?
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div
    class="animate-left z-[-10] lg:block hidden w-full max-w-[2000px] h-max lg:mt-[-100px] mx-auto overflow-hidden relative">
    <div class="relative w-full h-[800px] overflow-hidden">
        <div class="absolute flex justify-center z-[-10] w-full h-full">
            <img class=" object-cover h-full min-w-[2000px]" src="{{ asset('img/home-page/corparate.png') }}"
                alt="">
        </div>
    </div>
</div>
    {{-- ------------------------------------- --}}
    <div class="w-full max-w-[2000px] px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="flex">
            <span class="title-2 mr-[10px] text-[var(--accent-color)]">//</span>
            <div class="flex flex-col">
                <p class="title-2">Примеры наших работ</p>
                <p class="base-text">Remember, even the tallest trees were once tiny seeds that grew steadily, day by day.</p>
            </div>
        </div>
    </div>
    <div class="w-full px-5 lg:px-[60px] 2xl:px-[100px] m-auto mt-[50px]">
        <div id="projectsContainer" class="flex justify-center gap-[35px] flex-wrap">
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-[540px] h-max slide rounded-[10px] project-item">
                <div class="flex flex-col">
                    <div>
                        <img src="{{ asset('img/home-page/unitegaming-project.png') }}" alt="">
                    </div>
                    <div
                        class="flex justify-between w-full h-[100px] bg-[var(--accent-color)] text-[var(--white-color)]">
                        <div class="p-5">
                            <p class="projet-size-text">Unite Gaming</p>
                            <p class="small-text">Приложение сетевых игр </p>
                        </div>
                        <a href="">
                            <div class="hover-button w-[100px] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-5">
            <button id="loadMoreButton" class="bg-[var(--accent-color)] small-text text-white p-5 rounded-[5px]">
                Показать ещё
            </button>
        </div>
    </div>
    
@endsection