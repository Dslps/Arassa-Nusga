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
                        <img src="{{ asset('storage/' . $slide->image_path) }}" alt="Изображение" class="w-16 h-16 object-cover mx-auto">
                    </td>
                    
                    
                    
                    <td class="border border-gray-300 px-4 py-2">{{ $slide->title }}</td>
                    <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto whitespace-nowrap">
                        {{ $slide->description }}
                    </td>
                    
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
                        <input type="text" id="title" name="title" placeholder="Введите название" class="border p-2 w-full" maxlength="30" required>
                        <small id="titleWarning" class="text-red-500 hidden">Превышено ограничение в 20 символов!</small>
                        <small id="titleCount" class="text-gray-500">Осталось символов: 20</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block mb-1">Описание:</label>
                        <textarea id="description" name="description" placeholder="Введите описание" class="border p-2 w-full" rows="3"></textarea>
                        <small id="descriptionWarning" class="text-red-500 hidden">Превышено ограничение в 200 символов!</small>
                        <small id="descriptionCount" class="text-gray-500">Осталось символов: 200</small>
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
{{-- ------------------------------------Таблица с услугами--------------------------------------------------- --}}
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <p class="text-lg font-semibold mb-4">Наши услуги:</p>
        
        <table class="table-auto w-full border-collapse border border-gray-300">
            
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Титульный текст</th>
                    <th class="border border-gray-300 px-4 py-2">Список</th>
                    <th class="border border-gray-300 px-4 py-2">Редактировать</th>
                    <th class="border border-gray-300 px-4 py-2">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2 text-orange-500 text-center">
                    <i class="text-[20px] fa-solid fa-pencil"></i>
                </td>
                <td class="border border-gray-300 px-4 py-2 text-red-600 text-center">
                    <i class="text-[20px] fa-solid fa-trash"></i>
                </td>
            </tbody>
        </table>
        <div class="flex justify-center mt-4">
            <button id="addRowButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                + Добавить запись
            </button>
        </div>
    </div>
</div>
{{-- функционал на открытие и работу с модульным окном как при добавлений так и при редактирований --}}
<script>
function openModal(isEdit = false, id = null, title = '', description = '') {
    const modalTitle = document.getElementById('modalTitle');
    const modalForm = document.getElementById('modalForm');
    const formMethod = document.getElementById('formMethod');
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const modalSubmitButton = document.getElementById('modalSubmitButton');

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
        modalSubmitButton.textContent = 'Обновить';
    } else {
        modalTitle.textContent = 'Добавить запись';
        modalForm.action = `{{ route('home-dash.store') }}`; 
        formMethod.value = 'POST'; 
        titleInput.value = ''; 
        descriptionInput.value = '';
        modalSubmitButton.textContent = 'Сохранить';
    }

    document.getElementById('addModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('addModal').classList.add('hidden');
}

document.getElementById('addRowButton').addEventListener('click', function () {
    openModal(); 
});

function openEditModal(id, title, description) {
    openModal(true, id, title, description); 
}

</script>
{{-- проверка тайтла вводимых данных --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const titleField = document.getElementById('title');
    const titleWarning = document.getElementById('titleWarning');
    const titleCount = document.getElementById('titleCount');
    const maxLength = 20;

    titleField.addEventListener('input', () => {
        const currentLength = titleField.value.length;
        if (currentLength > maxLength) {
            titleField.value = titleField.value.substring(0, maxLength); 
            titleWarning.classList.remove('hidden'); 
        } else {
            titleWarning.classList.add('hidden'); 
        }
        const remaining = maxLength - titleField.value.length;
        titleCount.textContent = `Осталось символов: ${remaining}`;
    });
});
</script>
{{-- огроничение на ввод с описанием текст --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const descriptionField = document.getElementById('description');
    const descriptionWarning = document.getElementById('descriptionWarning');
    const descriptionCount = document.getElementById('descriptionCount');
    const maxLength = 200;

    descriptionField.addEventListener('input', () => {
        const currentLength = descriptionField.value.length;

        if (currentLength > maxLength) {
            descriptionField.value = descriptionField.value.substring(0, maxLength); 
            descriptionWarning.classList.remove('hidden'); 
        } else {
            descriptionWarning.classList.add('hidden'); 
        }
        const remaining = maxLength - descriptionField.value.length;
        descriptionCount.textContent = `Осталось символов: ${remaining}`;
    });
});
</script>

@endsection
