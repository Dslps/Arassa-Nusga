// Получаем элементы
const toggleButton = document.getElementById('toggle-header');
const fullHeader = document.getElementById('full-header');
const closeButton = document.getElementById('close-header');

// Открытие хедера
toggleButton.addEventListener('click', () => {
    fullHeader.classList.remove('hidden');  // Убираем скрытие
    fullHeader.classList.add('open');       // Добавляем класс для анимации
    console.log('Header opened');
});

// Закрытие хедера
closeButton.addEventListener('click', () => {
    fullHeader.classList.remove('open');    // Убираем анимацию
    setTimeout(() => {
        fullHeader.classList.add('hidden'); // Добавляем скрытие
    }, 1000);  // Задержка для анимации
    console.log('Header closed');
});
// --------------------------Слайдер на домашней странице-------------------------------------------------

const prevButton = document.querySelector('.carousel-prev');
const nextButton = document.querySelector('.carousel-next');
const carouselWrapper = document.querySelector('.carousel-wrapper');
const items = document.querySelectorAll('.carousel-item');
const dots = document.querySelectorAll('.dot');  // Индикаторы
let currentIndex = 0;
let autoSlideInterval;

// Функция для обновления слайда
const moveToSlide = (index) => {
    // Переход к следующему или предыдущему слайду
    if (index < 0) {
        currentIndex = 0;  // Не даем прокрутить влево, если мы на первом слайде
    } else if (index >= items.length) {
        currentIndex = items.length - 1;  // Останавливаем на последнем слайде
        clearInterval(autoSlideInterval);  // Останавливаем авто-прокрутку на последнем слайде
    } else {
        currentIndex = index;  // Обновление индекса слайда
    }

    // Сдвиг контейнера на соответствующий слайд
    const offset = -currentIndex * 100;  // Сдвигаем на 100% влево или вправо
    carouselWrapper.style.transform = `translateX(${offset}%)`;  // Применяем сдвиг

    // Обновляем индикаторы
    updateDots();
};

// Обновление состояния точек
const updateDots = () => {
    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.classList.add('bg-blue-500');  // Подсвечиваем активную точку с обводкой
            dot.classList.remove('bg-gray-400');
        } else {
            dot.classList.add('bg-gray-400');  // Обычные точки
            dot.classList.remove('bg-blue-500');
        }
    });
};

// Обработчики событий на кнопки
prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        moveToSlide(currentIndex - 1);  // Сдвиг на 1 слайд назад
    }
});

nextButton.addEventListener('click', () => {
    if (currentIndex < items.length - 1) {
        moveToSlide(currentIndex + 1);  // Сдвиг на 1 слайд вперед
    }
});

// Автоматическая прокрутка слайдов
const autoSlide = () => {
    if (currentIndex < items.length - 1) {
        moveToSlide(currentIndex + 1);  // Сдвиг на 1 слайд вперед
    } else {
        clearInterval(autoSlideInterval);  // Останавливаем автоматическую прокрутку на последнем слайде
    }
};

// Интервал для автоматической прокрутки
autoSlideInterval = setInterval(autoSlide, 5000);  // Перелистывание слайдов каждые 5 секунд

// Изначальная настройка точек
updateDots();

// -----------------------------карточки проектов-------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const slidesContainer = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    let cardsToShow = 3; // Изначально показываем 3 карточки

    // Функция для обновления отображения слайдов
    function updateSlide() {
        const slidesCount = slides.length; // Общее количество слайдов
        const slideWidth = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight); // Ширина одного слайда с отступом

        // Пересчитываем сдвиг
        const maxOffset = -(slidesCount * slideWidth - slidesContainer.offsetWidth);
        const offset = Math.max(currentSlide * slideWidth, maxOffset); // не допускаем выхода за пределы

        slidesContainer.style.transform = `translateX(-${offset}px)`; // применяем сдвиг

        // Отключаем кнопки навигации в зависимости от текущего слайда
        nextBtn.disabled = currentSlide >= slidesCount - cardsToShow;
        prevBtn.disabled = currentSlide === 0;
    }

    // Функция для вычисления количества карточек, которые могут быть отображены
    function calculateCardsToShow() {
        const containerWidth = slidesContainer.offsetWidth; // Ширина контейнера
        const slideWidth = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight); // Ширина одного слайда с отступом

        cardsToShow = Math.floor(containerWidth / slideWidth); // Вычисляем, сколько карточек помещается в контейнер
        currentSlide = Math.min(currentSlide, slides.length - cardsToShow); // Если слайдер на конце, не выходит за пределы
        updateSlide();
    }

    // Обработчики кнопок навигации
    prevBtn.addEventListener('click', function() {
        if (currentSlide > 0) {
            currentSlide--;
        }
        updateSlide();
    });

    nextBtn.addEventListener('click', function() {
        const slidesCount = slides.length;
        // Прокручиваем к последнему слайду, если текущий слайд + количество видимых карточек не превышает общее количество слайдов
        if (currentSlide < slidesCount - cardsToShow) {
            currentSlide++;
        } else {
            // Если мы находимся на последнем слайде, продолжаем прокрутку
            currentSlide = slidesCount - cardsToShow;
        }
        updateSlide();
    });

    // Пересчитываем количество карточек при изменении размера окна
    window.addEventListener('resize', calculateCardsToShow);

    calculateCardsToShow(); // Инициализация слайдера
    updateSlide(); // Инициализация слайдера
});














