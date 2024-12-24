@extends('layouts.dashboard')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <p class="base-text mb-10">Домашняя страница</p>
            <p>Слайдер:</p>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Ошибки -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Форма -->
            <form action="{{ route('home-dash.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div id="formContainer">
                    <!-- Существующие записи -->
                    @foreach ($forms as $index => $form)
                        <div class="flex flex-col mt-5 form-group" id="form-{{ $form->id }}">
                            <input type="hidden" name="forms[{{ $index }}][id]" value="{{ $form->id }}">
                            <img src="{{ asset('storage/' . $form->image_path) }}" alt="Предпросмотр изображения"
                                 style="max-width: 300px;" class="mb-2">
                            <input type="file" name="forms[{{ $index }}][image]" accept="image/*" class="border p-2 rounded">
                            <input type="text" name="forms[{{ $index }}][title]" value="{{ $form->title }}" placeholder="Титульное название" class="border p-2 rounded" required>
                            <textarea name="forms[{{ $index }}][description }}" cols="30" rows="5" placeholder="Описание" class="border p-2 rounded">{{ $form->description }}</textarea>
                        </div>
                    @endforeach
                </div>
            
                <button type="button" id="addFormButton" class="bg-gray-500 text-white p-2 rounded mt-5">Добавить форму</button>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-5">Сохранить все</button>
            </form>
            




        </div>
    </div>

    <script>
       document.getElementById('addFormButton').addEventListener('click', function () {
    const formContainer = document.getElementById('formContainer');
    const formCount = formContainer.children.length;
    const uniqueId = `temp-${Date.now()}`; // Уникальный ID для формы

    const newForm = `
        <div class="flex flex-col mt-5 form-group" id="form-${uniqueId}">
            <!-- ID записи (пустое для новых записей) -->
            <input type="hidden" name="forms[${formCount}][id]" value="">

            <!-- Поле для выбора изображения -->
            <input type="file" name="forms[${formCount}][image]" accept="image/*" class="border p-2 rounded">

            <!-- Поля для редактирования -->
            <input type="text" name="forms[${formCount}][title]" placeholder="Титульное название"
                   class="border p-2 rounded" required>
            <textarea name="forms[${formCount}][description]" cols="30" rows="5"
                      placeholder="Описание" class="border p-2 rounded"></textarea>
        </div>
    `;

    formContainer.insertAdjacentHTML('beforeend', newForm);

    // Обработчик для предварительного просмотра изображения
    const imageInput = document.querySelector(`#form-${uniqueId} input[type="file"]`);
    const imagePreview = document.querySelector(`#form-${uniqueId} img`);

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (imagePreview) {
                        imagePreview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            } else if (imagePreview) {
                imagePreview.src = "";
            }
        });
    }
});

    </script>


@endsection
