@extends('layouts.dashboard')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <p class="base-text mb-10">Блог</p>
                <p class="base-text mb-10">Вступительный текст</p>

                {{-- Блок для уже сохранённых изображений из БД --}}
                @if (!empty($blog->photos))
                    <p class="text-sm mb-2">Текущие фото:</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach (explode(',', $blog->photos) as $photo)
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
                            <input type="text" id="title_ru" name="title_ru" value="{{ old('title_ru', $blog->title_ru) }}" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="50" placeholder="Допустимое количество символов 50">
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="title_en" class="block text-gray-700 font-medium mb-1">
                                Title (EN):
                            </label>
                            <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $blog->title_en) }}" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="50" placeholder="Допустимое количество символов 50">
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                                Title (TM):
                            </label>
                            <input type="text" id="title_tm" name="title_tm" value="{{ old('title_tm', $blog->title_tm) }}" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="50" placeholder="Допустимое количество символов 50">
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
                            <textarea id="description_ru" name="description_ru" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">
                        {{ old('description_ru', $blog->description_ru) }}
                    </textarea>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="description_en" class="block text-gray-700 font-medium mb-1">
                                Description (EN):
                            </label>
                            <textarea id="description_en" name="description_en" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">{{ old('description_en', $blog->description_en) }}</textarea>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                                Description (TM):
                            </label>
                            <textarea id="description_tm" name="description_tm" class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">{{ old('description_tm', $blog->description_tm) }}</textarea>
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
                            <textarea id="additional_ru" name="additional_ru" 
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">
                        {{ old('additional_ru', $blog->additional_ru) }}
                    </textarea>
                        </div>

                        <!-- Английский -->
                        <div>
                            <label for="additional_en" class="block text-gray-700 font-medium mb-1">
                                Additional info (EN):
                            </label>
                            <textarea id="additional_en" name="additional_en" 
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">
                        {{ old('additional_en', $blog->additional_en) }}
                    </textarea>
                        </div>

                        <!-- Туркменский -->
                        <div>
                            <label for="additional_tm" class="block text-gray-700 font-medium mb-1">
                                Additional info (TM):
                            </label>
                            <textarea id="additional_tm" name="additional_tm" 
                                class="border-2 border-dashed border-gray-300 p-2 w-full rounded" maxlength="200" placeholder="Допустимое количество символов 200">
                        {{ old('additional_tm', $blog->additional_tm) }}
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

    {{-- таблица блогов --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-lg font-semibold mb-4">Добавление постов</p>

            <!-- Сообщение об успехе -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif



            <!-- Таблица -->
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Изображение</th>
                        <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                        <th class="border border-gray-300 px-4 py-2">Описание</th>
                        <th class="border border-gray-300 px-4 py-2">Дата</th>
                        <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                        <th class="border border-gray-300 px-4 py-2">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogstore as $blogstores)
                        <tr>
                            <td class=" text-center border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($blogstores->photos)
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/' . $blogstores->photos) }}" alt="Изображение"
                                            class="h-12">
                                    </div>
                                @else
                                    Нет изображения
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $blogstores->title_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[200px] overflow-x-auto">{{ $blogstores->description_ru }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[200px] overflow-x-auto">{{ $blogstores->published_date }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center">
                                    <button class="text-orange-500 rounded"
                                        onclick="openEditModal({{ json_encode($blogstores) }})"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="orange">
                                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                          </svg>
                                          
                                    </button>
                                </div>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form class="flex justify-center"
                                    action="{{ route('dashboard.blog.destroy', $blogstores->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" text-red-600" onclick="return confirm('Вы уверены?')">
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
                    <form action="{{ route('dashboard.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="title_ru" class="block font-semibold">Название (RU)</label>
                                <input type="text" name="title_ru" id="title_ru" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="title_en" class="block font-semibold">Название (EN)</label>
                                <input type="text" name="title_en" id="title_en" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="title_tm" class="block font-semibold">Название (TM)</label>
                                <input type="text" name="title_tm" id="title_tm" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_ru" class="block font-semibold">Описание (RU)</label>
                                <textarea name="description_ru" id="description_ru" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_en" class="block font-semibold">Описание (EN)</label>
                                <textarea name="description_en" id="description_en" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="description_tm" class="block font-semibold">Описание (TM)</label>
                                <textarea name="description_tm" id="description_tm" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="additional_ru" class="block font-semibold">Дополнительно (RU)</label>
                                <textarea name="additional_ru" id="additional_ru" class="border p-2 w-full" required></textarea>
                            </div>
                            <div>
                                <label for="additional_en" class="block font-semibold">Дополнительно (EN)</label>
                                <textarea name="additional_en" id="additional_en" class="border p-2 w-full" required></textarea>
                            </div>
                            <div>
                                <label for="additional_tm" class="block font-semibold">Дополнительно (TM)</label>
                                <textarea name="additional_tm" id="additional_tm" class="border p-2 w-full" required></textarea>
                            </div>

                            <div>
                                <label for="published_date" class="block font-semibold">Дата публикации</label>
                                <input type="date" name="published_date" id="published_date" class="border p-2 w-full">
                            </div>
                            
                            <div class="col-span-3">
                                <label for="image" class="block font-semibold">Изображение</label>
                                <input type="file" name="image" id="image" class="border p-2 w-full">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
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
                    <h2 class="text-xl mb-4">Редактировать принцип</h2>
                    <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="edit_title_ru" class="block font-semibold">Название (RU)</label>
                                <input type="text" name="title_ru" id="edit_title_ru" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_title_en" class="block font-semibold">Название (EN)</label>
                                <input type="text" name="title_en" id="edit_title_en" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_title_tm" class="block font-semibold">Название (TM)</label>
                                <input type="text" name="title_tm" id="edit_title_tm" class="border p-2 w-full" required maxlength="50">
                                <p class="text-xs text-gray-500 mt-1">50 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_ru" class="block font-semibold">Описание (RU)</label>
                                <textarea name="description_ru" id="edit_description_ru" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_en" class="block font-semibold">Описание (EN)</label>
                                <textarea name="description_en" id="edit_description_en" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
                            </div>
                            <div>
                                <label for="edit_description_tm" class="block font-semibold">Описание (TM)</label>
                                <textarea name="description_tm" id="edit_description_tm" class="border p-2 w-full" required maxlength="200"></textarea>
                                <p class="text-xs text-gray-500 mt-1">200 символов осталось</p>
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
                            <div>
                                <label for="edit_published_date" class="block font-semibold">Дата публикации</label>
                                <input type="date" name="published_date" id="edit_published_date" class="border p-2 w-full">
                            </div>
                            
                            <div class="col-span-3">
                                <label for="edit_image" class="block font-semibold">Изображение</label>
                                <input type="file" name="image" id="edit_image" class="border p-2 w-full">
                                <p class="text-xs text-gray-500 mt-1" id="categoriesEn3Count">Размер изображений не должен превышать 5 мб</p>
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
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
            updateCharacterCounts();
        }
    
        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }
    
        function openEditModal(principle) {
            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
    
            const editForm = document.getElementById('editForm');
            editForm.action = `{{ route('dashboard.blog.update', ':id') }}`.replace(':id', principle.id);
            document.getElementById('edit_title_ru').value = principle.title_ru || '';
            document.getElementById('edit_title_en').value = principle.title_en || '';
            document.getElementById('edit_title_tm').value = principle.title_tm || '';
            document.getElementById('edit_description_ru').value = principle.description_ru || '';
            document.getElementById('edit_description_en').value = principle.description_en || '';
            document.getElementById('edit_description_tm').value = principle.description_tm || '';
            document.getElementById('edit_additional_ru').value = principle.additional_ru || '';
            document.getElementById('edit_additional_en').value = principle.additional_en || '';
            document.getElementById('edit_additional_tm').value = principle.additional_tm || '';
            document.getElementById('edit_published_date').value = principle.published_date || '';
    
            // Обновление счетчиков символов после заполнения формы
            updateCharacterCounts();
        }
    
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    
        function updateCharacterCounts() {
            document.querySelectorAll('input[maxlength], textarea[maxlength]').forEach(input => {
                const counter = input.nextElementSibling;
                if (counter && counter.tagName.toLowerCase() === 'p') {
                    updateCharacterCount(input, counter);
                    input.addEventListener('input', () => updateCharacterCount(input, counter));
                }
            });
        }
    
        function updateCharacterCount(input, counter) {
            const maxLength = parseInt(input.getAttribute('maxlength'), 10);
            const remaining = maxLength - input.value.length;
            counter.textContent = `${remaining} символов осталось`;
        }
    </script>
    
@endsection
