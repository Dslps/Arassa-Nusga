@extends('layouts.dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <p class="base-text mb-10">Битрикс 24</p>
            <p class="base-text mb-10">Стартовый текст и изображение:</p>

            <form action="{{ route('bitrix24.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Загрузка фотографий -->
                <div class="mb-6">
                    <label for="photos" class="block text-gray-700 font-medium mb-2">
                        Загрузить фотографии
                    </label>

                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                        class="border-2 border-dashed border-gray-300 p-4 w-full rounded">

                    {{-- Контейнер для предпросмотра новых файлов --}}
                    <div id="preview-container" class="flex flex-wrap gap-2 mt-4"></div>

                    {{-- Отображение существующих фотографий --}}
                    @if ($bitrix24->photos && count($bitrix24->photos) > 0)
                        <div class="mt-4">
                            <h4 class="text-md font-semibold mb-2">Существующие фотографии:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($bitrix24->photos as $photo)
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
                                value="{{ old('title_ru', $bitrix24->title_ru) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
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
                                value="{{ old('title_en', $bitrix24->title_en) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
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
                                value="{{ old('title_tm', $bitrix24->title_tm) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
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
                            <label for="description_ru" class="block text-gray-700 font-medium mb-1">
                                Описание (RU):
                            </label>
                            <textarea id="description_ru" name="description_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_ru', $bitrix24->description_ru) }}</textarea>
                            @error('description_ru')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="description_en" class="block text-gray-700 font-medium mb-1">
                                Description (EN):
                            </label>
                            <textarea id="description_en" name="description_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_en', $bitrix24->description_en) }}</textarea>
                            @error('description_en')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                                Description (TM):
                            </label>
                            <textarea id="description_tm" name="description_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_tm', $bitrix24->description_tm) }}</textarea>
                            @error('description_tm')
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
    {{-- ----------------------------------Бирикс облако---------------------------------------------- --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Битрикс облако:</p>

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
                    @foreach ($services as $index => $service)
                        <tr>
                            <!-- Вывод порядкового номера строки -->
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>

                            <!-- Остальные данные -->
                            <td class="border border-gray-300 px-4 py-2">{{ $service->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $service->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $service->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $service->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $service->discount }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $service->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button
                                    onclick="ServiceModal.open(
                                    'edit',
                                    {{ $service->id }},
                                    '{{ $service->title_ru }}',
                                    '{{ $service->title_en }}',
                                    '{{ $service->title_tm }}',
                                    { 
                                        ru: {{ json_encode($service->categories_ru ?? []) }},
                                        en: {{ json_encode($service->categories_en ?? []) }},
                                        tm: {{ json_encode($service->categories_tm ?? []) }}
                                    },
                                    {{ $service->discount }},
                                    {{ $service->price }}
                                )"
                                    class="text-orange-500">
                                    <i class="text-[20px] fa-solid fa-pencil"></i>
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('bitrix24-cloud.destroy', $service->id) }}" method="POST"
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
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="40"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="serviceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="serviceTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="serviceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="serviceTitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                        </div>

                        <!-- Категории -->
                        <div class="mb-4">
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
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
    {{-- Битрикс коробка --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Бирикс коробка:</p>

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
                    <!-- Данные будут добавлены динамически -->
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
                        <input type="hidden" name="_method" id="newServiceFormMethod" value="POST">
                        <input type="hidden" id="newServiceModalId" name="id">

                        <div class="flex gap-4 mb-4">
                            <div class="w-1/3">
                                <label for="newServiceTitleRu" class="block mb-1 font-semibold">Название (RU):</label>
                                <input type="text" id="newServiceTitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="40"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="newServiceTitleEn" class="block mb-1 font-semibold">Название (EN):</label>
                                <input type="text" id="newServiceTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="newServiceTitleTm" class="block mb-1 font-semibold">Название (TM):</label>
                                <input type="text" id="newServiceTitleTm" name="title_tm"
                                    placeholder="Введите название (TM)" class="border p-2 w-full" maxlength="40">
                                <p class="text-xs text-gray-500 mt-1">40 символов осталось</p>
                            </div>
                        </div>

                        <!-- Категории -->
                        <div class="mb-4">
                            <!-- Категория 1 -->
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 1 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 2 -->
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 3 -->
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="30">
                                    <p class="text-xs text-gray-500 mt-1">30 символов осталось</p>
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

    <script>
        document.getElementById('photos').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; 

            const files = event.target.files;
            if (files) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-24', 'h-24', 'object-cover', 'rounded');
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
    {{-- битрикс облако --}}
    <script>
        const ServiceModal = {
            open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {
                ru: [],
                en: [],
                tm: []
            }, discount = '', price = '') {
                const form = document.getElementById('serviceModalForm');
                document.getElementById('serviceModal').classList.remove('hidden');
                document.getElementById('serviceModalTitle').innerText = action === 'add' ? 'Добавить Услугу' :
                    'Редактировать Услугу';

                form.action = action === 'add' ?
                    "{{ route('bitrix24-cloud.store') }}" :
                    `/services/${id}/update`;

                document.getElementById('serviceFormMethod').value = action === 'add' ? 'POST' : 'PUT';
                document.getElementById('serviceModalId').value = id || '';
                document.getElementById('serviceTitleRu').value = title_ru || '';
                document.getElementById('serviceTitleEn').value = title_en || '';
                document.getElementById('serviceTitleTm').value = title_tm || '';

                document.querySelectorAll('input[name="categories_ru[]"]').forEach((input, index) => input.value =
                    categories.ru[index] || '');
                document.querySelectorAll('input[name="categories_en[]"]').forEach((input, index) => input.value =
                    categories.en[index] || '');
                document.querySelectorAll('input[name="categories_tm[]"]').forEach((input, index) => input.value =
                    categories.tm[index] || '');

                document.getElementById('serviceDiscount').value = discount || '';
                document.getElementById('servicePrice').value = price || '';

                ServiceModal.updateCharacterCounts();
            },
            close: function() {
                document.getElementById('serviceModal').classList.add('hidden');
                document.getElementById('serviceModalForm').reset();
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

        document.addEventListener('DOMContentLoaded', function() {

            ServiceModal.updateCharacterCounts();
        });
    </script>
    {{-- бирикс коробка --}}
    <script>
        const NewServiceModal = {
            open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {
                ru: [],
                en: [],
                tm: []
            }, discount = '', price = '') {
                const form = document.getElementById('newServiceModalForm');
                document.getElementById('newServiceModal').classList.remove('hidden');
                document.getElementById('newServiceModalTitle').innerText = action === 'add' ? 'Добавить запись' :
                    'Редактировать запись';

                form.action = action === 'add' ? "#" : `/new-services/${id}/update`;

                document.getElementById('newServiceFormMethod').value = action === 'add' ? 'POST' : 'PUT';
                document.getElementById('newServiceModalId').value = id || '';
                document.getElementById('newServiceTitleRu').value = title_ru || '';
                document.getElementById('newServiceTitleEn').value = title_en || '';
                document.getElementById('newServiceTitleTm').value = title_tm || '';

                document.querySelectorAll('input[name="categories_ru[]"]').forEach((input, index) => input.value =
                    categories.ru[index] || '');
                document.querySelectorAll('input[name="categories_en[]"]').forEach((input, index) => input.value =
                    categories.en[index] || '');
                document.querySelectorAll('input[name="categories_tm[]"]').forEach((input, index) => input.value =
                    categories.tm[index] || '');

                document.getElementById('newServiceDiscount').value = discount || '';
                document.getElementById('newServicePrice').value = price || '';

                NewServiceModal.updateCharacterCounts();
            },
            close: function() {
                document.getElementById('newServiceModal').classList.add('hidden');
                document.getElementById('newServiceModalForm').reset();
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

        document.addEventListener('DOMContentLoaded', function() {
            NewServiceModal.updateCharacterCounts();
        });
    </script>



@endsection
