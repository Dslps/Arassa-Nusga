<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="w-full max-w-[2000px] mx-auto h-[140px] z-10">
        <nav class="w-full flex h-[140px] small-text">
            <div class="lg:w-[800px] bg-[var(--accent-color)] h-full flex items-center px-[50px] xl:px-[100px] w-full">
                <div class="">
                    <!-- Кнопка для открытия хедера -->
                    <button id="toggle-header" class="text-white">
                        <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <a href="">
                    <img class="w-[160px] h-[40px] ml-[20px] xl:w-[170px] xl:h-[45px] xl:ml-[20px] 2xl:w-[200px] 2xl:h-[50px] 2xl:ml-[40px]"
                        src="{{ asset('img/logo.png') }}" alt="">
                </a>

                <div class="flex text-[var(--white-color)] gap-[5px] ml-auto">
                    <p><a href="#">Rus</a></p>
                    <span>/</span>
                    <p><a href="#">Tm</a></p>
                    <span>/</span>
                    <p><a href="#">Eng</a></p>
                </div>
            </div>
            <div class="lg:flex items-center justify-between px-[50px] xl:px-[100px] w-[1120px] hidden">
                <div class="flex gap-[5px]">
                    <p><a href="">Главная</a></p>
                    <span class=" font-black text-[var(--comment-color)]">//</span>
                    <p><a href="">Услуги</a></p>
                    <span class=" font-black text-[var(--comment-color)]">//</span>
                    <p><a href="">О нас</a></p>
                    <span class=" font-black text-[var(--comment-color)]">//</span>
                    <p><a href="">Блог</a></p>
                    <span class=" font-black text-[var(--comment-color)]">//</span>
                    <p><a href="">Проекты</a></p>
                </div>
                <div>
                    <p>+993-(71)-55-66-84</p>
                </div>
            </div>
        </nav>

        <!-- Скрытый блок, который будет разворачиваться -->
        <div id="full-header"
            class="hidden fixed top-0 left-0 w-full h-screen bg-[var(--accent-color)] text-white p-[100px] flex gap-8">
            <button id="close-header" class="text-white absolute top-[70px] left-[100px]">
                <i class="text-[25px] fa-solid fa-xmark"></i></button>
            <div class="flex">
                <div class="flex ">
                    <p><a href="#">Главная</a></p>
                    <p><a href="#">Услуги</a></p>
                    <p><a href="#">О нас</a></p>
                    <p><a href="#">Блог</a></p>
                    <p><a href="#">Проекты</a></p>
                </div>

            </div>
        </div>
    </header>




    @yield('content')

    <footer>
        <div class="w-full max-w-[2000px] mx-auto bg-[var(--template-color)] lg:h-[500px] h-max mt-[250px]">

            <div class="relative text-[var(--white-color)]">
                <div class="flex lg:flex-row flex-col justify-between lg:items-center lg:absolute left-[100px] right-[100px] 2xl:mt-[-150px] xl:mt-[-125px] mt-[-100px]  2xl:h-[300px] xl:h-[250px] h-max lg:p-0 p-10 bg-[var(--accent-color)]">
                    <div class="xl:ml-[90px] lg:ml-[50px] m-auto  flex items-center">
                        <div class="w-full lg:max-w-[400px]">
                            <p class="title-2 text-center lg:text-start">Начнем сотруднечество</p>
                        </div>
                    </div>
                    <div class="p-0 lg:p-5 m-auto">
                        <div class="flex items-center max-w-[680px] m-auto py-[10px] lg:py-0">
                            <p class="title mr-[10px]">//</p>
                            <p class="base-text">Напишите нам сообщение — и наш менеджер свяжется с вами в ближайшее время. Мы поможем воплотить ваши проекты в жизнь и сделать их максимально успешными!</p>
                        </div>
                    </div>
                    <a href="">
                        <div class="flex justify-center items-center h-[50px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] 2xl:h-[300px] 2xl:w-[300px] bg-[var(--button-color)] text-[var(--white-color)]">
                            <div class="flex items-center base-text">
                                <p class="">Написать</p>
                                <i class="ml-[10px] fa-solid fa-arrow-right-long"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="flex flex-wrap justify-center text-[var(--white-color)] px-5 lg:px-[100px] 2xl:pt-[180px] xl:pt-[160px] lg:pt-[140px] pt-[30px]">
                <div class="flex-1 p-5">
                    <p class="">Навигация</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Главная</a></li>
                        <li class="list-marker"><a href="">О нас</a></li>
                        <li class="list-marker"><a href="">Блог</a></li>
                        <li class="list-marker"><a href="">Проекты</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Услуги</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Битрикс 24</a></li>
                        <li class="list-marker"><a href="">Мобильные приложения</a></li>
                        <li class="list-marker"><a href="">Веб-разработка</a></li>
                        <li class="list-marker"><a href="">Антивирусы</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Конфиндециальность</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li class="list-marker"><a href="">Политика</a></li>
                        <li class="list-marker"><a href="">Договор</a></li>
                    </ul>
                </div>
                {{-- ------------------------ --}}
                <div class="flex-1 p-5">
                    <p class="">Контакты</p>
                    <ul class="list-none pl-[10px] space-y-2.5 mt-5">
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-regular fa-envelope"></i>
                                info@arassanusga.com
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-solid fa-phone"></i>
                                +99312754480
                            </a>
                            <span>/</span>
                            <a href="">+99361648605</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="mr-[10px] fa-solid fa-location-dot"></i>
                                Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан
                            </a>
                        </li>
                        <li>
                            <div class="flex gap-[10px]">
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
