@extends('layouts.app')
@section('content')
{{-- ---------------------------начальная часть страницы-------------------------------- --}}
<div class="w-full max-w-[2000px] mx-auto">
    <div class="w-full flex">
        <div class="lg:w-[800px] lg:h-[660px] h-max bg-[var(--accent-color)]  flex flex-col lg:flex-row lg:items-center  px-10 xl:px-[100px] w-full">
           
           <div class="text-[var(--white-color)]">
            <p class="title font-semibold">Битрикс 24</p>
            <p class="base-text">Битрикс24 на вашем сервере с вашими индивидуальными настройками, доработками и брендом.</p>
            <a href="">
                <div class="w-[230px] h-[40px] hidden lg:flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px]">
                    <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
                </div>
            </a>
            <div class="lg:hidden block">
                <img src="{{asset('img/bitrix24/box-corp.png')}}" alt="">
            </div>
            <div class="w-[230px] h-[40px] lg:hidden flex items-center border-t-2 border-b-2 justify-center lg:mt-[25px] lg:m-0 m-auto mt-[25px] mb-5">
                <p>Заказать услугу <i class="ml-[10px] fa-solid fa-arrow-right-long"></i></p>
            </div>
           </div>
            
        </div>
        <div class="lg:flex hidden w-[1120px] h-[560px] px-[50px] xl:px-[100px] justify-center items-center">
            <img src="{{asset('img/bitrix24/box-corp.png')}}" alt="">
        </div>
        
    </div>
</div>
{{-- ------------------------------------спискок предлагаемых услуг с ценой------------------------------------------- --}}
<div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
    <div class="max-w-[2000px] m-auto">
        <div class="flex">
            <span class="title-2 text-[var(--accent-color)] mr-[20px]">//</span>
            <div class="max-w-[860px]">
                <p class="title-2 font-semibold text-center lg:text-start">Наши услуги</p>
                <p class="base-text">The quiet forest was alive with the sounds of nature. Birds chirped melodiously, and a gentle breeze rustled the leaves, carrying the earthy scent of pine and moss. Sunlight streamed through the</p>
            </div>
        </div>
        

        <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
            <div class="flex w-full h-max lg:w-[300px] 2xl:w-[400px] lg:h-[500px]">
                <div class="bg-[var(--accent-color)] w-full lg:w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                    <p class="base-text font-semibold">Облако</p>
                    <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                        <li class="list-marker">Цифровое рабочее пространство</li>
                        <li class="list-marker">Управление задачами</li>
                        <li class="list-marker">Обмен файлами и сообщениями</li>
                        <li class="list-marker">Коммуникация</li>
                        <li class="list-marker">Работа в группах</li>
                        <li class="list-marker">Поддержка принятия решений</li>
                    </ul>
                    
                </div>
            </div>
             {{--  1 карточка --}}
            <div class="flex flex-wrap max-w-[1300px] justify-start ">
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col bg-white">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Бесплатно</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Начните работать онлайн и продавать больше с CRM</li>
                        <li class="list-marker">Неограниченно пользователей</li>
                        <li class="list-marker">5 Гб</li>
                    </ul>
                   
                    <div class="flex items-end justify-between mt-auto text-[var(--comment-color)]">
                        <div class="number text-[var(--comment-color)] font-semibold">01</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Для эффективной работы небольших компаний</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">02</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">03</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">04</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 5 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">05</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- ------------------------------------------Битрикс коробка--------------------------------------------- --}}
