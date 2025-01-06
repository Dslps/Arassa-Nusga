@extends('layouts.dashboard')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p class="base-text mb-10">О нас</p>

            {{-- Блок для уже сохранённых изображений из БД --}}
            @if(!empty($aboutUs->photos))
                <p class="text-sm mb-2">Текущие фото:</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(explode(',', $aboutUs->photos) as $photo)
                    <img 
                    src="{{ asset('storage/' . $photo) }}" 
                    alt="photo" 
                    class="w-32 h-auto rounded border"
                  />
                  
                    @endforeach
                </div>
            @endif

            <div class="mb-6">
                <label for="photos" class="block text-gray-700 font-medium mb-2">
                    Загрузить фотографии
                </label>
                <input 
                    type="file" 
                    id="photos" 
                    name="photos[]" 
                    accept="image/*" 
                    multiple
                    class="border-2 border-dashed border-gray-300 p-4 w-full rounded"
                >

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
                        <input 
                            type="text" 
                            id="title_ru" 
                            name="title_ru"
                            value="{{ old('title_ru', $aboutUs->title_ru) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="title_en" class="block text-gray-700 font-medium mb-1">
                            Title (EN):
                        </label>
                        <input 
                            type="text" 
                            id="title_en" 
                            name="title_en"
                            value="{{ old('title_en', $aboutUs->title_en) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="title_tm" class="block text-gray-700 font-medium mb-1">
                            Title (TM):
                        </label>
                        <input 
                            type="text" 
                            id="title_tm" 
                            name="title_tm"
                            value="{{ old('title_tm', $aboutUs->title_tm) }}"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                            maxlength="255"
                        >
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
                        <textarea 
                            id="description_ru" 
                            name="description_ru" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_ru', $aboutUs->description_ru) }}</textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="description_en" class="block text-gray-700 font-medium mb-1">
                            Description (EN):
                        </label>
                        <textarea 
                            id="description_en" 
                            name="description_en" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_en', $aboutUs->description_en) }}</textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="description_tm" class="block text-gray-700 font-medium mb-1">
                            Description (TM):
                        </label>
                        <textarea 
                            id="description_tm" 
                            name="description_tm" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('description_tm', $aboutUs->description_tm) }}</textarea>
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
                        <textarea 
                            id="additional_ru" 
                            name="additional_ru" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_ru', $aboutUs->additional_ru) }}</textarea>
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="additional_en" class="block text-gray-700 font-medium mb-1">
                            Additional info (EN):
                        </label>
                        <textarea 
                            id="additional_en" 
                            name="additional_en" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_en', $aboutUs->additional_en) }}</textarea>
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="additional_tm" class="block text-gray-700 font-medium mb-1">
                            Additional info (TM):
                        </label>
                        <textarea 
                            id="additional_tm" 
                            name="additional_tm" 
                            rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded"
                        >{{ old('additional_tm', $aboutUs->additional_tm) }}</textarea>
                    </div>
                </div>
            </div>

            <button 
                type="submit" 
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
            >
                Сохранить
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photosInput = document.getElementById('photos');
        const previewContainer = document.getElementById('preview-container');

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
                    img.classList.add('w-32', 'h-auto', 'rounded', 'border', 'object-cover');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    });
</script>
@endsection
