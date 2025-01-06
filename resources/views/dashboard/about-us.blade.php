@extends('layouts.dashboard')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p class="base-text mb-10">О нас</p>

            {{-- Блок для уже сохранённых изображений из БД --}}
            @if(!empty($aboutUs->photos))
                <p class="text-sm mb-2">Текущие фото:</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(explode(',', $aboutUs->photos) as $photo)
                    <img 
                    src="{{ asset('storage/' . $photo) }}" 
                    alt="photo" 
                    class="w-32 h-auto rounded border"
                  />
                  
                    @endforeach
                </div>
            @endif

            <div class="mb-6">
                <label for="photos" class="block text-gray-700 font-medium mb-2">
                    Загрузить фотографии
                </label>
                <input 
                    type="file" 
                    id="photos" 
                    name="photos[]" 
                    accept="image/*" 
                    multiple
                    class="border-2 border-dashed border-gray-300 p-4 w-full rounded"
                >

                {{-- Контейнер для предпросмотра новых файлов --}}
                <div id="preview-container" class="flex flex-wrap gap-2 mt-4"></div>
            </div>

            <!-- Титульный текст (3 языка) -->
            <div class="mb-6">
                <h3 class="text-md font-semibold mb-3">Титульный текст:</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Русский -->
                    <div>
                        <label for="title_ru" class="block text-gray-700 font-medium mb-1">
                            Титульный текст (RU):
                        </label>
                        <input 
                            type="text" 
                            id="title_ru" 
                            name="title_ru"
                            value="{{ old('title_ru', $aboutUs->title_ru) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="title_en" class="block text-gray-700 font-medium mb-1">
                            Title (EN):
                        </label>
                        <input 
                            type="text" 
                            id="title_en" 
                            name="title_en"
                            value="{{ old('title_en', $aboutUs->title_en) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                            Title (TM):
                        </label>
                        <input 
                            type="text" 
                            id="title_tm" 
                            name="title_tm"
                            value="{{ old('title_tm', $aboutUs->title_tm) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
                    </div>
                </div>
            </div>

            <!-- Описание (3 языка) -->
            <div class="mb-6">
                <h3 class="text-md font-semibold mb-3">Описание:</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Русский -->
                    <div>
                        <label for="description_ru" class="block text-gray-700 font-medium mb-1">
                            Описание (RU):
                        </label>
                        <textarea 
                            id="description_ru" 
                            name="description_ru" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_ru', $aboutUs->description_ru) }}</textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="description_en" class="block text-gray-700 font-medium mb-1">
                            Description (EN):
                        </label>
                        <textarea 
                            id="description_en" 
                            name="description_en" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_en', $aboutUs->description_en) }}</textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                            Description (TM):
                        </label>
                        <textarea 
                            id="description_tm" 
                            name="description_tm" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_tm', $aboutUs->description_tm) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Дополнительная информация (3 языка) -->
            <div class="mb-6">
                <h3 class="text-md font-semibold mb-3">Дополнительная информация:</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Русский -->
                    <div>
                        <label for="additional_ru" class="block text-gray-700 font-medium mb-1">
                            Доп. информация (RU):
                        </label>
                        <textarea 
                            id="additional_ru" 
                            name="additional_ru" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_ru', $aboutUs->additional_ru) }}</textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="additional_en" class="block text-gray-700 font-medium mb-1">
                            Additional info (EN):
                        </label>
                        <textarea 
                            id="additional_en" 
                            name="additional_en" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_en', $aboutUs->additional_en) }}</textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="additional_tm" class="block text-gray-700 font-medium mb-1">
                            Additional info (TM):
                        </label>
                        <textarea 
                            id="additional_tm" 
                            name="additional_tm" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_tm', $aboutUs->additional_tm) }}</textarea>
                    </div>
                </div>
            </div>

            <button 
                type="submit" 
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
            >
                Сохранить
            </button>
        </form>
    </div>
