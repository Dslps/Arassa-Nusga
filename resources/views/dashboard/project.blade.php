@extends('layouts.dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-100 border-dashed rounded-lg dark:border-gray-700 mt-14">

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p class="base-text mb-10">Проекты</p>
            <p class="base-text mb-10">Вступительный текст</p>

            {{-- Блок для уже сохранённых изображений из БД --}}
            @if (!empty($project->photos))
                <p class="text-sm mb-2">Текущие фото:</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach (explode(',', $project->photos) as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="photo" class="w-32 h-auto rounded border" />
                    @endforeach
                </div>
            @endif

            <div class="mb-6">
                <label for="photos" class="block text-gray-700 font-medium mb-2">
                    Загрузить фотографии
                </label>
                <input type="file" id="photos" name="photos[]" accept="image/*" multiple class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
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
                            value="{{ old('title_ru', $project->title_ru) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="title_en" class="block text-gray-700 font-medium mb-1">
                            Title (EN):
                        </label>
                        <input type="text" id="title_en" name="title_en"
                            value="{{ old('title_en', $project->title_en) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="255">
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                            Title (TM):
                        </label>
                        <input type="text" id="title_tm" name="title_tm"
                            value="{{ old('title_tm', $project->title_tm) }}"
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
                    {{ old('description_ru', $project->description_ru) }}
                </textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="description_en" class="block text-gray-700 font-medium mb-1">
                            Description (EN):
                        </label>
                        <textarea id="description_en" name="description_en" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_en', $project->description_en) }}</textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                            Description (TM):
                        </label>
                        <textarea id="description_tm" name="description_tm" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('description_tm', $project->description_tm) }}</textarea>
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
                    {{ old('additional_ru', $project->additional_ru) }}
                </textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="additional_en" class="block text-gray-700 font-medium mb-1">
                            Additional info (EN):
                        </label>
                        <textarea id="additional_en" name="additional_en" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                    {{ old('additional_en', $project->additional_en) }}
                </textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="additional_tm" class="block text-gray-700 font-medium mb-1">
                            Additional info (TM):
                        </label>
                        <textarea id="additional_tm" name="additional_tm" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">
                    {{ old('additional_tm', $project->additional_tm) }}
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

