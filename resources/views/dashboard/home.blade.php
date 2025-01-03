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



                            <td class="border border-gray-300 px-4 py-2">{{ $slide->title }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{ $slide->description }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button
                                    onclick="openEditModal({{ $slide->id }}, '{{ $slide->title }}', '{{ $slide->description }}')"
                                    class=" text-orange-500">
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
            <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-8 rounded shadow-lg w-1/3">
                    <h2 id="modalTitle" class="text-xl mb-4">Добавить запись</h2>
                    <form id="modalForm" action="{{ route('home-dash.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST"> <!-- По умолчанию POST -->
                        <input type="hidden" id="modalId" name="id">

                        <!-- Поле Название -->
                        <div class="mb-4">
                            <label for="title" class="block mb-1">Название:</label>
                            <input type="text" id="title" name="title" placeholder="Введите название"
                                class="border p-2 w-full" maxlength="30" required>
                            <small id="titleWarning" class="text-red-500 hidden">Превышено ограничение в 20
                                символов!</small>
                            <small id="titleCount" class="text-gray-500">Осталось символов: 20</small>
                        </div>

                        <!-- Поле Описание -->
                        <div class="mb-4">
                            <label for="description" class="block mb-1">Описание:</label>
                            <textarea id="description" name="description" placeholder="Введите описание" class="border p-2 w-full" rows="3"></textarea>
                            <small id="descriptionWarning" class="text-red-500 hidden">Превышено ограничение в 200
                                символов!</small>
                            <small id="descriptionCount" class="text-gray-500">Осталось символов: 200</small>
                        </div>

                        <!-- Поле Изображение -->
                        <div class="mb-4">
                            <label for="image" class="block mb-1">Изображение:</label>
                            <input type="file" id="image" name="image" accept="image/*" class="border p-2 w-full">
                            <small id="imageWarning" class="text-red-500 hidden">Размер файла не должен превышать 5
                                MB!</small>
                            <img id="imagePreview" class="w-20 h-20 object-cover mt-2 hidden"
                                alt="Предварительный просмотр">
                        </div>

                        <!-- Поле Языков -->
                        <div class="mb-4">
                            <label for="language" class="block mb-1">Выбор языка:</label>
                            <select id="language" name="language" class="border p-2 w-full">
                                <option value="en">Английский</option>
                                <option value="tm">Туркменский</option>
                                <option value="ru">Русский</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" id="modalSubmitButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
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
                            <td class="border border-gray-300 px-4 py-2">{{ $service->title }}</td>
                            <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                                {{ implode(', ', $service->categories ?? []) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button
                                    onclick="ServiceModal.open('edit', {{ $service->id }}, '{{ $service->title }}', {{ json_encode($service->categories) }})"
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
                <div class="bg-white p-8 rounded shadow-lg w-1/3">
                    <h2 id="serviceModalTitle" class="text-xl mb-4"></h2>
                    <form id="serviceModalForm" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="serviceFormMethod" value="POST">
                        <input type="hidden" id="serviceModalId" name="id">

                        <div class="mb-4">
                            <label for="serviceTitle" class="block mb-1">Название:</label>
                            <input type="text" id="serviceTitle" name="title" placeholder="Введите название"
                                class="border p-2 w-full" maxlength="40" required>
                            <small id="serviceTitleCount" class="text-gray-500">Осталось символов: 40</small>
                        </div>

                        <div id="categoriesContainer">
                            <div class="mb-4">
                                <label class="block mb-1">Категория 1:</label>
                                <input type="text" name="categories[]" placeholder="Введите данные для категории 1"
                                    class="border p-2 w-full" maxlength="40">
                                <small class="categoryCount text-gray-500">Осталось символов: 40</small>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1">Категория 2:</label>
                                <input type="text" name="categories[]" placeholder="Введите данные для категории 2"
                                    class="border p-2 w-full" maxlength="40">
                                <small class="categoryCount text-gray-500">Осталось символов: 40</small>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1">Категория 3:</label>
                                <input type="text" name="categories[]" placeholder="Введите данные для категории 3"
                                    class="border p-2 w-full" maxlength="40">
                                <small class="categoryCount text-gray-500">Осталось символов: 40</small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="block mb-1">Выбор языка:</label>
                            <select id="language" name="language" class="border p-2 w-full">
                                <option value="en">Английский</option>
                                <option value="tm">Туркменский</option>
                                <option value="ru">Русский</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="ServiceModal.close()"
                                class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                            <button type="submit" id="serviceModalSubmitButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{---------------------------------------------------- блок о нас --------------------------------------------------  --}}
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <form method="POST" action="{{ route('about-us.update', $aboutUs->id ?? '') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($aboutUs))
                @method('PUT')
            @endif
            
            <p class="text-lg font-semibold mb-4">О нас:</p>

            <!-- Поле загрузки изображения -->
            <div class="mb-4">
                <label for="image-prev" class="block text-gray-700 font-medium mb-2">Загрузить изображение</label>
                <input type="file" id="image-prev" name="image" accept="image/*"
                       class="border-2 border-dashed border-gray-300 p-4 w-full rounded focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                @if(isset($aboutUs) && $aboutUs->image_path)
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

            function openModal(isEdit = false, id = null, title = '', description = '', language = 'en', imageUrl =
                '') {
                const modalTitle = document.getElementById('modalTitle');
                const modalForm = document.getElementById('modalForm');
                const formMethod = document.getElementById('formMethod');
                const titleInput = document.getElementById('title');
                const descriptionInput = document.getElementById('description');
                const languageSelect = document.getElementById('language');
                const modalSubmitButton = document.getElementById('modalSubmitButton');
                const imagePreview = document.getElementById('imagePreview');
                const imageInput = document.getElementById('image');

                if (!isEdit) {
                    const tableBody = document.getElementById('tableBody');
                    const currentCount = tableBody.querySelectorAll('tr').length;

                    if (currentCount >= 5) {
                        alert('Вы не можете добавить более 5 записей.');
                        return;
                    }
                }

                if (isEdit) {
                    modalTitle.textContent = 'Редактировать запись';
                    modalForm.action = `/home-dashes/${id}`;
                    formMethod.value = 'PUT';
                    titleInput.value = title;
                    descriptionInput.value = description;
                    languageSelect.value = language;
                    modalSubmitButton.textContent = 'Обновить';

                    if (imageUrl) {
                        imagePreview.src = imageUrl;
                        imagePreview.classList.remove('hidden');
                    } else {
                        imagePreview.classList.add('hidden');
                    }
                } else {
                    modalTitle.textContent = 'Добавить запись';
                    modalForm.action = `{{ route('home-dash.store') }}`;
                    formMethod.value = 'POST';
                    titleInput.value = '';
                    descriptionInput.value = '';
                    languageSelect.value = 'en';
                    modalSubmitButton.textContent = 'Сохранить';

                    imagePreview.classList.add('hidden');
                }

                imageInput.value = '';

                document.getElementById('addModal').classList.remove('hidden');
            }

            function closeModal() {

                document.getElementById('addModal').classList.add('hidden');
            }

            // События для кнопок открытия и закрытия модального окна
            document.getElementById('addRowButton').addEventListener('click', () => openModal());
            window.openEditModal = (id, title, description, language, imageUrl) =>
                openModal(true, id, title, description, language, imageUrl);
            window.closeModal = closeModal;

            // Ограничение символов для полей
            function setupCharacterLimit(inputId, warningId, countId, maxLength) {
                const inputField = document.getElementById(inputId);
                const warning = document.getElementById(warningId);
                const count = document.getElementById(countId);

                inputField.addEventListener('input', () => {
                    const currentLength = inputField.value.length;
                    if (currentLength > maxLength) {
                        inputField.value = inputField.value.substring(0, maxLength);
                        warning.classList.remove('hidden');
                    } else {
                        warning.classList.add('hidden');
                    }
                    const remaining = maxLength - inputField.value.length;
                    count.textContent = `Осталось символов: ${remaining}`;
                });
            }

            setupCharacterLimit('title', 'titleWarning', 'titleCount', 20); // Настройка ограничения для названия
            setupCharacterLimit('description', 'descriptionWarning', 'descriptionCount',
            200); // Настройка ограничения для описания

            // Проверка размера загружаемых изображений
            const imageInput = document.getElementById('image');
            const imageWarning = document.getElementById('imageWarning');
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                const maxSize = 5 * 1024 * 1024; // 5 MB
                if (file && file.size > maxSize) {
                    imageWarning.classList.remove('hidden'); // Показываем предупреждение
                    this.value = ''; // Очищаем поле
                } else {
                    imageWarning.classList.add('hidden'); // Скрываем предупреждение
                }
            });
        });
    </script>




    {{-- модульное окно для услуг --}}
    <script>
        const ServiceModal = {
            open(mode, id = null, title = '', categories = []) {
                console.log('Opening Service Modal');
                const modal = document.getElementById('serviceModal');
                const modalTitle = document.getElementById('serviceModalTitle');
                const form = document.getElementById('serviceModalForm');
                const titleInput = document.getElementById('serviceTitle');
                const categoriesInputs = document.querySelectorAll('input[name="categories[]"]');
                const methodInput = document.getElementById('serviceFormMethod');
                const idInput = document.getElementById('serviceModalId');

                if (mode === 'edit') {
                    modalTitle.textContent = 'Редактировать запись';
                    form.action = `/services/${id}`;
                    methodInput.value = 'PUT';
                    idInput.value = id;
                    titleInput.value = title;

                    categories.forEach((category, index) => {
                        if (categoriesInputs[index]) {
                            categoriesInputs[index].value = category;
                        }
                    });
                } else {
                    modalTitle.textContent = 'Добавить запись';
                    form.action = `/services`;
                    methodInput.value = 'POST';
                    idInput.value = '';
                    titleInput.value = '';
                    categoriesInputs.forEach(input => (input.value = ''));
                }

                modal.classList.remove('hidden');
            },

            close() {
                console.log('Closing Service Modal');
                document.getElementById('serviceModal').classList.add('hidden');
            }
        };

        const CharacterCounter = {
            update(input, countElement, maxLength, language) {
                const messages = {
                    en: "Remaining characters:",
                    tm: "Galan nyşanlar:",
                    ru: "Осталось символов:",
                };
                const remaining = maxLength - input.value.length;
                countElement.textContent = `${messages[language]} ${remaining}`;
            },

            setup(isEdit = false, id = null, title = '', categories = [], language = 'en') {
                console.log('Setting up Service Modal with Character Count');
                const modalTitle = document.getElementById('serviceModalTitle');
                const modalForm = document.getElementById('serviceModalForm');
                const formMethod = document.getElementById('serviceFormMethod');
                const titleInput = document.getElementById('serviceTitle');
                const titleCount = document.getElementById('serviceTitleCount');
                const categoryInputs = document.querySelectorAll('input[name="categories[]"]');
                const languageSelect = document.getElementById('language');
                const maxLength = 40;

                languageSelect.value = language;

                if (isEdit) {
                    modalTitle.textContent = 'Редактировать запись';
                    modalForm.action = `/services/${id}`;
                    formMethod.value = 'PUT';
                    titleInput.value = title;
                    titleCount.textContent = `Осталось символов: ${maxLength - title.length}`;
                    categories.forEach((category, index) => {
                        if (categoryInputs[index]) {
                            categoryInputs[index].value = category;
                            const categoryCount = categoryInputs[index].nextElementSibling;
                            this.update(categoryInputs[index], categoryCount, maxLength, language);
                        }
                    });
                } else {
                    modalTitle.textContent = 'Добавить запись';
                    modalForm.action = `{{ route('services.store') }}`;
                    formMethod.value = 'POST';
                    titleInput.value = '';
                    titleCount.textContent = `Осталось символов: ${maxLength}`;
                    categoryInputs.forEach((input, index) => {
                        input.value = '';
                        const categoryCount = input.nextElementSibling;
                        this.update(input, categoryCount, maxLength, language);
                    });
                }

                titleInput.addEventListener('input', () => {
                    this.update(titleInput, titleCount, maxLength, languageSelect.value);
                });

                categoryInputs.forEach(input => {
                    const categoryCount = input.nextElementSibling;
                    input.addEventListener('input', () => {
                        this.update(input, categoryCount, maxLength, languageSelect.value);
                    });
                });

                document.getElementById('serviceModal').classList.remove('hidden');
            },

            close() {
                console.log('Closing Service Modal');
                document.getElementById('serviceModal').classList.add('hidden');
            }
        };
    </script>
@endsection
