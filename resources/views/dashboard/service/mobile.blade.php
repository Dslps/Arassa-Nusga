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

        <form action="{{ route('mobile.store') }}" method="POST" enctype="multipart/form-data">
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
                @if ($mobile->photos && count($mobile->photos) > 0)
                    <div class="mt-4">
                        <h4 class="text-md font-semibold mb-2">Существующие фотографии:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($mobile->photos as $photo)
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
                            value="{{ old('title_ru', $mobile->title_ru) }}"
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
                            value="{{ old('title_en', $mobile->title_en) }}"
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
                            value="{{ old('title_tm', $mobile->title_tm) }}"
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
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_ru', $mobile->categories_ru) }}</textarea>
                        @error('categories_ru')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Английский -->
                    <div>
                        <label for="categories_en" class="block text-gray-700 font-medium mb-1">
                            Description  (EN):
                        </label>
                        <textarea id="categories_en" name="categories_en" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_en', $mobile->categories_en) }}</textarea>
                        @error('categories_en')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Туркменский -->
                    <div>
                        <label for="categories_tm" class="block text-gray-700 font-medium mb-1">
                            Description  (TM):
                        </label>
                        <textarea id="categories_tm" name="categories_tm" rows="4"
                            class="border-2 border-dashed border-gray-300 p-2 w-full rounded">{{ old('categories_tm', $mobile->categories_tm) }}</textarea>
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


@endsection