@extends('layouts.app')
@section('content')
    <x-start-content />

    <div class="w-full max-w-[2000px] px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px]">
        <div class="flex sm:flex-row flex-col sm:justify-between justify-start">
            <p class="title-2 font-semibold">Все публикации</p>     
                <select id="categorySelect" name="category" class="sm:w-[300px] w-full sm:mt-0 mt-5 p-2 border-b-2 border-[var(--comment-color)] focus:border-b-[2px] focus:outline-none">
                    <option value="category1">Выбрать категорию</option>
                    <option value="category2">Категория 1</option>
                    <option value="category3">Категория 2</option>
                    <option value="category4">Категория 3</option>
                    <option value="category5">Категория 4</option>
                </select>                
        </div>
    </div>

    <div class="w-full max-w-[2000px] px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px]">
        <div class="flex justify-center flex-wrap gap-[30px]" id="itemContainer">
    
            <!-- 8 элементов, из которых по 4 будут показываться -->
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-[400px]  h-max bg-[#D3D3D3] rounded-[5px] item">
                <div>
                    <img src="{{asset('img/blog/dashboards.png')}}" alt="">
                </div>
                <div class="p-[20px] flex flex-col justify-between h-full">
                    <p class="text-[var(--accent-color)] small-text">Новости “Arassa Nusga”</p>
                    <p class="mt-[15px] base-text font-semibold">Оценка риска и доходности: Важный шаг к успешным инвестициям</p>
                    <div class="flex items-end justify-between mt-10">
                        <p class="small-text">6 июля 2022</p>
                        <a href="">
                            <button class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <span class="button-service">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
    
    
        </div>
    
        <!-- Кнопка для отображения следующих 4 элементов -->
        <div class="text-center mt-6">
            <button id="loadMoreBtn" class="px-4 py-2 bg-[var(--accent-color)] text-white rounded-md focus:outline-none">Показать больше</button>
        </div>
    </div>
    

@endsection