@extends('layouts.dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <p class="base-text mb-10">Антивирусы</p>
            <p class="base-text mb-10">Стартовый текст и изображение:</p>

            <form action="{{ route('antiviruses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Загрузка фотографий -->
                <div class="mb-6">
                    <label for="photos" class="block text-gray-700 font-medium mb-2">
                        Загрузить фотографии
                    </label>

                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                        class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
                    <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5
                        мб</p>
                    {{-- Контейнер для предпросмотра новых файлов --}}
                    <div id="preview-container" class="flex flex-wrap gap-2 mt-4"></div>

                    {{-- Отображение существующих фотографий --}}
                    @if ($antiviruses->photos && count($antiviruses->photos) > 0)
                        <div class="mt-4">
                            <h4 class="text-md font-semibold mb-2">Существующие фотографии:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($antiviruses->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Фотография"
                                        class="w-24 h-24 object-cover rounded">
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Титульный текст -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-3">Титульный текст:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Русский -->
                        <div>
                            <label for="title_ru" class="block text-gray-700 font-medium mb-1">
                                Титульный текст (RU):
                            </label>
                            <input type="text" id="title_ru" name="title_ru"
                                value="{{ old('title_ru', $antiviruses->title_ru) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="50"
                                placeholder="Допустимое количество символов 50">
                            @error('title_ru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="title_en" class="block text-gray-700 font-medium mb-1">
                                Title (EN):
                            </label>
                            <input type="text" id="title_en" name="title_en"
                                value="{{ old('title_en', $antiviruses->title_en) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="50"
                                placeholder="Допустимое количество символов 50">
                            @error('title_en')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                                Title (TM):
                            </label>
                            <input type="text" id="title_tm" name="title_tm"
                                value="{{ old('title_tm', $antiviruses->title_tm) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded"maxlength="50"
                                placeholder="Допустимое количество символов 50">
                            @error('title_tm')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Описание -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-3">Описание:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Русский -->
                        <div>
                            <label for="categories_ru" class="block text-gray-700 font-medium mb-1">
                                Описание (RU):
                            </label>
                            <textarea id="categories_ru" name="categories_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200"
                                placeholder="Допустимое количество символов 200">{{ old('categories_ru', $antiviruses->categories_ru) }}</textarea>
                            @error('categories_ru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="categories_en" class="block text-gray-700 font-medium mb-1">
                                Description (EN):
                            </label>
                            <textarea id="categories_en" name="categories_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200"
                                placeholder="Допустимое количество символов 200">{{ old('categories_en', $antiviruses->categories_en) }}</textarea>
                            @error('categories_en')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="categories_tm" class="block text-gray-700 font-medium mb-1">
                                Description (TM):
                            </label>
                            <textarea id="categories_tm" name="categories_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200"
                                placeholder="Допустимое количество символов 200">{{ old('categories_tm', $antiviruses->categories_tm) }}</textarea>
                            @error('categories_tm')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Кнопка отправки формы -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
            </form>
        </div>
    </div>

    {{-- ----------------------------------------------------------- --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Касперский:</p>

            <!-- Таблица с услугами -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-40">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (RU)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (EN)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (TM)</th>
                        <th class="border border-gray-300 px-4 py-2">Скидка (%)</th>
                        <th class="border border-gray-300 px-4 py-2">Цена (Тм)</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody id="servicesTableBody">
                    @foreach ($kaspersky as $index => $kasper)
                        <tr>
                            <!-- Вывод порядкового номера строки -->
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <!-- Остальные данные -->
                            <td class="border border-gray-300 px-4 py-2">{{ $kasper->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $kasper->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $kasper->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $kasper->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $kasper->discount }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $kasper->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button class="service-edit-button text-orange-500" data-id="{{ $kasper->id }}"
                                    data-title_ru="{{ addslashes($kasper->title_ru) }}"
                                    data-title_en="{{ addslashes($kasper->title_en) }}"
                                    data-title_tm="{{ addslashes($kasper->title_tm) }}"
                                    data-categories_ru="{{ json_encode($kasper->categories_ru ?? []) }}"
                                    data-categories_en="{{ json_encode($kasper->categories_en ?? []) }}"
                                    data-categories_tm="{{ json_encode($kasper->categories_tm ?? []) }}"
                                    data-discount="{{ $kasper->discount !== null ? $kasper->discount : 'null' }}"
                                    data-price="{{ $kasper->price !== null ? $kasper->price : 'null' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="orange">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                      </svg>
                                      
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('kaspersky.destroy', $kasper->id) }}" method="POST"
                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="red">
                                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                          </svg>
                                          
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
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 id="serviceModalTitle" class="text-xl mb-4"></h2>
                    <form id="serviceModalForm" method="POST" action="{{ route('bitrix24-cloud.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="serviceFormMethod" value="POST">
                        <input type="hidden" id="serviceModalId" name="id">

                        <!-- Поля Названия -->
                        <div class="flex gap-4 mb-4">
                            <!-- Названия -->
                            <div class="w-1/3">
                                <label for="serviceTitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="serviceTitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="60"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="serviceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="serviceTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="serviceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="serviceTitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                        </div>

                        <!-- Категории -->
                        <div class="mb-4">
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="50">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                        </div>

                        <!-- Поля Скидка и Цена -->
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/2">
                                <label for="serviceDiscount" class="block mb-1 font-semibold">Скидка (%):</label>
                                <input type="number" id="serviceDiscount" name="discount"
                                    placeholder="Введите скидку (%)" class="border p-2 w-full" min="0"
                                    max="100">
                            </div>

                            <div class="w-1/2">
                                <label for="servicePrice" class="block mb-1 font-semibold">Цена (Тм):</label>
                                <input type="number" id="servicePrice" name="price" placeholder="Введите цену (Тм)"
                                    class="border p-2 w-full" min="0" required
                                    oninvalid="this.setCustomValidity('Пожалуйста, заполните поле Цена.')"
                                    oninput="this.setCustomValidity('')">
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


    {{-- ------------------------------------------ --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Eset:</p>

            <!-- Таблица -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-40">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (RU)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (EN)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (TM)</th>
                        <th class="border border-gray-300 px-4 py-2">Скидка (%)</th>
                        <th class="border border-gray-300 px-4 py-2">Цена (Тм)</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody id="newServicesTableBody">
                    @foreach ($eset as $index => $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $item->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $item->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $item->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->discount }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button class="new-service-edit-button text-orange-500" data-id="{{ $item->id }}"
                                    data-title_ru="{{ addslashes($item->title_ru) }}"
                                    data-title_en="{{ addslashes($item->title_en) }}"
                                    data-title_tm="{{ addslashes($item->title_tm) }}"
                                    data-categories_ru="{{ json_encode($item->categories_ru ?? []) }}"
                                    data-categories_en="{{ json_encode($item->categories_en ?? []) }}"
                                    data-categories_tm="{{ json_encode($item->categories_tm ?? []) }}"
                                    data-discount="{{ $item->discount !== null ? $item->discount : 'null' }}"
                                    data-price="{{ $item->price !== null ? $item->price : 'null' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="orange">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                      </svg>
                                      
                                </button>
                            </td>

                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('eset.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="red">
                                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                          </svg>
                                          
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Кнопка добавления записи -->
            <div class="flex justify-center mt-4">
                <button onclick="NewServiceModal.open('add')"
                    class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                    + Добавить запись
                </button>
            </div>

            <!-- Модальное окно -->
            <div id="newServiceModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 id="newServiceModalTitle" class="text-xl mb-4"></h2>
                    <form id="newServiceModalForm" method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="newServiceFormMethod" value="POST">
                        <input type="hidden" id="newServiceModalId" name="id">

                        <!-- Поля Названия -->
                        <div class="flex gap-4 mb-4">
                            <div class="w-1/3">
                                <label for="newServiceTitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="newServiceTitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="60"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="newServiceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="newServiceTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="newServiceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="newServiceTitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                        </div>

                        <!-- Категории -->
                        <div class="mb-4">
                            <!-- Категория 1 -->
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 2 -->
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 3 -->
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                        </div>

                        <!-- Поля Скидка и Цена -->
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/2">
                                <label for="newServiceDiscount" class="block mb-1 font-semibold">Скидка (%):</label>
                                <input type="number" id="newServiceDiscount" name="discount"
                                    placeholder="Введите скидку (%)" class="border p-2 w-full" min="0"
                                    max="100">
                            </div>
                            <div class="w-1/2">
                                <label for="newServicePrice" class="block mb-1 font-semibold">Цена (Тм):</label>
                                <input type="number" id="newServicePrice" name="price"
                                    placeholder="Введите цену (Тм)" class="border p-2 w-full" min="0" required>
                            </div>
                        </div>

                        <!-- Кнопки -->
                        <div class="flex justify-end">
                            <button type="button" onclick="NewServiceModal.close()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Отмена
                            </button>
                            <button type="submit" id="newServiceModalSubmitButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------- --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Про 32:</p>

            <!-- Таблица с услугами -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-40">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (RU)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (EN)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (TM)</th>
                        <th class="border border-gray-300 px-4 py-2">Скидка (%)</th>
                        <th class="border border-gray-300 px-4 py-2">Цена (Тм)</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody id="pro32TableBody">
                    @foreach ($pro32 as $index => $pro)
                        <tr>
                            <!-- Вывод порядкового номера строки -->
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <!-- Остальные данные -->
                            <td class="border border-gray-300 px-4 py-2">{{ $pro->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $pro->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $pro->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $pro->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $pro->discount }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $pro->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button class="new-service-edit-button text-orange-500" data-id="{{ $item->id }}"
                                    data-title_ru="{{ addslashes($pro->title_ru) }}"
                                    data-title_en="{{ addslashes($pro->title_en) }}"
                                    data-title_tm="{{ addslashes($pro->title_tm) }}"
                                    data-categories_ru="{{ json_encode($pro->categories_ru ?? []) }}"
                                    data-categories_en="{{ json_encode($pro->categories_en ?? []) }}"
                                    data-categories_tm="{{ json_encode($pro->categories_tm ?? []) }}"
                                    data-discount="{{ $pro->discount !== null ? $pro->discount : 'null' }}"
                                    data-price="{{ $pro->price !== null ? $pro->price : 'null' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="orange">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                      </svg>
                                      
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('pro32.destroy', $pro->id) }}" method="POST"
                                    onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="red">
                                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                          </svg>
                                          
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <!-- Кнопка добавления записи -->
            <div class="flex justify-center mt-4">
                <button onclick="pro32.open('add')"
                    class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                    + Добавить запись
                </button>
            </div>
            <!-- Модальное окно -->
            <div id="pro32Modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 id="pro32ModalTitle" class="text-xl mb-4"></h2>
                    <form id="pro32ModalForm" method="POST" action="{{ route('pro32.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="pro32FormMethod" value="POST">
                        <input type="hidden" id="pro32ModalId" name="id">
                        <!-- Поля Названия -->
                        <div class="flex gap-4 mb-4">
                            <!-- Названия -->
                            <div class="w-1/3">
                                <label for="pro32TitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="pro32TitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="60"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="pro32TitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="pro32TitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="pro32TitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="pro32TitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                        </div>
                        <!-- Категории -->
                        <div class="mb-4">
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="80">
                                    <p class="text-xs text-gray-500 mt-1">80 символов осталось</p>
                                </div>
                            </div>
                        </div>
                        <!-- Поля Скидка и Цена -->
                        <div class="mb-4 flex gap-4">
                            <div class="w-1/2">
                                <label for="pro32Discount" class="block mb-1 font-semibold">Скидка (%):</label>
                                <input type="number" id="pro32Discount" name="discount"
                                    placeholder="Введите скидку (%)" class="border p-2 w-full" min="0"
                                    max="100">
                            </div>
                            <div class="w-1/2">
                                <label for="pro32Price" class="block mb-1 font-semibold">Цена (Тм):</label>
                                <input type="number" id="pro32Price" name="price" placeholder="Введите цену (Тм)"
                                    class="border p-2 w-full" min="0" required
                                    oninvalid="this.setCustomValidity('Пожалуйста, заполните поле Цена.')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <!-- Кнопки -->
                        <div class="flex justify-end">
                            <button type="button" onclick="pro32.close()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Отмена
                            </button>
                            <button type="submit" id="pro32ModalSubmitButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded">
                                Сохранить
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            </div>
        </div>
    </div>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Инициализация обработчиков для ServiceModal
            const serviceEditButtons = document.querySelectorAll('.service-edit-button');
            serviceEditButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title_ru = this.getAttribute('data-title_ru');
                    const title_en = this.getAttribute('data-title_en');
                    const title_tm = this.getAttribute('data-title_tm');
                    const categories_ru = JSON.parse(this.getAttribute('data-categories_ru'));
                    const categories_en = JSON.parse(this.getAttribute('data-categories_en'));
                    const categories_tm = JSON.parse(this.getAttribute('data-categories_tm'));
                    const discount = this.getAttribute('data-discount') !== 'null' ? parseFloat(this
                        .getAttribute('data-discount')) : null;
                    const price = this.getAttribute('data-price') !== 'null' ? parseFloat(this
                        .getAttribute('data-price')) : null;

                    ServiceModal.open(
                        'edit',
                        id,
                        title_ru,
                        title_en,
                        title_tm, {
                            ru: categories_ru,
                            en: categories_en,
                            tm: categories_tm
                        },
                        discount,
                        price
                    );
                });
            });

            // Закрытие модального окна при клике вне его
            window.onclick = function(event) {
                const modal = document.getElementById('serviceModal');
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            };
        });

        const ServiceModal = {
            open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {}, discount =
                null, price = null) {
                const modal = document.getElementById('serviceModal');
                const modalTitle = document.getElementById('serviceModalTitle');
                const form = document.getElementById('serviceModalForm');
                const methodInput = document.getElementById('serviceFormMethod');
                const idInput = document.getElementById('serviceModalId');

                try {
                    if (action === 'edit') {
                        modalTitle.textContent = 'Редактировать запись';
                        methodInput.value = 'PUT';
                        form.action = `/kaspersky/${id}/update`; // Убедитесь, что маршрут корректен
                        idInput.value = id;
                        // Заполнение полей данными
                        document.getElementById('serviceTitleRu').value = title_ru || '';
                        document.getElementById('serviceTitleEn').value = title_en || '';
                        document.getElementById('serviceTitleTm').value = title_tm || '';

                        // Убедимся, что категории являются массивами
                        const categoriesRu = Array.isArray(categories.ru) ? categories.ru : [];
                        const categoriesEn = Array.isArray(categories.en) ? categories.en : [];
                        const categoriesTm = Array.isArray(categories.tm) ? categories.tm : [];

                        // Заполнение категорий
                        const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                        const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                        const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');

                        // Заполняем категории RU
                        categoriesRu.forEach((cat, index) => {
                            if (categoryFieldsRu[index]) {
                                categoryFieldsRu[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля, если категорий меньше
                        for (let i = categoriesRu.length; i < categoryFieldsRu.length; i++) {
                            categoryFieldsRu[i].value = '';
                        }

                        // Заполняем категории EN
                        categoriesEn.forEach((cat, index) => {
                            if (categoryFieldsEn[index]) {
                                categoryFieldsEn[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля
                        for (let i = categoriesEn.length; i < categoryFieldsEn.length; i++) {
                            categoryFieldsEn[i].value = '';
                        }

                        // Заполняем категории TM
                        categoriesTm.forEach((cat, index) => {
                            if (categoryFieldsTm[index]) {
                                categoryFieldsTm[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля
                        for (let i = categoriesTm.length; i < categoryFieldsTm.length; i++) {
                            categoryFieldsTm[i].value = '';
                        }

                        // Установка значений полей скидки и цены с проверкой на null
                        document.getElementById('serviceDiscount').value = discount !== null ? discount : 0;
                        document.getElementById('servicePrice').value = price !== null ? price : '';
                    } else if (action === 'add') {
                        modalTitle.textContent = 'Добавить новую запись';
                        methodInput.value = 'POST';
                        form.action = "{{ route('kaspersky.store') }}"; // Убедитесь, что маршрут корректен
                        idInput.value = '';
                        // Очистка полей
                        form.reset();
                        // Дополнительно очищаем поля категорий
                        const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                        const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                        const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');
                        categoryFieldsRu.forEach(field => field.value = '');
                        categoryFieldsEn.forEach(field => field.value = '');
                        categoryFieldsTm.forEach(field => field.value = '');
                    }
                    modal.classList.remove('hidden');
                    // Обновление счетчиков символов
                    ServiceModal.updateCharacterCounts();
                } catch (error) {
                    console.error('Ошибка при открытии модального окна:', error);
                }
            },
            close: function() {
                const modal = document.getElementById('serviceModal');
                modal.classList.add('hidden');
            },
            updateCharacterCounts: function() {
                document.querySelectorAll('input[maxlength]').forEach(input => {
                    const counter = input.nextElementSibling;
                    if (counter && counter.tagName.toLowerCase() === 'p') {
                        ServiceModal.updateCharacterCount(input, counter);
                        input.addEventListener('input', () => ServiceModal.updateCharacterCount(input,
                            counter));
                    }
                });
            },
            updateCharacterCount: function(input, counter) {
                const maxLength = parseInt(input.getAttribute('maxlength'), 10);
                const remaining = maxLength - input.value.length;
                counter.textContent = `${remaining} символов осталось`;
            }
        };
    </script>

    {{-- ------------------------------------------------- --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Инициализация обработчиков для NewServiceModal
            const newServiceEditButtons = document.querySelectorAll('.new-service-edit-button');
            newServiceEditButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title_ru = this.getAttribute('data-title_ru');
                    const title_en = this.getAttribute('data-title_en');
                    const title_tm = this.getAttribute('data-title_tm');
                    const categories_ru = JSON.parse(this.getAttribute('data-categories_ru'));
                    const categories_en = JSON.parse(this.getAttribute('data-categories_en'));
                    const categories_tm = JSON.parse(this.getAttribute('data-categories_tm'));
                    const discount = this.getAttribute('data-discount') !== 'null' ? parseFloat(this
                        .getAttribute('data-discount')) : null;
                    const price = this.getAttribute('data-price') !== 'null' ? parseFloat(this
                        .getAttribute('data-price')) : null;

                    NewServiceModal.open(
                        'edit',
                        id,
                        title_ru,
                        title_en,
                        title_tm, {
                            ru: categories_ru,
                            en: categories_en,
                            tm: categories_tm
                        },
                        discount,
                        price
                    );
                });
            });

            // Закрытие модального окна при клике вне его
            window.onclick = function(event) {
                const modal = document.getElementById('newServiceModal');
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            };
        });

        const NewServiceModal = {
            open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {}, discount =
                null, price = null) {
                const modal = document.getElementById('newServiceModal');
                const modalTitle = document.getElementById('newServiceModalTitle');
                const form = document.getElementById('newServiceModalForm');
                const methodInput = document.getElementById('newServiceFormMethod');
                const idInput = document.getElementById('newServiceModalId');

                try {
                    if (action === 'edit') {
                        modalTitle.textContent = 'Редактировать Коробку';
                        methodInput.value = 'PUT';
                        form.action = `/eset/${id}/update`; // Убедитесь, что маршрут корректен
                        idInput.value = id;
                        // Заполнение полей данными
                        document.getElementById('newServiceTitleRu').value = title_ru || '';
                        document.getElementById('newServiceTitleEn').value = title_en || '';
                        document.getElementById('newServiceTitleTm').value = title_tm || '';

                        // Убедимся, что категории являются массивами
                        const categoriesRu = Array.isArray(categories.ru) ? categories.ru : [];
                        const categoriesEn = Array.isArray(categories.en) ? categories.en : [];
                        const categoriesTm = Array.isArray(categories.tm) ? categories.tm : [];

                        // Заполнение категорий
                        const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                        const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                        const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');

                        // Заполняем категории RU
                        categoriesRu.forEach((cat, index) => {
                            if (categoryFieldsRu[index]) {
                                categoryFieldsRu[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля, если категорий меньше
                        for (let i = categoriesRu.length; i < categoryFieldsRu.length; i++) {
                            categoryFieldsRu[i].value = '';
                        }

                        // Заполняем категории EN
                        categoriesEn.forEach((cat, index) => {
                            if (categoryFieldsEn[index]) {
                                categoryFieldsEn[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля
                        for (let i = categoriesEn.length; i < categoryFieldsEn.length; i++) {
                            categoryFieldsEn[i].value = '';
                        }

                        // Заполняем категории TM
                        categoriesTm.forEach((cat, index) => {
                            if (categoryFieldsTm[index]) {
                                categoryFieldsTm[index].value = cat;
                            }
                        });
                        // Очищаем оставшиеся поля
                        for (let i = categoriesTm.length; i < categoryFieldsTm.length; i++) {
                            categoryFieldsTm[i].value = '';
                        }

                        // Установка значений полей скидки и цены с проверкой на null
                        document.getElementById('newServiceDiscount').value = discount !== null ? discount : 0;
                        document.getElementById('newServicePrice').value = price !== null ? price : '';
                    } else if (action === 'add') {
                        modalTitle.textContent = 'Добавить запись';
                        methodInput.value = 'POST';
                        form.action = "{{ route('eset.store') }}"; // Убедитесь, что маршрут корректен
                        idInput.value = '';
                        // Очистка полей
                        form.reset();
                        // Дополнительно очищаем поля категорий
                        const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                        const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                        const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');
                        categoryFieldsRu.forEach(field => field.value = '');
                        categoryFieldsEn.forEach(field => field.value = '');
                        categoryFieldsTm.forEach(field => field.value = '');
                    }
                    modal.classList.remove('hidden');
                    // Обновление счетчиков символов
                    NewServiceModal.updateCharacterCounts();
                } catch (error) {
                    console.error('Ошибка при открытии модального окна:', error);
                }
            },
            close: function() {
                const modal = document.getElementById('newServiceModal');
                modal.classList.add('hidden');
            },
            updateCharacterCounts: function() {
                document.querySelectorAll('input[maxlength]').forEach(input => {
                    const counter = input.nextElementSibling;
                    if (counter && counter.tagName.toLowerCase() === 'p') {
                        NewServiceModal.updateCharacterCount(input, counter);
                        input.addEventListener('input', () => NewServiceModal.updateCharacterCount(input,
                            counter));
                    }
                });
            },
            updateCharacterCount: function(input, counter) {
                const maxLength = parseInt(input.getAttribute('maxlength'), 10);
                const remaining = maxLength - input.value.length;
                counter.textContent = `${remaining} символов осталось`;
            }
        };
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Инициализация обработчиков для pro32
        const pro32EditButtons = document.querySelectorAll('.pro32-edit-button');
        pro32EditButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title_ru = this.getAttribute('data-title_ru');
                const title_en = this.getAttribute('data-title_en');
                const title_tm = this.getAttribute('data-title_tm');
                const categories_ru = JSON.parse(this.getAttribute('data-categories_ru'));
                const categories_en = JSON.parse(this.getAttribute('data-categories_en'));
                const categories_tm = JSON.parse(this.getAttribute('data-categories_tm'));
                const discount = this.getAttribute('data-discount') !== 'null' ? parseFloat(this
                    .getAttribute('data-discount')) : null;
                const price = this.getAttribute('data-price') !== 'null' ? parseFloat(this
                    .getAttribute('data-price')) : null;
                pro32.open(
                    'edit',
                    id,
                    title_ru,
                    title_en,
                    title_tm, {
                        ru: categories_ru,
                        en: categories_en,
                        tm: categories_tm
                    },
                    discount,
                    price
                );
            });
        });
        // Закрытие модального окна при клике вне его
        window.onclick = function(event) {
            const modal = document.getElementById('pro32Modal');
            if (event.target == modal) {
                modal.classList.add('hidden');
            }
        };
    });
    const pro32 = {
        open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {}, discount =
            null, price = null) {
            const modal = document.getElementById('pro32Modal');
            const modalTitle = document.getElementById('pro32ModalTitle');
            const form = document.getElementById('pro32ModalForm');
            const methodInput = document.getElementById('pro32FormMethod');
            const idInput = document.getElementById('pro32ModalId');
            try {
                if (action === 'edit') {
                    modalTitle.textContent = 'Редактировать';
                    methodInput.value = 'PUT';
                    form.action = `/pro32/${id}/update`; // Убедитесь, что маршрут корректен
                    idInput.value = id;
                    // Заполнение полей данными
                    document.getElementById('pro32TitleRu').value = title_ru || '';
                    document.getElementById('pro32TitleEn').value = title_en || '';
                    document.getElementById('pro32TitleTm').value = title_tm || '';
                    // Убедимся, что категории являются массивами
                    const categoriesRu = Array.isArray(categories.ru) ? categories.ru : [];
                    const categoriesEn = Array.isArray(categories.en) ? categories.en : [];
                    const categoriesTm = Array.isArray(categories.tm) ? categories.tm : [];
                    // Заполнение категорий
                    const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                    const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                    const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');
                    // Заполняем категории RU
                    categoriesRu.forEach((cat, index) => {
                        if (categoryFieldsRu[index]) {
                            categoryFieldsRu[index].value = cat;
                        }
                    });
                    // Очищаем оставшиеся поля, если категорий меньше
                    for (let i = categoriesRu.length; i < categoryFieldsRu.length; i++) {
                        categoryFieldsRu[i].value = '';
                    }
                    // Заполняем категории EN
                    categoriesEn.forEach((cat, index) => {
                        if (categoryFieldsEn[index]) {
                            categoryFieldsEn[index].value = cat;
                        }
                    });
                    // Очищаем оставшиеся поля
                    for (let i = categoriesEn.length; i < categoryFieldsEn.length; i++) {
                        categoryFieldsEn[i].value = '';
                    }
                    // Заполняем категории TM
                    categoriesTm.forEach((cat, index) => {
                        if (categoryFieldsTm[index]) {
                            categoryFieldsTm[index].value = cat;
                        }
                    });
                    // Очищаем оставшиеся поля
                    for (let i = categoriesTm.length; i < categoryFieldsTm.length; i++) {
                        categoryFieldsTm[i].value = '';
                    }
                    // Установка значений полей скидки и цены с проверкой на null
                    document.getElementById('pro32Discount').value = discount !== null ? discount : 0;
                    document.getElementById('pro32Price').value = price !== null ? price : '';
                } else if (action === 'add') {
                    modalTitle.textContent = 'Добавить запись';
                    methodInput.value = 'POST';
                    form.action = "{{ route('pro32.store') }}"; // Убедитесь, что маршрут корректен
                    idInput.value = '';
                    // Очистка полей
                    form.reset();
                    // Дополнительно очищаем поля категорий
                    const categoryFieldsRu = form.querySelectorAll('input[name="categories_ru[]"]');
                    const categoryFieldsEn = form.querySelectorAll('input[name="categories_en[]"]');
                    const categoryFieldsTm = form.querySelectorAll('input[name="categories_tm[]"]');
                    categoryFieldsRu.forEach(field => field.value = '');
                    categoryFieldsEn.forEach(field => field.value = '');
                    categoryFieldsTm.forEach(field => field.value = '');
                }
                modal.classList.remove('hidden');
                // Обновление счетчиков символов
                pro32.updateCharacterCounts();
            } catch (error) {
                console.error('Ошибка при открытии модального окна:', error);
            }
        },
        close: function() {
            const modal = document.getElementById('pro32Modal');
            modal.classList.add('hidden');
        },
        updateCharacterCounts: function() {
            document.querySelectorAll('input[maxlength]').forEach(input => {
                const counter = input.nextElementSibling;
                if (counter && counter.tagName.toLowerCase() === 'p') {
                    pro32.updateCharacterCount(input, counter);
                    input.addEventListener('input', () => pro32.updateCharacterCount(input,
                        counter));
                }
            });
        },
        updateCharacterCount: function(input, counter) {
            const maxLength = parseInt(input.getAttribute('maxlength'), 10);
            const remaining = maxLength - input.value.length;
            counter.textContent = `${remaining} символов осталось`;
        }
    };
</script>


@endsection
