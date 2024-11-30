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
    <header class="w-full h-[140px] z-10">
        <nav class="w-full flex h-[140px]">
            <div class="w-[800px] bg-[var(--accent-color)] h-full flex items-center pr-[50px]">
                <div>
                    <!-- Кнопка для открытия хедера -->
                    <button id="toggle-header" class="text-white"><i class="fa-solid fa-bars"></i></button>
                </div>
                <img class="w-[200px] h-[50px]" src="{{asset('img/logo.png')}}" alt="">
                <div class="flex text-[var(--white-color)] gap-[10px] ml-auto">
                    <p><a href="#">Ru</a></p>
                    <span>/</span>
                    <p><a href="#">Tm</a></p>
                    <span>/</span>
                    <p><a href="#">Eng</a></p>
                </div>
            </div>
            <div class="flex items-center justify-between px-[100px] w-[1120px]">
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
        <div id="full-header" class="hidden fixed top-0 left-0 w-full h-screen bg-[var(--accent-color)] text-white p-[100px] flex gap-8">
            <button id="close-header" class="text-white absolute top-4 right-4"><i class="fa-solid fa-xmark"></i></button>
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

    <script>
        
    </script>
</body>
</html>