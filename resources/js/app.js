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
