@extends('layouts.dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <p class="base-text mb-10">Веб разработка</p>
            <p class="base-text mb-10">Стартовый текст и изображение:</p>

            <form action="{{ route('web.store') }}" method="POST" enctype="multipart/form-data">
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
                    @if ($web->photos && count($web->photos) > 0)
                        <div class="mt-4">
                            <h4 class="text-md font-semibold mb-2">Существующие фотографии:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($web->photos as $photo)
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
                                value="{{ old('title_ru', $web->title_ru) }}"
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
                                value="{{ old('title_en', $web->title_en) }}"
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
                                value="{{ old('title_tm', $web->title_tm) }}"
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
                            <label for="categories_ru" class="block text-gray-700 font-medium mb-1">
                                Описание (RU):
                            </label>
                            <textarea id="categories_ru" name="categories_ru" rows="4"
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_ru', $web->categories_ru) }}</textarea>
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
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_en', $web->categories_en) }}</textarea>
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
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_tm', $web->categories_tm) }}</textarea>
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
    {{-- ------------------------------------------------------------------------------------------------------- --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Услуги веб разработок:</p>

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
                    @foreach ($services as $index => $itom)
                        <tr>
                            <!-- Вывод порядкового номера строки -->
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <!-- Остальные данные -->
                            <td class="border border-gray-300 px-4 py-2">{{ $itom->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $itom->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $itom->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $itom->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $itom->discount }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $itom->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button class="service-edit-button text-orange-500" data-id="{{ $itom->id }}"
                                    data-title_ru="{{ addslashes($itom->title_ru) }}"
                                    data-title_en="{{ addslashes($itom->title_en) }}"
                                    data-title_tm="{{ addslashes($itom->title_tm) }}"
                                    data-categories_ru="{{ json_encode($itom->categories_ru ?? []) }}"
                                    data-categories_en="{{ json_encode($itom->categories_en ?? []) }}"
                                    data-categories_tm="{{ json_encode($itom->categories_tm ?? []) }}"
                                    data-discount="{{ $itom->discount !== null ? $itom->discount : 'null' }}"
                                    data-price="{{ $itom->price !== null ? $itom->price : 'null' }}">
                                    <i class="text-[20px] fa-solid fa-pencil"></i>
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('web-services.destroy', $itom->id) }}" method="POST"
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

    {{-- ------------------------------------------------------------------------ --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Этапы реализаций:</p>

            <!-- Таблица -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-60">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (RU)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (EN)</th>
                        <th class="border border-gray-300 px-4 py-2">Категории (TM)</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody id="implementationStagesTableBody">
                    @foreach ($implementationStages as $index => $stage)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $stage->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $stage->categories_ru ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $stage->categories_en ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[150px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $stage->categories_tm ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button class="text-orange-500 edit-button" data-id="{{ $stage->id }}"
                                    data-title_ru="{{ addslashes($stage->title_ru) }}"
                                    data-title_en="{{ addslashes($stage->title_en) }}"
                                    data-title_tm="{{ addslashes($stage->title_tm) }}"
                                    data-categories_ru='@json($stage->categories_ru ?? [])'
                                    data-categories_en='@json($stage->categories_en ?? [])'
                                    data-categories_tm='@json($stage->categories_tm ?? [])'>
                                    <i class="text-[20px] fa-solid fa-pencil"></i>
                                </button>
                            </td>


                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('web-implementation-stages.destroy', $stage->id) }}"
                                    method="POST"
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
                <button onclick="ImplementationStagesModal.open('add')"
                    class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                    + Добавить запись
                </button>
            </div>

            <!-- Модальное окно -->
            <div id="implementationStagesModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                    <h2 id="implementationStagesModalTitle" class="text-xl mb-4"></h2>
                    <form id="implementationStagesModalForm" method="POST" action="#"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="implementationStagesFormMethod" value="POST">
                        <input type="hidden" id="implementationStagesModalId" name="id">

                        <!-- Поля Названия -->
                        <div class="flex gap-4 mb-4">
                            <div class="w-1/3">
                                <label for="implementationStageTitleRu" class="block mb-1 font-semibold">Название
                                    (RU):</label>
                                <input type="text" id="implementationStageTitleRu" name="title_ru"
                                    placeholder="Введите название (RU)" class="border p-2 w-full" maxlength="60"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="implementationStageTitleEn" class="block mb-1 font-semibold">Название
                                    (EN):</label>
                                <input type="text" id="implementationStageTitleEn" name="title_en"
                                    placeholder="Введите название (EN)" class="border p-2 w-full" maxlength="60">
                                <p class="text-xs text-gray-500 mt-1">60 символов осталось</p>
                            </div>
                            <div class="w-1/3">
                                <label for="implementationStageTitleTm" class="block mb-1 font-semibold">Название
                                    (TM):</label>
                                <input type="text" id="implementationStageTitleTm" name="title_tm"
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
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 1 (EN)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 1 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 1 (TM)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 2 -->
                            <div class="flex gap-4 mb-2">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 2 (RU)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 2 (EN)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 2 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 2 (TM)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                            </div>

                            <!-- Категория 3 -->
                            <div class="flex gap-4">
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (RU):</label>
                                    <input type="text" name="categories_ru[]" placeholder="Введите категорию 3 (RU)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (EN):</label>
                                    <input type="text" name="categories_en[]" placeholder="Введите категорию 3 (EN)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                                <div class="w-1/3">
                                    <label class="block mb-1 font-semibold">Категория 3 (TM):</label>
                                    <input type="text" name="categories_tm[]" placeholder="Введите категорию 3 (TM)"
                                        class="border p-2 w-full" maxlength="100">
                                    <p class="text-xs text-gray-500 mt-1">100 символов осталось</p>
                                </div>
                            </div>
                        </div>


                        <!-- Кнопки -->
                        <div class="flex justify-end">
                            <button type="button" onclick="ImplementationStagesModal.close()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Отмена
                            </button>
                            <button type="submit" id="implementationStagesModalSubmitButton"
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
                        form.action = `/web-services/${id}/update`; // Убедитесь, что маршрут корректен
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
                        form.action = "{{ route('web-services.store') }}"; // Убедитесь, что маршрут корректен
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

    {{-- этапы реализаций --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title_ru = this.getAttribute('data-title_ru');
                    const title_en = this.getAttribute('data-title_en');
                    const title_tm = this.getAttribute('data-title_tm');
                    const categories_ru = JSON.parse(this.getAttribute('data-categories_ru'));
                    const categories_en = JSON.parse(this.getAttribute('data-categories_en'));
                    const categories_tm = JSON.parse(this.getAttribute('data-categories_tm'));

                    ImplementationStagesModal.open('edit', id, title_ru, title_en, title_tm, {
                        ru: categories_ru,
                        en: categories_en,
                        tm: categories_tm
                    });
                });
            });
        });

        const ImplementationStagesModal = {
            open: function(action, id = null, title_ru = '', title_en = '', title_tm = '', categories = {}) {
                const modal = document.getElementById('implementationStagesModal');
                const modalTitle = document.getElementById('implementationStagesModalTitle');
                const form = document.getElementById('implementationStagesModalForm');
                const methodInput = document.getElementById('implementationStagesFormMethod');
                const idInput = document.getElementById('implementationStagesModalId');

                try {
                    if (action === 'edit') {
                        modalTitle.textContent = 'Редактировать запись';
                        methodInput.value = 'PUT';
                        form.action = `/web-implementation-stages/${id}/update`; // Исправлено здесь
                        idInput.value = id;

                        // Заполнение полей данными
                        document.getElementById('implementationStageTitleRu').value = title_ru || '';
                        document.getElementById('implementationStageTitleEn').value = title_en || '';
                        document.getElementById('implementationStageTitleTm').value = title_tm || '';

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

                    } else if (action === 'add') {
                        modalTitle.textContent = 'Добавить новую запись';
                        methodInput.value = 'POST';
                        form.action = `/web-implementation-stages/store`;
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
                } catch (error) {
                    console.error('Ошибка при открытии модального окна:', error);
                }
            },
            close: function() {
                const modal = document.getElementById('implementationStagesModal');
                modal.classList.add('hidden');
            }
        };

        // Закрытие модального окна при клике вне его
        window.onclick = function(event) {
            const modal = document.getElementById('implementationStagesModal');
            if (event.target == modal) {
                modal.classList.add('hidden');
            }
        }
    </script>


@endsection
