@extends('layouts.dashboard')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <p class="base-text mb-10">О нас</p>
                <p class="base-text mb-10">Вступительный текст</p>

                {{-- Блок для уже сохранённых изображений из БД --}}
                @if (!empty($aboutUs->photos))
                    <p class="text-sm mb-2">Текущие фото:</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach (explode(',', $aboutUs->photos) as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="photo" class="w-32 h-auto rounded border" />
                        @endforeach
                    </div>
                @endif

                <div class="mb-6">
                    <label for="photos" class="block text-gray-700 font-medium mb-2">
                        Загрузить фотографии
                    </label>
                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                        class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
                        <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
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
                            <input type="text" id="title_ru" name="title_ru"
                                value="{{ old('title_ru', $aboutUs->title_ru) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="title_en" class="block text-gray-700 font-medium mb-1">
                                Title (EN):
                            </label>
                            <input type="text" id="title_en" name="title_en"
                                value="{{ old('title_en', $aboutUs->title_en) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                                Title (TM):
                            </label>
                            <input type="text" id="title_tm" name="title_tm"
                                value="{{ old('title_tm', $aboutUs->title_tm) }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
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
                            <textarea id="description_ru" name="description_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                            {{ old('description_ru', $aboutUs->description_ru) }}
                        </textarea>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="description_en" class="block text-gray-700 font-medium mb-1">
                                Description (EN):
                            </label>
                            <textarea id="description_en" name="description_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_en', $aboutUs->description_en) }}</textarea>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                                Description (TM):
                            </label>
                            <textarea id="description_tm" name="description_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_tm', $aboutUs->description_tm) }}</textarea>
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
                            <textarea id="additional_ru" name="additional_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                            {{ old('additional_ru', $aboutUs->additional_ru) }}
                        </textarea>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="additional_en" class="block text-gray-700 font-medium mb-1">
                                Additional info (EN):
                            </label>
                            <textarea id="additional_en" name="additional_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                            {{ old('additional_en', $aboutUs->additional_en) }}
                        </textarea>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="additional_tm" class="block text-gray-700 font-medium mb-1">
                                Additional info (TM):
                            </label>
                            <textarea id="additional_tm" name="additional_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                            {{ old('additional_tm', $aboutUs->additional_tm) }}
                        </textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
    {{-- ------------------------------------------------------ --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Принципы работы:</p>

            <!-- Таблица -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Изображение</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Описание</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($principles as $principle)
                        <tr>
                            <td class=" text-center border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($principle->photos)
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/' . $principle->photos) }}" alt="Изображение"
                                            class="h-12">
                                    </div>
                                @else
                                    Нет изображения
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $principle->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $principle->description_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center">
                                    <button class="text-orange-500 rounded"
                                        onclick="openEditModal({{ json_encode($principle) }})"> <i
                                            class="text-[20px] fa-solid fa-pencil"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form class="flex justify-center"
                                    action="{{ route('dashboard.principles.destroy', $principle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" text-red-600" onclick="return confirm('Вы уверены?')">
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
                <button id="addRowButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600"
                    onclick="openAddModal()">
                    + Добавить
                </button>
            </div>

            <!-- Модальное окно для добавления -->
            <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 class="text-xl mb-4">Добавить принцип</h2>
                    <form action="{{ route('dashboard.principles.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="title_ru" class="block font-semibold">Название (RU)</label>
                                <input required type="text" name="title_ru" id="title_ru" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="title_en" class="block font-semibold">Название (EN)</label>
                                <input required type="text" name="title_en" id="title_en" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="title_tm" class="block font-semibold">Название (TM)</label>
                                <input required type="text" name="title_tm" id="title_tm" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_ru" class="block font-semibold">Описание (RU)</label>
                                <textarea required name="description_ru" id="description_ru" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_en" class="block font-semibold">Описание (EN)</label>
                                <textarea required name="description_en" id="description_en" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_tm" class="block font-semibold">Описание (TM)</label>
                                <textarea required name="description_tm" id="description_tm" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div class="col-span-3">
                                <label for="image" class="block font-semibold">Изображение</label>
                                <input type="file" name="image" id="image" class="border p-2 w-full">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="closeAddModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Модальное окно для редактирования -->
            <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 class="text-xl mb-4">Редактировать принцип</h2>
                    <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="edit_title_ru" class="block font-semibold">Название (RU)</label>
                                <input required type="text" name="title_ru" id="edit_title_ru" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_title_en" class="block font-semibold">Название (EN)</label>
                                <input required type="text" name="title_en" id="edit_title_en" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_title_tm" class="block font-semibold">Название (TM)</label>
                                <input required type="text" name="title_tm" id="edit_title_tm" class="border p-2 w-full" maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_ru" class="block font-semibold">Описание (RU)</label>
                                <textarea required name="description_ru" id="edit_description_ru" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_en" class="block font-semibold">Описание (EN)</label>
                                <textarea required name="description_en" id="edit_description_en" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_tm" class="block font-semibold">Описание (TM)</label>
                                <textarea required name="description_tm" id="edit_description_tm" class="border p-2 w-full" maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div class="col-span-3">
                                <label for="edit_image" class="block font-semibold">Изображение</label>
                                <input type="file" name="image" id="edit_image" class="border p-2 w-full">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="closeEditModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    {{-- ------------------------------------- описание компаний----------------------------------------- --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="base-text mb-10">Описание компаний</p>
            <!-- Форма -->
            <form action="{{ route('dashboard.company-descriptions.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Указываем метод для обновления -->

                <!-- Загрузить фотографии -->
                <div class="mb-6">
                    <label for="photos" class="block text-gray-700 font-medium mb-2">
                        Загрузить фотографии
                    </label>
                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                        class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
                        <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                    @if (!empty($companyDescription->photos))
                        <div class="flex flex-wrap gap-2 mt-4">
                            @foreach (explode(',', $companyDescription->photos) as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo"
                                    class="w-32 h-auto rounded border">
                            @endforeach
                        </div>
                    @endif
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
                            <input type="text" id="title_ru" name="title_ru"
                                value="{{ $companyDescription->title_ru }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="150" placeholder="Максимально количество символов 150" required>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="title_en" class="block text-gray-700 font-medium mb-1">
                                Title (EN):
                            </label>
                            <input type="text" id="title_en" name="title_en"
                                value="{{ $companyDescription->title_en }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="150" placeholder="Максимально количество символов 150" required>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                                Title (TM):
                            </label>
                            <input type="text" id="title_tm" name="title_tm"
                                value="{{ $companyDescription->title_tm }}"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="150" placeholder="Максимально количество символов 150" required>
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
                            <textarea id="description_ru" name="description_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required>{{ $companyDescription->description_ru }}</textarea>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="description_en" class="block text-gray-700 font-medium mb-1">
                                Description (EN):
                            </label>
                            <textarea id="description_en" name="description_en" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required>{{ $companyDescription->description_en }}</textarea>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                                Description (TM):
                            </label>
                            <textarea id="description_tm" name="description_tm" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required>{{ $companyDescription->description_tm }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Сохранить
                </button>
            </form>

            <div class="p-4">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-5">

                    <!-- Форма -->
                    <form action="{{ route('dashboard.achievements.store_or_update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Верхний текст (3 языка) -->
                        <div class="mb-6">
                            <h3 class="text-md font-semibold mb-3">Наши достижения:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Русский -->
                                <div>
                                    <label for="top_text_ru" class="block text-gray-700 font-medium mb-1">
                                        Верхний текст (RU):
                                    </label>
                                    <textarea id="top_text_ru" name="top_text_ru" rows="3"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" placeholder="Допустимые символы 60" maxlength="60" required>{{ old('top_text_ru', $achievement->top_text_ru) }}</textarea>
                                </div>

                                <!-- Английский -->
                                <div>
                                    <label for="top_text_en" class="block text-gray-700 font-medium mb-1">
                                        Top Text (EN):
                                    </label>
                                    <textarea id="top_text_en" name="top_text_en" rows="3"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required placeholder="Допустимые символы 60" maxlength="60">{{ old('top_text_en', $achievement->top_text_en) }}</textarea>
                                </div>

                                <!-- Туркменский -->
                                <div>
                                    <label for="top_text_tm" class="block text-gray-700 font-medium mb-1">
                                        Top Text (TM):
                                    </label>
                                    <textarea id="top_text_tm" name="top_text_tm" rows="3"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required placeholder="Допустимые символы 60" maxlength="60">{{ old('top_text_tm', $achievement->top_text_tm) }}</textarea>
                                </div>
                            </div>
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
                                    <input type="text" id="title_ru" name="title_ru"
                                        value="{{ old('title_ru', $achievement->title_ru) }}"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" placeholder="Допустимые символы 100" maxlength="100" required>
                                </div>

                                <!-- Английский -->
                                <div>
                                    <label for="title_en" class="block text-gray-700 font-medium mb-1">
                                        Title (EN):
                                    </label>
                                    <input type="text" id="title_en" name="title_en"
                                        value="{{ old('title_en', $achievement->title_en) }}"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" placeholder="Допустимые символы 100" maxlength="100" required>
                                </div>

                                <!-- Туркменский -->
                                <div>
                                    <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                                        Title (TM):
                                    </label>
                                    <input type="text" id="title_tm" name="title_tm"
                                        value="{{ old('title_tm', $achievement->title_tm) }}"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" placeholder="Допустимые символы 100" maxlength="100" required>
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
                                    <textarea id="description_ru" name="description_ru" rows="4"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required placeholder="Допустимые символы 150" maxlength="150">{{ old('description_ru', $achievement->description_ru) }}</textarea>
                                </div>

                                <!-- Английский -->
                                <div>
                                    <label for="description_en" class="block text-gray-700 font-medium mb-1">
                                        Description (EN):
                                    </label>
                                    <textarea id="description_en" name="description_en" rows="4"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required placeholder="Допустимые символы 150" maxlength="150">{{ old('description_en', $achievement->description_en) }}</textarea>
                                </div>

                                <!-- Туркменский -->
                                <div>
                                    <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                                        Description (TM):
                                    </label>
                                    <textarea id="description_tm" name="description_tm" rows="4"
                                        class="border-2 border-dashed border-gray-300 p-2 w-full rounded" required placeholder="Допустимые символы 150" maxlength="150">{{ old('description_tm', $achievement->description_tm) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Сохранить
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    {{-- -----------------------------------------------------Руководство------------------------------------------------------- --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Руководство:</p>

            <!-- Таблица -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Фото</th>
                        <th class="border border-gray-300 px-4 py-2">Должность</th>
                        <th class="border border-gray-300 px-4 py-2">ФИО</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="text-center border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($employee->photo)
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Фото сотрудника"
                                            class="h-12">
                                    </div>
                                @else
                                    Нет фото
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->position_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->name_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center">
                                    <button class="text-orange-500 rounded"
                                        onclick="openEmployeeEditModal({{ json_encode($employee) }})">
                                        <i class="text-[20px] fa-solid fa-pencil"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form class="flex justify-center"
                                    action="{{ route('dashboard.employees.destroy', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Вы уверены?')">
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
                <button id="addEmployeeButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600"
                    onclick="openEmployeeAddModal()">
                    + Добавить
                </button>
            </div>

            <!-- Модальное окно для добавления -->
            <div id="employeeAddModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 class="text-xl mb-4">Добавить сотрудника</h2>
                    <form action="{{ route('dashboard.employees.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="position_ru" class="block font-semibold">Должность (RU)</label>
                                <input type="text" id="position_ru" name="position_ru" class="border p-2 w-full"
                                    required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="position_en" class="block font-semibold">Position (EN)</label>
                                <input type="text" id="position_en" name="position_en" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="position_tm" class="block font-semibold">Position (TM)</label>
                                <input type="text" id="position_tm" name="position_tm" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="name_ru" class="block font-semibold">ФИО (RU)</label>
                                <input type="text" id="name_ru" name="name_ru" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="name_en" class="block font-semibold">Name (EN)</label>
                                <input type="text" id="name_en" name="name_en" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="name_tm" class="block font-semibold">Name (TM)</label>
                                <input type="text" id="name_tm" name="name_tm" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div class="col-span-3">
                                <label for="photo" class="block font-semibold">Фото</label>
                                <input type="file" id="photo" name="photo" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="closeEmployeeAddModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Модальное окно для редактирования -->
            <div id="employeeEditModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 class="text-xl mb-4">Редактировать сотрудника</h2>
                    <form id="employeeEditForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_employee_id" name="employee_id">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="edit_position_ru" class="block font-semibold">Должность (RU)</label>
                                <input type="text" id="edit_position_ru" name="position_ru" class="border p-2 w-full"
                                    required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div> 
                                <label for="edit_position_en" class="block font-semibold">Position (EN)</label>
                                <input type="text" id="edit_position_en" name="position_en"
                                    class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="edit_position_tm" class="block font-semibold">Position (TM)</label>
                                <input type="text" id="edit_position_tm" name="position_tm"
                                    class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="edit_name_ru" class="block font-semibold">ФИО (RU)</label>
                                <input type="text" id="edit_name_ru" name="name_ru" class="border p-2 w-full"
                                required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="edit_name_en" class="block font-semibold">Name (EN)</label>
                                <input type="text" id="edit_name_en" name="name_en" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div>
                                <label for="edit_name_tm" class="block font-semibold">Name (TM)</label>
                                <input type="text" id="edit_name_tm" name="name_tm" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                            </div>
                            <div class="col-span-3">
                                <label for="edit_photo" class="block font-semibold">Фото</label>
                                <input type="file" id="edit_photo" name="photo" class="border p-2 w-full" required maxlength="200" placeholder="Допустимое количество символов 200">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="closeEmployeeEditModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    {{-- --------------------------------- --}}
    <!-- Отображение загруженных сертификатов -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <form action="{{ route('aboutus.saveCertificates') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4">
                    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <p class="base-text mb-10">Сертификаты:</p>
                        <div class="mb-6">
                            <label for="photos" class="block text-gray-700 font-medium mb-2">
                                Загрузить фотографии
                            </label>

                            <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                                class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
                            <!-- Контейнер для предпросмотра новых файлов -->
                            <div id="preview-container" class="flex flex-wrap gap-2 mt-4"></div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mt-4">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="p-4">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                    <h2 class="base-text mb-4">Ваши сертификаты:</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-10 gap-4">
                        @foreach ($certificates as $certificate)
                            <div class="relative" id="certificate-{{ $certificate->id }}">
                                <div class="flex flex-col justify-center items-center">
                                    <a href="{{ asset('storage/' . $certificate->photo_path) }}" data-lightbox="certificates"
                                        data-title="Сертификат">
                                        <img src="{{ asset('storage/' . $certificate->photo_path) }}" alt="Сертификат"
                                            class="object-cover w-full h-32 rounded">
                                    </a>
                                    <!-- Кнопка удаления -->
                                    <form action="{{ route('aboutus.deleteCertificate', $certificate->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот сертификат?')" class="mt-[10px] bg-red-500 text-white rounded-full w-[30px] h-[30px] hover:bg-red-600">
                                            &times;
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Пагинация -->
            @if ($certificates->hasPages())
                <div class="mt-4">
                    {{ $certificates->links() }}
                </div>
            @endif
        </div>
    </div>



    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(principle) {

            document.getElementById('editModal').classList.remove('hidden');


            const editForm = document.getElementById('editForm');
            editForm.action = `{{ route('dashboard.principles.update', ':id') }}`.replace(':id', principle.id);


            document.getElementById('edit_title_ru').value = principle.title_ru || '';
            document.getElementById('edit_title_en').value = principle.title_en || '';
            document.getElementById('edit_title_tm').value = principle.title_tm || '';
            document.getElementById('edit_description_ru').value = principle.description_ru || '';
            document.getElementById('edit_description_en').value = principle.description_en || '';
            document.getElementById('edit_description_tm').value = principle.description_tm || '';
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photosInput = document.getElementById('photos');
            const previewContainer = document.getElementById('preview-container');

            if (photosInput && previewContainer) {
                photosInput.addEventListener('change', function() {
                    // Очищаем старые превью
                    previewContainer.innerHTML = '';

                    // Превращаем FileList в массив, чтобы перебрать
                    Array.from(photosInput.files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Создаём элемент img и подставляем превью
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('w-32', 'h-auto', 'rounded', 'border',
                                'object-cover');
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            }
        });
    </script>

    <script>
        // Функции для управления модальными окнами добавления
        function openEmployeeAddModal() {
            document.getElementById('employeeAddModal').classList.remove('hidden');
        }

        function closeEmployeeAddModal() {
            document.getElementById('employeeAddModal').classList.add('hidden');
        }

        // Функции для управления модальными окнами редактирования
        function openEmployeeEditModal(employee) {
            // Заполняем форму данными сотрудника
            document.getElementById('edit_position_ru').value = employee.position_ru;
            document.getElementById('edit_position_en').value = employee.position_en;
            document.getElementById('edit_position_tm').value = employee.position_tm;
            document.getElementById('edit_name_ru').value = employee.name_ru;
            document.getElementById('edit_name_en').value = employee.name_en;
            document.getElementById('edit_name_tm').value = employee.name_tm;

            // Устанавливаем действие формы
            let form = document.getElementById('employeeEditForm');
            form.action = "{{ url('dashboard/employees') }}/" + employee.id;

            // Показываем модальное окно
            document.getElementById('employeeEditModal').classList.remove('hidden');
        }

        function closeEmployeeEditModal() {
            document.getElementById('employeeEditModal').classList.add('hidden');
        }
    </script>


    <script>
        document.getElementById('photos').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // Очистить предыдущие превью

            const files = event.target.files;

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) {
                    return
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-24', 'h-24', 'object-cover', 'rounded');
                    previewContainer.appendChild(img);
                }

                reader.readAsDataURL(file);
            });
        });
    </script>

@endsection
