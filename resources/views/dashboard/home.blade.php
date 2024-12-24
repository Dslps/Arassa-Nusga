@extends('layouts.dashboard')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <p class="base-text mb-10">Домашняя страница</p>
        <p class="text-lg font-semibold mb-4">Слайдер:</p>

        <!-- Таблица -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
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
                        <img id="preview-{{ $slide->id }}" src="{{ asset('storage/' . $slide->image_path) }}" alt="Изображение" class="w-16 h-16 object-cover mx-auto cursor-pointer">
                    </td>
                    
                    <td class="border border-gray-300 px-4 py-2">{{ $slide->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $slide->description }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <button onclick="openEditModal({{ $slide->id }}, '{{ $slide->title }}', '{{ $slide->description }}')" class=" text-orange-500">
                            <i class="text-[20px] fa-solid fa-pencil"></i>
                        </button>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <form action="{{ route('home-dash.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
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
                <form id="modalForm" action="{{ route('home-dash.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST"> <!-- По умолчанию POST -->
                    <input type="hidden" id="modalId" name="id">
                    <div class="mb-4">
                        <label for="title" class="block mb-1">Название:</label>
                        <input type="text" id="title" name="title" placeholder="Введите название" class="border p-2 w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block mb-1">Описание:</label>
                        <textarea id="description" name="description" placeholder="Введите описание" class="border p-2 w-full" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block mb-1">Изображение:</label>
                        <input type="file" id="image" name="image" accept="image/*" class="border p-2 w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Отмена</button>
                        <button type="submit" id="modalSubmitButton" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        
        
                
    </div>
</div>

<script>
// Открытие модального окна
function openModal(isEdit = false, id = null, title = '', description = '') {
    const modalTitle = document.getElementById('modalTitle');
    const modalForm = document.getElementById('modalForm');
    const formMethod = document.getElementById('formMethod');
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const modalSubmitButton = document.getElementById('modalSubmitButton');

    if (!isEdit) {
        // Ограничение добавления до 5 записей
        const tableBody = document.getElementById('tableBody');
        const currentCount = tableBody.querySelectorAll('tr').length;

        if (currentCount >= 5) {
            alert('Вы не можете добавить более 5 записей.');
            return; // Прерываем выполнение
        }
    }

    if (isEdit) {
        // Настройки для редактирования
        modalTitle.textContent = 'Редактировать запись';
        modalForm.action = `/home-dashes/${id}`; // Устанавливаем маршрут для обновления
        formMethod.value = 'PUT'; // Метод PUT для обновления
        titleInput.value = title; // Устанавливаем текущие значения
        descriptionInput.value = description;
        modalSubmitButton.textContent = 'Обновить';
    } else {
        // Настройки для добавления
        modalTitle.textContent = 'Добавить запись';
        modalForm.action = `{{ route('home-dash.store') }}`; // Маршрут для добавления
        formMethod.value = 'POST'; // Метод POST для добавления
        titleInput.value = ''; // Очищаем поля
        descriptionInput.value = '';
        modalSubmitButton.textContent = 'Сохранить';
    }

    // Показываем модальное окно
    document.getElementById('addModal').classList.remove('hidden');
}

// Закрытие модального окна
function closeModal() {
    document.getElementById('addModal').classList.add('hidden');
}

// Пример вызова для добавления записи
document.getElementById('addRowButton').addEventListener('click', function () {
    openModal(); // Открываем окно для добавления
});

// Пример вызова для редактирования записи
function openEditModal(id, title, description) {
    openModal(true, id, title, description); // Открываем окно для редактирования
}

</script>
<script>
    function updateImagePreview(event, id) {
    const fileInput = event.target;
    const preview = document.getElementById(`preview-${id}`);

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result; // Обновляем путь изображения
        };

        reader.readAsDataURL(fileInput.files[0]); // Читаем файл как URL
    }
}

</script>
@endsection
