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
                    <form id="modalForm" action="{{ route('home-dash.store') }}" method="POST"
                        enctype="multipart/form-data">
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
                                <p class="text-xs text-gray-500 mt-1" id="titleRuCount">30 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label for="title_en" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="title_en" name="title_en" placeholder="Введите название (EN)"
                                    class="border p-2 w-full" maxlength="30">
                                <p class="text-xs text-gray-500 mt-1" id="titleEnCount">30 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label for="title_tm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="title_tm" name="title_tm" placeholder="Введите название (TM)"
                                    class="border p-2 w-full" maxlength="30">
                                <p class="text-xs text-gray-500 mt-1" id="titleTmCount">30 символов осталось</p>
                            </div>
                        </div>

                        <!-- Поля Описание (горизонтально) -->
                        <div class="flex gap-4 mb-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label for="description_ru" class="block mb-1 font-semibold">Описание (RU):</label>
                                <textarea id="description_ru" name="description_ru" placeholder="Введите описание (RU)" class="border p-2 w-full"
                                    rows="3"></textarea>
                                <p class="text-xs text-gray-500 mt-1" id="descriptionRuCount">200 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label for="description_en" class="block mb-1 font-semibold">Описание (EN):</label>
                                <textarea id="description_en" name="description_en" placeholder="Введите описание (EN)" class="border p-2 w-full"
                                    rows="3"></textarea>
                                <p class="text-xs text-gray-500 mt-1" id="descriptionEnCount">200 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label for="description_tm" class="block mb-1 font-semibold">Описание (TM):</label>
                                <textarea id="description_tm" name="description_tm" placeholder="Введите описание (TM)" class="border p-2 w-full"
                                    rows="3"></textarea>
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
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Отмена
                            </button>
                            <button type="submit" id="modalSubmitButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded">
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
                                    onclick='ServiceModal.open(
                                    "edit",
                                    {{ $service->id }},
                                    "{{ addslashes($service->title_ru) }}",
                                    "{{ addslashes($service->title_en) }}",
                                    "{{ addslashes($service->title_tm) }}",
                                    {
                                        ru: {!! json_encode($service->categories_ru ?? []) !!},
                                        en: {!! json_encode($service->categories_en ?? []) !!},
                                        tm: {!! json_encode($service->categories_tm ?? []) !!}
                                    }
                                )'
                                    class="text-orange-500">
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
                    <form id="serviceModalForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="serviceFormMethod" value="POST">
                        <input type="hidden" id="serviceModalId" name="id">

                        <!-- Поля Названия (горизонтально) -->
                        <div class="flex gap-4 mb-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label for="serviceTitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="serviceTitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="40"
                                    required>
                                <p class="text-xs text-gray-500 mt-1" id="serviceTitleRuCount">40 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label for="serviceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="serviceTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="serviceTitleEnCount">40 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label for="serviceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="serviceTitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="serviceTitleTmCount">40 символов осталось</p>
                            </div>
                        </div>

                        <!-- Поля Категорий 1 (горизонтально) -->
                        <div class="mb-4 flex gap-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesRu1Count">40 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn1Count">40 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesTm1Count">40 символов осталось</p>
                            </div>
                        </div>

                        <!-- Поля Категорий 2 (горизонтально) -->
                        <div class="mb-4 flex gap-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesRu2Count">40 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn2Count">40 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesTm2Count">40 символов осталось</p>
                            </div>
                        </div>

                        <!-- Поля Категорий 3 (горизонтально) -->
                        <div class="mb-4 flex gap-4">
                            <!-- RU -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesRu3Count">40 символов осталось</p>
                            </div>
                            <!-- EN -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">40 символов осталось</p>
                            </div>
                            <!-- TM -->
                            <div class="w-1/3">
                                <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                    class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesTm3Count">40 символов осталось</p>
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


    {{-- -------------------------------------------------- блок о нас --------------------------------------------------  --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form method="POST"
                action="{{ isset($aboutUs->id) ? route('about-us.update', $aboutUs->id) : route('about-us.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if (isset($aboutUs->id))
                    @method('PUT')
                @endif

                <p class="text-lg font-semibold mb-4">О нас:</p>

                <!-- Поле загрузки изображения -->
                <div class="mb-6">
                    <label for="image-prev" class="block text-gray-700 font-medium mb-2">Загрузить изображение</label>
                    <input type="file" id="image-prev" name="image" accept="image/*"
                        class="border-2 border-dashed border-gray-300 p-4 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                    @if (isset($aboutUs->image_path))
                        <img src="{{ asset('storage/' . $aboutUs->image_path) }}" alt="Загруженное изображение"
                            class="mt-2 w-32">
                    @endif
                </div>

                <!-- Разделение на три языка -->
                <!-- Пример Поля Названия (трёх языков) -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-3">Название:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Русский -->
                        <div>
                            <label for="title_ru" class="block text-gray-700 font-medium mb-1">Название (RU):</label>
                            <input type="text" id="title_ru" name="title_ru"
                                value="{{ old('title_ru', $aboutUs->title_ru ?? '') }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                                maxlength="255" required>
                            @error('title_ru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="title_en" class="block text-gray-700 font-medium mb-1">Title (EN):</label>
                            <input type="text" id="title_en" name="title_en"
                                value="{{ old('title_en', $aboutUs->title_en ?? '') }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                                maxlength="255">
                            @error('title_en')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="title_tm" class="block text-gray-700 font-medium mb-1">Title (TM):</label>
                            <input type="text" id="title_tm" name="title_tm"
                                value="{{ old('title_tm', $aboutUs->title_tm ?? '') }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                                maxlength="255">
                            @error('title_tm')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Аналогично для описаний -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-3">Описание:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Русский -->
                        <div>
                            <label for="description_ru" class="block text-gray-700 font-medium mb-1">Описание
                                (RU):</label>
                            <textarea id="description_ru" name="description_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ old('description_ru', $aboutUs->description_ru ?? '') }}</textarea>
                            @error('description_ru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="description_en" class="block text-gray-700 font-medium mb-1">Description
                                (EN):</label>
                            <textarea id="description_en" name="description_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ old('description_en', $aboutUs->description_en ?? '') }}</textarea>
                            @error('description_en')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="description_tm" class="block text-gray-700 font-medium mb-1">Description
                                (TM):</label>
                            <textarea id="description_tm" name="description_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">{{ old('description_tm', $aboutUs->description_tm ?? '') }}</textarea>
                            @error('description_tm')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Сохранить</button>
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
                const imagePreview = document.getElementById(
                'imagePreview'); // Добавьте это, если нужен предпросмотр изображения

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
            window.openEditModal = (id, titleRu, titleEn, titleTm, descriptionRu, descriptionEn, descriptionTm,
                    imageUrl) =>
                openModal(true, id, titleRu, titleEn, titleTm, descriptionRu, descriptionEn, descriptionTm,
                    imageUrl);
            window.closeModal = closeModal;

            // Функция для обновления оставшихся символов
            function updateCharCount(inputId, countId, maxLength) {
                const inputField = document.getElementById(inputId);
                const countDisplay = document.getElementById(countId);

                inputField.addEventListener('input', () => {
                    const remaining = maxLength - inputField.value.length;
                    countDisplay.textContent = `${remaining} символов осталось`;
                });
            }

            // Настройка ограничений для всех текстовых полей с динамическим отображением
            updateCharCount('title_ru', 'titleRuCount', 30);
            updateCharCount('title_en', 'titleEnCount', 30);
            updateCharCount('title_tm', 'titleTmCount', 30);

            updateCharCount('description_ru', 'descriptionRuCount', 200);
            updateCharCount('description_en', 'descriptionEnCount', 200);
            updateCharCount('description_tm', 'descriptionTmCount', 200);

            // Проверка размера загружаемых изображений
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
            open(mode, id = null, titleRu = '', titleEn = '', titleTm = '', categories = {
                ru: [],
                en: [],
                tm: []
            }) {
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

                // Счётчики для названий
                const titleRuCount = document.getElementById('serviceTitleRuCount');
                const titleEnCount = document.getElementById('serviceTitleEnCount');
                const titleTmCount = document.getElementById('serviceTitleTmCount');

                // Категории
                const categoriesRuInputs = document.querySelectorAll('input[name="categories_ru[]"]');
                const categoriesEnInputs = document.querySelectorAll('input[name="categories_en[]"]');
                const categoriesTmInputs = document.querySelectorAll('input[name="categories_tm[]"]');

                // Счётчики для категорий
                const categoriesRuCounts = [
                    document.getElementById('categoriesRu1Count'),
                    document.getElementById('categoriesRu2Count'),
                    document.getElementById('categoriesRu3Count'),
                ];
                const categoriesEnCounts = [
                    document.getElementById('categoriesEn1Count'),
                    document.getElementById('categoriesEn2Count'),
                    document.getElementById('categoriesEn3Count'),
                ];
                const categoriesTmCounts = [
                    document.getElementById('categoriesTm1Count'),
                    document.getElementById('categoriesTm2Count'),
                    document.getElementById('categoriesTm3Count'),
                ];

                // Логика открытия в режиме "edit"
                if (mode === 'edit') {
                    modalTitle.textContent = 'Редактировать запись';
                    form.action = `/services/${id}`; // Отправляем на /services/{id}
                    methodInput.value = 'PUT';
                    idInput.value = id;

                    // Заполняем поля названий
                    titleRuInput.value = titleRu;
                    titleEnInput.value = titleEn;
                    titleTmInput.value = titleTm;

                    // Обновляем счётчики названий
                    updateCharCount(titleRuInput, titleRuCount, 40);
                    updateCharCount(titleEnInput, titleEnCount, 40);
                    updateCharCount(titleTmInput, titleTmCount, 40);

                    // Заполняем категории
                    categories.ru.forEach((catValue, index) => {
                        if (categoriesRuInputs[index]) {
                            categoriesRuInputs[index].value = catValue;
                            updateCharCount(categoriesRuInputs[index], categoriesRuCounts[index], 40);
                        }
                    });
                    categories.en.forEach((catValue, index) => {
                        if (categoriesEnInputs[index]) {
                            categoriesEnInputs[index].value = catValue;
                            updateCharCount(categoriesEnInputs[index], categoriesEnCounts[index], 40);
                        }
                    });
                    categories.tm.forEach((catValue, index) => {
                        if (categoriesTmInputs[index]) {
                            categoriesTmInputs[index].value = catValue;
                            updateCharCount(categoriesTmInputs[index], categoriesTmCounts[index], 40);
                        }
                    });

                    document.getElementById('serviceModalSubmitButton').textContent = 'Обновить';
                } else {
                    // Режим "add"
                    modalTitle.textContent = 'Добавить запись';
                    form.action = `{{ route('services.store') }}`; // Или просто /services
                    methodInput.value = 'POST';
                    idInput.value = '';

                    // Очищаем поля названий
                    titleRuInput.value = '';
                    titleEnInput.value = '';
                    titleTmInput.value = '';

                    // Сбрасываем счётчики названий
                    resetCharCount(titleRuInput, titleRuCount, 40);
                    resetCharCount(titleEnInput, titleEnCount, 40);
                    resetCharCount(titleTmInput, titleTmCount, 40);

                    // Сбрасываем категории
                    categoriesRuInputs.forEach((input, index) => {
                        input.value = '';
                        if (categoriesRuCounts[index]) {
                            resetCharCount(input, categoriesRuCounts[index], 40);
                        }
                    });
                    categoriesEnInputs.forEach((input, index) => {
                        input.value = '';
                        if (categoriesEnCounts[index]) {
                            resetCharCount(input, categoriesEnCounts[index], 40);
                        }
                    });
                    categoriesTmInputs.forEach((input, index) => {
                        input.value = '';
                        if (categoriesTmCounts[index]) {
                            resetCharCount(input, categoriesTmCounts[index], 40);
                        }
                    });

                    document.getElementById('serviceModalSubmitButton').textContent = 'Сохранить';
                }

                // Показываем модальное окно
                modal.classList.remove('hidden');
            },

            close() {
                console.log('Closing Service Modal');
                document.getElementById('serviceModal').classList.add('hidden');
            }
        };

        // Вспомогательные функции для подсчета символов
        function updateCharCount(inputField, countElement, maxLength) {
            const remaining = maxLength - inputField.value.length;
            countElement.textContent = `${remaining} символов осталось`;

            inputField.addEventListener('input', () => {
                const remaining = maxLength - inputField.value.length;
                countElement.textContent = `${remaining} символов осталось`;

                // Изменение цвета текста при оставшихся символах <= 10
                if (remaining <= 10) {
                    countElement.classList.add('text-red-500');
                } else {
                    countElement.classList.remove('text-red-500');
                }
            });
        }

        function resetCharCount(inputField, countElement, maxLength) {
            inputField.value = '';
            countElement.textContent = `${maxLength} символов осталось`;
            countElement.classList.remove('text-red-500');
        }

        // Инициализация счётчиков для всех полей при загрузке страницы
        document.addEventListener('DOMContentLoaded', () => {

            // Названия
            const titleRuInput = document.getElementById('serviceTitleRu');
            const titleEnInput = document.getElementById('serviceTitleEn');
            const titleTmInput = document.getElementById('serviceTitleTm');

            const titleRuCount = document.getElementById('serviceTitleRuCount');
            const titleEnCount = document.getElementById('serviceTitleEnCount');
            const titleTmCount = document.getElementById('serviceTitleTmCount');

            updateCharCount(titleRuInput, titleRuCount, 40);
            updateCharCount(titleEnInput, titleEnCount, 40);
            updateCharCount(titleTmInput, titleTmCount, 40);

            // Категории 1
            const categoriesRuInputs1 = document.querySelectorAll('input[name="categories_ru[]"]');
            const categoriesEnInputs1 = document.querySelectorAll('input[name="categories_en[]"]');
            const categoriesTmInputs1 = document.querySelectorAll('input[name="categories_tm[]"]');

            const categoriesRuCounts1 = [
                document.getElementById('categoriesRu1Count'),
                document.getElementById('categoriesRu2Count'),
                document.getElementById('categoriesRu3Count'),
            ];
            const categoriesEnCounts1 = [
                document.getElementById('categoriesEn1Count'),
                document.getElementById('categoriesEn2Count'),
                document.getElementById('categoriesEn3Count'),
            ];
            const categoriesTmCounts1 = [
                document.getElementById('categoriesTm1Count'),
                document.getElementById('categoriesTm2Count'),
                document.getElementById('categoriesTm3Count'),
            ];

            categoriesRuInputs1.forEach((input, index) => {
                if (categoriesRuCounts1[index]) {
                    updateCharCount(input, categoriesRuCounts1[index], 40);
                }
            });
            categoriesEnInputs1.forEach((input, index) => {
                if (categoriesEnCounts1[index]) {
                    updateCharCount(input, categoriesEnCounts1[index], 40);
                }
            });
            categoriesTmInputs1.forEach((input, index) => {
                if (categoriesTmCounts1[index]) {
                    updateCharCount(input, categoriesTmCounts1[index], 40);
                }
            });

            // Проверка размера загружаемых изображений (если есть поле для изображений)
            // В вашем HTML-шаблоне `serviceModal` отсутствует поле для загрузки изображения,
            // но если вы планируете его добавить, можно использовать аналогичную логику.
            // Пример:
            // const imageInput = document.getElementById('serviceImage');
            // const imagePreview = document.getElementById('serviceImagePreview');
            // imageInput.addEventListener('change', function() {
            //     const file = this.files[0];
            //     const maxSize = 5 * 1024 * 1024; // 5 MB
            //     if (file && file.size > maxSize) {
            //         alert('Размер файла не должен превышать 5 MB!');
            //         this.value = ''; // Сбрасываем поле
            //         // Скрываем предпросмотр, если было отображено
            //         if (imagePreview) {
            //             imagePreview.classList.add('hidden');
            //         }
            //     } else if (file && imagePreview) {
            //         // Показываем предпросмотр, если файл выбран и размер допустимый
            //         const reader = new FileReader();
            //         reader.onload = function(e) {
            //             imagePreview.src = e.target.result;
            //             imagePreview.classList.remove('hidden');
            //         }
            //         reader.readAsDataURL(file);
            //     } else {
            //         // Если файл не выбран, скрываем предпросмотр
            //         if (imagePreview) {
            //             imagePreview.classList.add('hidden');
            //         }
            //     }
            // });

        });
    </script>
@endsection
