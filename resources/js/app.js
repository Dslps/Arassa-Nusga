

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
document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const carouselWrapper = document.querySelector('.carousel-wrapper');
    const items = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    let autoSlideInterval;

    // Функция для обновления слайда
    const moveToSlide = (index) => {
        if (index < 0) {
            currentIndex = 0;  // Не даем прокрутить влево, если мы на первом слайде
        } else if (index >= items.length) {
            currentIndex = items.length - 1;  // Останавливаем на последнем слайде
            clearInterval(autoSlideInterval);  // Останавливаем авто-прокрутку на последнем слайде
        } else {
            currentIndex = index;  
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
                dot.classList.add('bg-blue-500');  // Подсвечиваем активную точку
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
            currentIndex = 0;  // Если достигнут последний слайд, возвращаем на первый
            moveToSlide(currentIndex);
        }
    };

    // Интервал для автоматической прокрутки
    autoSlideInterval = setInterval(autoSlide, 5000);  // Перелистывание слайдов каждые 5 секунд

    // Изначальная настройка точек
    updateDots();
});

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
// ------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.getElementById('carousel-prev');
    const nextButton = document.getElementById('carousel-next');
    const carouselContent = document.getElementById('carousel-content');
    const items = Array.from(carouselContent.children); // Массив блоков
    let itemWidth = items[0].offsetWidth; // Ширина одного элемента (включая margin, если нужно)
    let visibleItems = 1; // Количество видимых элементов, будет рассчитано динамически

    let currentIndex = 0;

    // Функция для обновления позиции слайдера
    function updateCarouselPosition() {
        const containerWidth = carouselContent.parentElement.offsetWidth; // Ширина контейнера
        itemWidth = items[0].offsetWidth; // Пересчёт ширины элемента
        visibleItems = Math.floor(containerWidth / itemWidth); // Количество видимых элементов

        const maxIndex = items.length - visibleItems; // Максимально возможный индекс
        currentIndex = Math.min(currentIndex, maxIndex); // Останавливаем на последнем реальном индексе

        const offset = currentIndex * itemWidth; // Сдвиг в пикселях
        carouselContent.style.transform = `translateX(-${offset}px)`; // Применяем сдвиг
    }

    // Обновление состояния кнопок
    function updateButtons() {
        prevButton.disabled = currentIndex <= 0; // Блокируем кнопку "Previous" на первом элементе
        nextButton.disabled = currentIndex >= items.length - visibleItems; // Блокируем кнопку "Next" на последнем видимом наборе
    }

    // Обработчик для кнопки "Next"
    nextButton.addEventListener('click', function () {
        const maxIndex = items.length - visibleItems; // Максимально возможный индекс
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarouselPosition();
            updateButtons();
        }
    });

    // Обработчик для кнопки "Previous"
    prevButton.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarouselPosition();
            updateButtons();
        }
    });

    // Пересчитываем ширину и количество видимых элементов при изменении размера окна
    window.addEventListener('resize', function () {
        updateCarouselPosition();
        updateButtons();
    });

    // Инициализация слайдера
    updateCarouselPosition();
    updateButtons();
});
// --------------------------------------Для сертификатов------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const customPrevButton = document.getElementById('carousel-prev-certificates');
    const customNextButton = document.getElementById('carousel-next-certificates');
    const customCarouselContent = document.getElementById('carousel-content-certificates');
    const customItems = Array.from(customCarouselContent.children);
    
    let customItemWidth = customItems[0].offsetWidth; // Ширина одного элемента
    let customGap = parseInt(getComputedStyle(customCarouselContent).gap) || 0; // Расстояние между элементами
    let customVisibleItems = 1; // Количество видимых элементов, будет пересчитано динамически
    let customCurrentIndex = 0;

    // Функция для обновления позиции слайдера
    function updateCustomCarouselPosition() {
        const customContainerWidth = customCarouselContent.parentElement.offsetWidth; // Ширина контейнера
        customItemWidth = customItems[0].offsetWidth + customGap; // Ширина элемента + расстояние
        customVisibleItems = Math.floor(customContainerWidth / customItemWidth); // Количество видимых элементов

        const customMaxIndex = customItems.length - customVisibleItems; // Максимально возможный индекс
        customCurrentIndex = Math.min(customCurrentIndex, customMaxIndex); // Убедимся, что индекс в пределах допустимого

        const customOffset = customCurrentIndex * customItemWidth; // Сдвиг в пикселях
        customCarouselContent.style.transform = `translateX(-${customOffset}px)`; // Применяем сдвиг
    }

    // Обновление состояния кнопок
    function updateCustomButtons() {
        customPrevButton.disabled = customCurrentIndex <= 0; // Блокируем кнопку "Previous" на первом элементе
        customNextButton.disabled = customCurrentIndex >= customItems.length - customVisibleItems; // Блокируем кнопку "Next" на последнем видимом наборе
    }

    // Обработчик для кнопки "Next"
    customNextButton.addEventListener('click', function () {
        const customMaxIndex = customItems.length - customVisibleItems; // Максимально возможный индекс
        if (customCurrentIndex < customMaxIndex) {
            customCurrentIndex++;
            updateCustomCarouselPosition();
            updateCustomButtons();
        }
    });

    // Обработчик для кнопки "Previous"
    customPrevButton.addEventListener('click', function () {
        if (customCurrentIndex > 0) {
            customCurrentIndex--;
            updateCustomCarouselPosition();
            updateCustomButtons();
        }
    });

    // Пересчитываем ширину и количество видимых элементов при изменении размера окна
    window.addEventListener('resize', function () {
        updateCustomCarouselPosition();
        updateCustomButtons();
    });

    // Инициализация слайдера
    updateCustomCarouselPosition();
    updateCustomButtons();
});
// ------------------------------открытие карточек для страницы проекты----------------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('loadMoreButton');
        const projectItems = document.querySelectorAll('.project-item');
        let displayedItems = 6; // изначально показываем 9 элементов

        // Скрыть элементы, начиная с 10-го
        for (let i = displayedItems; i < projectItems.length; i++) {
            projectItems[i].classList.add('hidden');
        }

        loadMoreButton.addEventListener('click', function() {
            // Показываем следующие 3 элемента
            for (let i = displayedItems; i < displayedItems + 3 && i < projectItems.length; i++) {
                projectItems[i].classList.remove('hidden');
            }

            // Обновляем количество отображаемых элементов
            displayedItems += 3;

            // Если все элементы показаны, скрываем кнопку
            if (displayedItems >= projectItems.length) {
                loadMoreButton.classList.add('hidden');
            }

            // Обновляем текст кнопки
            if (displayedItems < projectItems.length) {
                loadMoreButton.textContent = `Показать еще`;
            }
        });
    });
// ------------------------------открытие элементов на странице блога--------------------------------------------------
const items = document.querySelectorAll('.item');
const loadMoreBtn = document.getElementById('loadMoreBtn');

let visibleCount = 4; // Количество видимых элементов

// Скрываем все элементы, кроме первых 4
function updateItemsDisplay() {
    items.forEach((item, index) => {
        if (index < visibleCount) {
            item.style.display = 'flex'; // Показываем элемент
        } else {
            item.style.display = 'none'; // Скрываем элемент
        }
    });
}

// Обработчик клика по кнопке
loadMoreBtn.addEventListener('click', () => {
    visibleCount += 4; // Увеличиваем количество видимых элементов на 4
    updateItemsDisplay(); // Обновляем отображение элементов

    // Если все элементы показаны, скрываем кнопку
    if (visibleCount >= items.length) {
        loadMoreBtn.style.display = 'none';
    }
});

// Инициализируем отображение элементов
updateItemsDisplay();














