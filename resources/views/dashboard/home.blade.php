@extends('layouts.dashboard')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <p class="base-text mb-10">Домашняя страница</p>
        <p class="text-lg font-semibold mb-4">Слайдер:</p>

        <!-- Таблица -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-40">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Изображение</th>
                    <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                    <th class="border border-gray-300 px-4 py-2">Описание</th>
                    <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                    <th class="border border-gray-300 px-4 py-2">Удалить</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($slides as $index => $slide)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <img src="{{ asset('storage/' . $slide->image_path) }}" alt="Изображение"
                                class="w-16 h-16 object-cover mx-auto">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $slide->title_ru }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $slide->description_ru }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button
                                onclick="openEditModal({{ $slide->id }}, '{{ $slide->title_ru }}', '{{ $slide->title_en }}', '{{ $slide->title_tm }}', '{{ $slide->description_ru }}', '{{ $slide->description_en }}', '{{ $slide->description_tm }}')"
                                class="text-orange-500">
                                <i class="text-[20px] fa-solid fa-pencil"></i>
                            </button>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('home-dash.destroy', $slide->id) }}" method="POST"
                                onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    <i class="text-[20px] fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Кнопка для добавления -->
        <div class="flex justify-center mt-4">
            <button id="addRowButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                + Добавить слайдер
            </button>
        </div>

        <!-- Модальное окно -->
        <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                <h2 id="modalTitle" class="text-xl mb-4">Добавить запись</h2>
                <form id="modalForm" action="{{ route('home-dash.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" id="modalId" name="id">
        
                    <!-- Поля Названия (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="title_ru" class="block mb-1 font-semibold">Название (RU):</label>
                            <input type="text" id="title_ru" name="title_ru" placeholder="Введите название (RU)"
                                   class="border p-2 w-full" maxlength="30" required>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="title_en" class="block mb-1 font-semibold">Название (EN):</label>
                            <input type="text" id="title_en" name="title_en" placeholder="Введите название (EN)"
                                   class="border p-2 w-full" maxlength="30">
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="title_tm" class="block mb-1 font-semibold">Название (TM):</label>
                            <input type="text" id="title_tm" name="title_tm" placeholder="Введите название (TM)"
                                   class="border p-2 w-full" maxlength="30">
                        </div>
                    </div>
        
                    <!-- Поля Описание (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="description_ru" class="block mb-1 font-semibold">Описание (RU):</label>
                            <textarea id="description_ru" name="description_ru" placeholder="Введите описание (RU)"
                                      class="border p-2 w-full" rows="3"></textarea>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="description_en" class="block mb-1 font-semibold">Описание (EN):</label>
                            <textarea id="description_en" name="description_en" placeholder="Введите описание (EN)"
                                      class="border p-2 w-full" rows="3"></textarea>
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="description_tm" class="block mb-1 font-semibold">Описание (TM):</label>
                            <textarea id="description_tm" name="description_tm" placeholder="Введите описание (TM)"
                                      class="border p-2 w-full" rows="3"></textarea>
                        </div>
                    </div>
        
                    <!-- Поле Изображение -->
                    <div class="mb-4">
                        <label for="image" class="block mb-1 font-semibold">Изображение:</label>
                        <input type="file" id="image" name="image" accept="image/*" class="border p-2 w-full">
                    </div>
        
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                            Отмена
                        </button>
                        <button type="submit" id="modalSubmitButton" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

    {{-- ------------------------------------Таблица с услугами--------------------------------------------------- --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Наши услуги:</p>
    
            <!-- Таблица с услугами -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-40">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Категории</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody id="servicesTableBody">
                    @foreach ($services as $index => $service)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{-- Предполагается, что в БД есть поля title_ru, title_en, title_tm --}}
                                {{ $service->title_ru }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{-- Если категории тоже мультиязычные, используйте $service->categories_ru и т.п. --}}
                                {{ implode(', ', $service->categories ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button
                                    onclick="ServiceModal.open(
                                        'edit', 
                                        {{ $service->id }}, 
                                        '{{ $service->title_ru }}', 
                                        '{{ $service->title_en }}', 
                                        '{{ $service->title_tm }}',
                                        {{ json_encode($service->categories ?? []) }}
                                    )"
                                    class="text-orange-500"
                                >
                                    <i class="text-[20px] fa-solid fa-pencil"></i>
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                      onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <i class="text-[20px] fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <!-- Кнопка добавления записи -->
            <div class="flex justify-center mt-4">
                <button onclick="ServiceModal.open('add')"
                        class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                    + Добавить запись
                </button>
            </div>
    
            <!-- Модальное окно -->
            <div id="serviceModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <!-- Увеличиваем ширину и делаем центрирование по аналогии со слайдером -->
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 id="serviceModalTitle" class="text-xl mb-4"></h2>
                    <form id="serviceModalForm" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="serviceFormMethod" value="POST">
                        <input type="hidden" id="serviceModalId" name="id">
    
                        <!-- Поля Названия (горизонтально) -->
                        <div class="flex gap-4 mb-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label for="serviceTitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="serviceTitleRu" name="title_ru" placeholder="Введите название (RU)"
                                       class="border p-2 w-full" maxlength="40" required>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label for="serviceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="serviceTitleEn" name="title_en" placeholder="Введите название (EN)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label for="serviceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="serviceTitleTm" name="title_tm" placeholder="Введите название (TM)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                        </div>
    
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                        </div>
    
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                        </div>
    
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                       class="border p-2 w-full" maxlength="40">
                            </div>
                        </div>
    
                        <!-- Кнопки -->
                        <div class="flex justify-end">
                            <button type="button" onclick="ServiceModal.close()"
                                    class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Отмена
                            </button>
                            <button type="submit" id="serviceModalSubmitButton"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

{{---------------------------------------------------- блок о нас --------------------------------------------------  --}}
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <form method="POST" action="{{ isset($aboutUs->id) ? route('about-us.update', $aboutUs->id) : route('about-us.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($aboutUs->id))
                @method('PUT')
            @endif
            
            <p class="text-lg font-semibold mb-4">О нас:</p>

            <!-- Поле загрузки изображения -->
            <div class="mb-4">
                <label for="image-prev" class="block text-gray-700 font-medium mb-2">Загрузить изображение</label>
                <input type="file" id="image-prev" name="image" accept="image/*"
                       class="border-2 border-dashed border-gray-300 p-4 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                       @if(isset($aboutUs->image_path))
                       <img src="{{ asset('storage/' . $aboutUs->image_path) }}" alt="Загруженное изображение" class="mt-2 w-32">
                   @endif
                   
            </div>

            <!-- Поля ввода текста -->
            <div class="mb-4">
                <label for="title-name" class="block text-gray-700 font-medium mb-2">Название:</label>
                <input type="text" id="title-name" name="title" value="{{ $aboutUs->title ?? '' }}"
                       class="border-2 border-dashed border-gray-300 p-4 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="about-us" class="block text-gray-700 font-medium mb-2">Описание:</label>
                <textarea id="about-us" name="description" cols="30" rows="10"
                          class="border-2 border-dashed border-gray-300 p-4 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ $aboutUs->description ?? '' }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Сохранить</button>
        </form>
    </div>
</div>



    {{-- Модульное окно на блок с редактирование слайдера --}}
    <script>
       document.addEventListener('DOMContentLoaded', () => {

function openModal(isEdit = false, id = null, titleRu = '', titleEn = '', titleTm = '', 
                   descriptionRu = '', descriptionEn = '', descriptionTm = '', imageUrl = '') {
    const modalTitle = document.getElementById('modalTitle');
    const modalForm = document.getElementById('modalForm');
    const formMethod = document.getElementById('formMethod');

    // Поля названий
    const titleRuInput = document.getElementById('title_ru');
    const titleEnInput = document.getElementById('title_en');
    const titleTmInput = document.getElementById('title_tm');

    // Поля описаний
    const descriptionRuInput = document.getElementById('description_ru');
    const descriptionEnInput = document.getElementById('description_en');
    const descriptionTmInput = document.getElementById('description_tm');

    // Поле изображения
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview'); // Добавьте это, если нужен предпросмотр изображения

    // Кнопка отправки
    const modalSubmitButton = document.getElementById('modalSubmitButton');

    if (isEdit) {
        modalTitle.textContent = 'Редактировать запись';
        modalForm.action = `/home-dashes/${id}`;
        formMethod.value = 'PUT';

        titleRuInput.value = titleRu;
        titleEnInput.value = titleEn;
        titleTmInput.value = titleTm;

        descriptionRuInput.value = descriptionRu;
        descriptionEnInput.value = descriptionEn;
        descriptionTmInput.value = descriptionTm;

        modalSubmitButton.textContent = 'Обновить';

        if (imageUrl) {
            // Если есть URL изображения, можно добавить предпросмотр
            if (imagePreview) {
                imagePreview.src = imageUrl;
                imagePreview.classList.remove('hidden');
            }
        } else if (imagePreview) {
            imagePreview.classList.add('hidden');
        }
    } else {
        modalTitle.textContent = 'Добавить запись';
        modalForm.action = `{{ route('home-dash.store') }}`;
        formMethod.value = 'POST';

        titleRuInput.value = '';
        titleEnInput.value = '';
        titleTmInput.value = '';

        descriptionRuInput.value = '';
        descriptionEnInput.value = '';
        descriptionTmInput.value = '';

        modalSubmitButton.textContent = 'Сохранить';

        if (imagePreview) {
            imagePreview.classList.add('hidden');
        }
    }

    // Сброс изображения
    imageInput.value = '';

    // Показываем модальное окно
    document.getElementById('addModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('addModal').classList.add('hidden');
}

// Привязка событий
document.getElementById('addRowButton').addEventListener('click', () => openModal());
window.openEditModal = (id, titleRu, titleEn, titleTm, descriptionRu, descriptionEn, descriptionTm, imageUrl) =>
    openModal(true, id, titleRu, titleEn, titleTm, descriptionRu, descriptionEn, descriptionTm, imageUrl);
window.closeModal = closeModal;

// Ограничение символов для полей
function setupCharacterLimit(inputId, maxLength) {
    const inputField = document.getElementById(inputId);
    inputField.addEventListener('input', () => {
        if (inputField.value.length > maxLength) {
            inputField.value = inputField.value.substring(0, maxLength);
        }
    });
}

// Настройка ограничений для всех текстовых полей
setupCharacterLimit('title_ru', 30);
setupCharacterLimit('title_en', 30);
setupCharacterLimit('title_tm', 30);

setupCharacterLimit('description_ru', 200);
setupCharacterLimit('description_en', 200);
setupCharacterLimit('description_tm', 200);

// Проверка размера загружаемых изображений
const imageInput = document.getElementById('image');
imageInput.addEventListener('change', function() {
    const file = this.files[0];
    const maxSize = 5 * 1024 * 1024; // 5 MB
    if (file && file.size > maxSize) {
        alert('Размер файла не должен превышать 5 MB!');
        this.value = ''; // Сбрасываем поле
    }
});
});

    </script>
    




    {{-- модульное окно для услуг --}}
    <script>
        const ServiceModal = {
            open(mode, id = null, titleRu = '', titleEn = '', titleTm = '', categories = { ru: [], en: [], tm: [] }) {
                console.log('Opening Service Modal');
    
                // Селекторы основных элементов
                const modal = document.getElementById('serviceModal');
                const modalTitle = document.getElementById('serviceModalTitle');
                const form = document.getElementById('serviceModalForm');
                const methodInput = document.getElementById('serviceFormMethod');
                const idInput = document.getElementById('serviceModalId');
    
                // Названия на разных языках
                const titleRuInput = document.getElementById('serviceTitleRu');
                const titleEnInput = document.getElementById('serviceTitleEn');
                const titleTmInput = document.getElementById('serviceTitleTm');
    
                // Категории
                // Для каждой языковой группы у нас несколько полей (по 3 в вашем шаблоне).
                const categoriesRuInputs = document.querySelectorAll('input[name="categories_ru[]"]');
                const categoriesEnInputs = document.querySelectorAll('input[name="categories_en[]"]');
                const categoriesTmInputs = document.querySelectorAll('input[name="categories_tm[]"]');
    
                // Логика открытия в режиме "edit"
                if (mode === 'edit') {
                    modalTitle.textContent = 'Редактировать запись';
                    form.action = `/services/${id}`;  // Отправляем на /services/{id}
                    methodInput.value = 'PUT';
                    idInput.value = id;
    
                    // Заполняем поля названий
                    titleRuInput.value = titleRu;
                    titleEnInput.value = titleEn;
                    titleTmInput.value = titleTm;
    
                    // Если мы получили объект { ru: [...], en: [...], tm: [...] }
                    // Заполняем соответствующие поля
                    categories.ru.forEach((catValue, index) => {
                        if (categoriesRuInputs[index]) {
                            categoriesRuInputs[index].value = catValue;
                        }
                    });
                    categories.en.forEach((catValue, index) => {
                        if (categoriesEnInputs[index]) {
                            categoriesEnInputs[index].value = catValue;
                        }
                    });
                    categories.tm.forEach((catValue, index) => {
                        if (categoriesTmInputs[index]) {
                            categoriesTmInputs[index].value = catValue;
                        }
                    });
    
                } else {
                    // Режим "add"
                    modalTitle.textContent = 'Добавить запись';
                    form.action = `{{ route('services.store') }}`;  // Или просто /services
                    methodInput.value = 'POST';
                    idInput.value = '';
    
                    // Очищаем поля
                    titleRuInput.value = '';
                    titleEnInput.value = '';
                    titleTmInput.value = '';
    
                    // Сбрасываем все категории
                    categoriesRuInputs.forEach(input => input.value = '');
                    categoriesEnInputs.forEach(input => input.value = '');
                    categoriesTmInputs.forEach(input => input.value = '');
                }
    
                // Показываем модальное окно
                modal.classList.remove('hidden');
            },
    
            close() {
                console.log('Closing Service Modal');
                document.getElementById('serviceModal').classList.add('hidden');
            }
        };
    
    
        // Если нужно добавить счётчик символов (CharacterCounter), адаптируем под новые поля
        const CharacterCounter = {
            update(input, countElement, maxLength, language = 'ru') {
                // Переводы при желании
                const messages = {
                    en: "Remaining characters:",
                    tm: "Galan nyşanlar:",
                    ru: "Осталось символов:",
                };
                const remaining = maxLength - input.value.length;
                countElement.textContent = `${messages[language] || messages.ru} ${remaining}`;
            },
    
            // Пример инициализации для всех полей (если нужно)
            init() {
                const maxLength = 40;
    
                // Названия
                const titleRuInput = document.getElementById('serviceTitleRu');
                const titleEnInput = document.getElementById('serviceTitleEn');
                const titleTmInput = document.getElementById('serviceTitleTm');
    
                const titleCountRu = document.getElementById('serviceTitleCountRu');
                const titleCountEn = document.getElementById('serviceTitleCountEn');
                const titleCountTm = document.getElementById('serviceTitleCountTm');
    
                // Вешаем события (пример для русского)
                if (titleRuInput && titleCountRu) {
                    titleRuInput.addEventListener('input', () => {
                        this.update(titleRuInput, titleCountRu, maxLength, 'ru');
                    });
                }
    
                if (titleEnInput && titleCountEn) {
                    titleEnInput.addEventListener('input', () => {
                        this.update(titleEnInput, titleCountEn, maxLength, 'en');
                    });
                }
    
                if (titleTmInput && titleCountTm) {
                    titleTmInput.addEventListener('input', () => {
                        this.update(titleTmInput, titleCountTm, maxLength, 'tm');
                    });
                }
    
                // Аналогично для категорий, если нужен счётчик
                // ...
            }
        };
    
    </script>
    
@endsection