{{-- --------------------------------------------------------------------- --}}

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-100 border-dashed rounded-lg dark:border-gray-700">
        <p class="text-lg font-semibold mb-4">Добавление постов</p>

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
                @foreach ($projectstore as $projectstores)
                    <tr>
                        <td class=" text-center border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($projectstores->photos)
                                <div class="flex justify-center">
                                    <img src="{{ asset('storage/' . $projectstores->photos) }}" alt="Изображение"
                                        class="h-12">
                                </div>
                            @else
                                Нет изображения
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $projectstores->title_ru }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $projectstores->description_ru }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center">
                                <button class="text-orange-500 rounded"
                                    onclick="openEditModal({{ json_encode($projectstores) }})"> <i
                                        class="text-[20px] fa-solid fa-pencil"></i>
                                </button>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form class="flex justify-center"
                                action="{{ route('dashboard.project.destroy', $projectstores->id) }}" method="POST">
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

        <div class="flex justify-center mt-4">
            <button id="addRowButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600"
                onclick="openAddModal()">
                + Добавить
            </button>
        </div>


        <!-- Модальное окно для добавления -->
        <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                <h2 class="text-xl mb-4">Добавить пост</h2>
                <form action="{{ route('dashboard.project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="title_ru" class="block font-semibold">Название (RU)</label>
                            <input type="text" name="title_ru" id="title_ru" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="title_en" class="block font-semibold">Название (EN)</label>
                            <input type="text" name="title_en" id="title_en" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="title_tm" class="block font-semibold">Название (TM)</label>
                            <input type="text" name="title_tm" id="title_tm" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="description_ru" class="block font-semibold">Описание (RU)</label>
                            <textarea name="description_ru" id="description_ru" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="description_en" class="block font-semibold">Описание (EN)</label>
                            <textarea name="description_en" id="description_en" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="description_tm" class="block font-semibold">Описание (TM)</label>
                            <textarea name="description_tm" id="description_tm" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="additional_ru" class="block font-semibold">Дополнительно (RU)</label>
                            <textarea name="additional_ru" id="additional_ru" class="border p-2 w-full" ></textarea>
                        </div>
                        <div>
                            <label for="additional_en" class="block font-semibold">Дополнительно (EN)</label>
                            <textarea name="additional_en" id="additional_en" class="border p-2 w-full" ></textarea>
                        </div>
                        <div>
                            <label for="additional_tm" class="block font-semibold">Дополнительно (TM)</label>
                            <textarea name="additional_tm" id="additional_tm" class="border p-2 w-full" ></textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="image" class="block font-semibold">Изображение</label>
                            <input type="file" name="image" id="image" class="border p-2 w-full">
                            <p class="text-xs text-gray-500 mt-1">Размер не должен превышать 8 мегабайт</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeAddModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                            Отмена
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Модальное окно для редактирования -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded shadow-lg w-3/4 max-w-4xl">
                <h2 class="text-xl mb-4">Редактировать пост</h2>
                <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editId">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="edit_title_ru" class="block font-semibold">Название (RU)</label>
                            <input type="text" name="title_ru" id="edit_title_ru" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_title_en" class="block font-semibold">Название (EN)</label>
                            <input type="text" name="title_en" id="edit_title_en" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_title_tm" class="block font-semibold">Название (TM)</label>
                            <input type="text" name="title_tm" id="edit_title_tm" class="border p-2 w-full" required maxlength="25">
                            <p class="text-xs text-gray-500 mt-1">25 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_description_ru" class="block font-semibold">Описание (RU)</label>
                            <textarea name="description_ru" id="edit_description_ru" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_description_en" class="block font-semibold">Описание (EN)</label>
                            <textarea name="description_en" id="edit_description_en" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_description_tm" class="block font-semibold">Описание (TM)</label>
                            <textarea name="description_tm" id="edit_description_tm" class="border p-2 w-full" required maxlength="50"></textarea>
                            <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                        </div>
                        <div>
                            <label for="edit_additional_ru" class="block font-semibold">Дополнительно (RU)</label>
                            <textarea name="additional_ru" id="edit_additional_ru" class="border p-2 w-full" required></textarea>
                        </div>
                        <div>
                            <label for="edit_additional_en" class="block font-semibold">Дополнительно (EN)</label>
                            <textarea name="additional_en" id="edit_additional_en" class="border p-2 w-full" required></textarea>
                        </div>
                        <div>
                            <label for="edit_additional_tm" class="block font-semibold">Дополнительно (TM)</label>
                            <textarea name="additional_tm" id="edit_additional_tm" class="border p-2 w-full" required></textarea>
                        </div>

                        <div class="col-span-3">
                            <label for="edit_image" class="block font-semibold">Изображение</label>
                            <input type="file" name="image" id="edit_image" class="border p-2 w-full">
                            <p class="text-xs text-gray-500 mt-1">Размер не должен превышать 5 мегабайт</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeEditModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                            Отмена
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>


<script>
    // Открыть модалку для добавления
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        updateCharacterCounts();
    }

    // Закрыть модалку для добавления
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    // Открыть модалку для редактирования
    function openEditModal(principle) {
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');

        const editForm = document.getElementById('editForm');
        // Формируем action
        editForm.action = `{{ route('dashboard.project.update', ':id') }}`.replace(':id', principle.id);
        // Заполняем поля
        document.getElementById('edit_title_ru').value = principle.title_ru || '';
        document.getElementById('edit_title_en').value = principle.title_en || '';
        document.getElementById('edit_title_tm').value = principle.title_tm || '';
        document.getElementById('edit_description_ru').value = principle.description_ru || '';
        document.getElementById('edit_description_en').value = principle.description_en || '';
        document.getElementById('edit_description_tm').value = principle.description_tm || '';
        // Новые поля additional
        document.getElementById('edit_additional_ru').value = principle.additional_ru || '';
        document.getElementById('edit_additional_en').value = principle.additional_en || '';
        document.getElementById('edit_additional_tm').value = principle.additional_tm || '';

        // Обновление счетчиков символов после заполнения формы
        updateCharacterCounts();
    }

    // Закрыть модалку для редактирования
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Обновление счетчиков символов для всех полей с maxlength
    function updateCharacterCounts() {
        document.querySelectorAll('input[maxlength], textarea[maxlength]').forEach(input => {
            const counter = input.nextElementSibling;
            if (counter && counter.tagName.toLowerCase() === 'p') {
                updateCharacterCount(input, counter);
                input.addEventListener('input', () => updateCharacterCount(input, counter));
            }
        });
    }

    // Обновление счетчика символов для конкретного поля
    function updateCharacterCount(input, counter) {
        const maxLength = parseInt(input.getAttribute('maxlength'), 10);
        const remaining = maxLength - input.value.length;
        counter.textContent = `${remaining} символов осталось`;
    }
</script>

@endsection