</div>
{{-- ------------------------------------------------------ --}}
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <p class="text-lg font-semibold mb-4">Принципы работы:</p>

        <!-- Таблица -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-400"> <!-- Исправлено bg-gray-40 на bg-gray-400 -->
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Изображение</th>
                    <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                    <th class="border border-gray-300 px-4 py-2">Описание</th>
                    <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                    <th class="border border-gray-300 px-4 py-2">Удалить</th>
                </tr>
            </thead>
        </table>

        <!-- Кнопка для добавления -->
        <div class="flex justify-center mt-4">
            <button id="addRowButton"
                class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                + Добавить
            </button>
        </div>

        <!-- Модальное окно для добавления -->
        <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                <h2 id="addModalTitle" class="text-xl mb-4">Добавить запись</h2>
                <form id="modalForm" action="#" method="POST" enctype="multipart/form-data">
                    <!-- Замените action="#" на реальный URL для обработки формы -->
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" id="modalId" name="id">

                    <!-- Поля Названия (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="title_ru" class="block mb-1 font-semibold">Название (RU):</label>
                            <input type="text" id="title_ru" name="title_ru" placeholder="Введите название (RU)"
                                class="border p-2 w-full" maxlength="30" required>
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="titleRuCount">30 символов осталось</p>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="title_en" class="block mb-1 font-semibold">Название (EN):</label>
                            <input type="text" id="title_en" name="title_en" placeholder="Введите название (EN)"
                                class="border p-2 w-full" maxlength="30">
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="titleEnCount">30 символов осталось</p>
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="title_tm" class="block mb-1 font-semibold">Название (TM):</label>
                            <input type="text" id="title_tm" name="title_tm" placeholder="Введите название (TM)"
                                class="border p-2 w-full" maxlength="30">
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="titleTmCount">30 символов осталось</p>
                        </div>
                    </div>

                    <!-- Поля Описание (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="description_ru" class="block mb-1 font-semibold">Описание (RU):</label>
                            <textarea id="description_ru" name="description_ru" placeholder="Введите описание (RU)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="descriptionRuCount">200 символов осталось</p>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="description_en" class="block mb-1 font-semibold">Описание (EN):</label>
                            <textarea id="description_en" name="description_en" placeholder="Введите описание (EN)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="descriptionEnCount">200 символов осталось</p>
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="description_tm" class="block mb-1 font-semibold">Описание (TM):</label>
                            <textarea id="description_tm" name="description_tm" placeholder="Введите описание (TM)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="descriptionTmCount">200 символов осталось</p>
                        </div>
                    </div>

                    <!-- Поле Изображение -->
                    <div class="mb-4">
                        <label for="image" class="block mb-1 font-semibold">Изображение:</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="border p-2 w-full">
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">
                            Отмена
                        </button>
                        <button type="submit" id="modalSubmitButton"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Модальное окно для редактирования -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                <h2 id="editModalTitle" class="text-xl mb-4">Редактировать запись</h2>
                <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                    <!-- Замените action="#" на реальный URL для обработки формы редактирования -->
                    <input type="hidden" name="_method" id="editFormMethod" value="PUT">
                    <input type="hidden" id="editModalId" name="id">

                    <!-- Поля Названия (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="edit-title_ru" class="block mb-1 font-semibold">Название (RU):</label>
                            <input type="text" id="edit-title_ru" name="title_ru" placeholder="Введите название (RU)"
                                class="border p-2 w-full" maxlength="30" required>
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editTitleRuCount">30 символов осталось</p>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="edit-title_en" class="block mb-1 font-semibold">Название (EN):</label>
                            <input type="text" id="edit-title_en" name="title_en" placeholder="Введите название (EN)"
                                class="border p-2 w-full" maxlength="30">
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editTitleEnCount">30 символов осталось</p>
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="edit-title_tm" class="block mb-1 font-semibold">Название (TM):</label>
                            <input type="text" id="edit-title_tm" name="title_tm" placeholder="Введите название (TM)"
                                class="border p-2 w-full" maxlength="30">
                            <p class="text-xs text-gray-500 mt-1">Максимум 30 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editTitleTmCount">30 символов осталось</p>
                        </div>
                    </div>

                    <!-- Поля Описание (горизонтально) -->
                    <div class="flex gap-4 mb-4">
                        <!-- RU -->
                        <div class="w-1/3">
                            <label for="edit-description_ru" class="block mb-1 font-semibold">Описание (RU):</label>
                            <textarea id="edit-description_ru" name="description_ru" placeholder="Введите описание (RU)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editDescriptionRuCount">200 символов осталось</p>
                        </div>
                        <!-- EN -->
                        <div class="w-1/3">
                            <label for="edit-description_en" class="block mb-1 font-semibold">Описание (EN):</label>
                            <textarea id="edit-description_en" name="description_en" placeholder="Введите описание (EN)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editDescriptionEnCount">200 символов осталось</p>
                        </div>
                        <!-- TM -->
                        <div class="w-1/3">
                            <label for="edit-description_tm" class="block mb-1 font-semibold">Описание (TM):</label>
                            <textarea id="edit-description_tm" name="description_tm" placeholder="Введите описание (TM)"
                                class="border p-2 w-full" rows="3"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Максимум 200 символов</p>
                            <p class="text-xs text-gray-500 mt-1" id="editDescriptionTmCount">200 символов осталось</p>
                        </div>
                    </div>

                    <!-- Поле Изображение -->
                    <div class="mb-4">
                        <label for="edit-image" class="block mb-1 font-semibold">Изображение:</label>
                        <input type="file" id="edit-image" name="image" accept="image/*"
                            class="border p-2 w-full">
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">
                            Отмена
                        </button>
                        <button type="submit" id="editModalSubmitButton"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Пример JavaScript функций для управления модальными окнами и счетчиками символов -->
<script>
    // Функция для открытия модального окна добавления
    function openAddModal() {
        document.getElementById('modalForm').reset();
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addModalTitle').innerText = 'Добавить запись';
        document.getElementById('formMethod').value = 'POST';
    }

    // Функция для закрытия модального окна добавления
    function closeModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    // Привязка события к кнопке добавления
    document.getElementById('addRowButton').addEventListener('click', openAddModal);

    // Функция для открытия модального окна редактирования
    function openEditModal(id, title_ru, title_en, title_tm, description_ru, description_en, description_tm) {
        document.getElementById('editForm').reset();
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModalTitle').innerText = 'Редактировать запись';
        document.getElementById('editFormMethod').value = 'PUT';
        document.getElementById('editModalId').value = id;

        // Заполнение полей формы редактирования
        document.getElementById('edit-title_ru').value = title_ru;
        document.getElementById('edit-title_en').value = title_en;
        document.getElementById('edit-title_tm').value = title_tm;
        document.getElementById('edit-description_ru').value = description_ru;
        document.getElementById('edit-description_en').value = description_en;
        document.getElementById('edit-description_tm').value = description_tm;
    }

    // Функция для закрытия модального окна редактирования
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Обработка отправки формы добавления (пример)
    document.getElementById('modalForm').addEventListener('submit', function (event) {
        event.preventDefault();
        // Здесь добавьте логику для отправки данных на сервер (например, через AJAX)
        alert('Новая запись добавлена!');
        closeModal();
        // Можно также добавить новую строку в таблицу динамически
    });

    // Обработка отправки формы редактирования (пример)
    document.getElementById('editForm').addEventListener('submit', function (event) {
        event.preventDefault();
        // Здесь добавьте логику для отправки изменений на сервер (например, через AJAX)
        alert('Изменения сохранены!');
        closeEditModal();
        // Можно также обновить данные в таблице динамически
    });

    // Функция для подсчёта оставшихся символов
    function setupCharacterCount(inputId, countId, max) {
        const input = document.getElementById(inputId);
        const count = document.getElementById(countId);

        if (input && count) {
            // Инициализация начального значения
            const remaining = max - input.value.length;
            count.innerText = `${remaining} символов осталось`;

            input.addEventListener('input', () => {
                const remaining = max - input.value.length;
                count.innerText = `${remaining} символов осталось`;
            });
        }
    }

    // Настройка счетчиков символов для формы добавления
    setupCharacterCount('title_ru', 'titleRuCount', 30);
    setupCharacterCount('title_en', 'titleEnCount', 30);
    setupCharacterCount('title_tm', 'titleTmCount', 30);
    setupCharacterCount('description_ru', 'descriptionRuCount', 200);
    setupCharacterCount('description_en', 'descriptionEnCount', 200);
    setupCharacterCount('description_tm', 'descriptionTmCount', 200);

    // Настройка счетчиков символов для формы редактирования
    setupCharacterCount('edit-title_ru', 'editTitleRuCount', 30);
    setupCharacterCount('edit-title_en', 'editTitleEnCount', 30);
    setupCharacterCount('edit-title_tm', 'editTitleTmCount', 30);
    setupCharacterCount('edit-description_ru', 'editDescriptionRuCount', 200);
    setupCharacterCount('edit-description_en', 'editDescriptionEnCount', 200);
    setupCharacterCount('edit-description_tm', 'editDescriptionTmCount', 200);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photosInput = document.getElementById('photos');
        const previewContainer = document.getElementById('preview-container');

        if (photosInput && previewContainer) {
            photosInput.addEventListener('change', function () {
                // Очищаем старые превью
                previewContainer.innerHTML = '';

                // Превращаем FileList в массив, чтобы перебрать
                Array.from(photosInput.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        // Создаём элемент img и подставляем превью
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-32', 'h-auto', 'rounded', 'border', 'object-cover');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }
    });
</script>
@endsection