<div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
    <div class="max-w-[2000px] m-auto">
       
        <div class="flex flex-col lg:flex-row mt-[50px] lg:mt-[60px] 2xl:mt-[100px]">
            <div class="flex w-full h-max lg:w-[300px] 2xl:w-[400px] lg:h-[500px]">
                <div class="bg-[var(--accent-color)] w-full lg:w-[400px] text-[var(--white-color)] p-[30px] flex flex-col">
                    <p class="base-text font-semibold">Облако</p>
                    <ul class="small-text list-none pl-[10px] space-y-[5px] mt-5">
                        <li class="list-marker">Цифровое рабочее пространство</li>
                        <li class="list-marker">Управление задачами</li>
                        <li class="list-marker">Обмен файлами и сообщениями</li>
                        <li class="list-marker">Коммуникация</li>
                        <li class="list-marker">Работа в группах</li>
                        <li class="list-marker">Поддержка принятия решений</li>
                    </ul>
                    
                </div>
            </div>
             {{--  1 карточка --}}
            <div class="flex flex-wrap max-w-[1300px] justify-start ">
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col bg-white">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Бесплатно</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Начните работать онлайн и продавать больше с CRM</li>
                        <li class="list-marker">Неограниченно пользователей</li>
                        <li class="list-marker">5 Гб</li>
                    </ul>
                   
                    <div class="flex items-end justify-between mt-auto text-[var(--comment-color)]">
                        <div class="number text-[var(--comment-color)] font-semibold">01</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Базовый</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Для эффективной работы небольших компаний</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">02</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">03</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">04</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 5 карточка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)]">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">05</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 6 картчка --}}
                <div class="p-[30px] w-full sm:w-[50%] lg:w-[50%] 2xl:w-[410px] lg:h-[250px] flex flex-col text-[var(--comment-color)] ">
                    <p class="base-text mb-[15px] text-[var(--comment-color)] font-semibold">Автоматизация финансового
                        учета</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Внедрение ERP-систем</li>
                        <li class="list-marker">Системы управления бюджетированием</li>
                        <li class="list-marker">Управление расчетами и платежами</li>
                    </ul>
                    <div class="flex items-end justify-between mt-auto">
                        <div class="number text-[var(--comment-color)] font-semibold">06</div>
                        <div>
                            <div class="flex flex-col">
                                <div class="flex items-center">
                                    <p class="smaii-text line-through font-semibold">230 тм</p>
                                    <div class="bg-[var(--price-color)] text-[var(--white-color)] flex justify-center items-center p-[3px] rounded-tl-[10px] rounded-tr-[5px] rounded-br-[10px] rounded-bl-[5px] ml-[4px]">
                                        <p class="small-text">-20%</p>
                                    </div>
                                </div>
                                <p class="number font-semibold">200 тм</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- ----------------------------------------------------------Этапы реализаций------------------------------------------------------- --}}
<div class="w-full px-0 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
    <div class="max-w-[2000px] m-auto">
        <div class="flex">
            <span class="title-2 text-[var(--accent-color)] mr-[20px]">//</span>
            <div class="max-w-[860px]">
                <p class="title-2 font-semibold text-center lg:text-start">Этапы реализаций</p>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 mt-[50px]">
                {{-- 1 шаг --}}
                <div class="p-[30px] border-r-[1px] border-[var(--comment-color)]">
                    <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Идея</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Формирование замысла</li>
                        <li class="list-marker">Анализ и проработка</li>
                        <li class="list-marker">Визуализация и презентация</li>
                    </ul>
                    <p class="number font-semibold text-[var(accent-color)] mt-[15px]">01</p>
                </div>
                {{-- 2 шаг --}}
                <div class="p-[30px] border-r-[1px] border-[var(--comment-color)]">
                    <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Техническое задание</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Сбор и анализ требований</li>
                        <li class="list-marker">Структурирование и документирование</li>
                        <li class="list-marker">Согласование и утверждение</li>
                    </ul>
                    <p class="number font-semibold text-[var(accent-color)] mt-[15px]">02</p>
                </div>
                {{-- 3 шаг --}}
                <div class="p-[30px] 2xl:border-none xl:border-r-[1px] border-[var(--comment-color)]">
                    <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Разработка</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Планирование и проектирование</li>
                        <li class="list-marker">Программирование</li>
                        <li class="list-marker">Тестирование и отладка</li>
                    </ul>
                    <p class="number font-semibold text-[var(accent-color)] mt-[15px]">03</p>
                </div>
                {{-- 4 шаг --}}
                <div class="p-[30px] 2xl:border-none xl:border-t-[1px] border-[var(--comment-color)]">
                    <p class="number mb-[15px] text-[var(--comment-color)] font-semibold">Публикация приложений</p>
                    <ul class="ml-[10px] text-[var(--accent-color)] small-text">
                        <li class="list-marker">Подготовка приложения</li>
                        <li class="list-marker">Прохождение проверки</li>
                        <li class="list-marker">Размещение и запуск</li>
                    </ul>
                    <p class="number font-semibold text-[var(accent-color)] mt-[15px]">04</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection