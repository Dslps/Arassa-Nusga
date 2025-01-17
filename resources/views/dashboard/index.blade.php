@extends('layouts.dashboard')
@section('content')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-100 border-dashed rounded-lg dark:border-gray-700 mt-14">
       <form action="{{ route('partners.savePartner') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="p-4">
               <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                   <p class="base-text mb-10">Партнеры:</p>
                   <div class="mb-6">
                       <label for="photos" class="block text-gray-700 font-medium mb-2">
                           Загрузить фотографии
                       </label>
                       <input type="file" id="photos" name="photos[]" accept="image/*" multiple
                              class="border-2 border-dashed border-gray-300 p-4 w-full rounded">
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
               <h2 class="base-text mb-4">Ваши партнеры:</h2>
               <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-10 gap-4">
                   @foreach ($partners as $partner)
                       <div class="relative" id="partner-{{ $partner->id }}">
                           <div class="flex flex-col justify-center items-center">
                               <a href="{{ asset('storage/' . $partner->photo_path) }}" data-lightbox="partners"
                                  data-title="Партнер">
                                   <img src="{{ asset('storage/' . $partner->photo_path) }}" alt="Партнер"
                                        class="object-cover w-full h-32 rounded">
                               </a>
                               <!-- Кнопка удаления -->
                               <form action="{{ route('partners.deletePartner', $partner->id) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого партнера?')" class="mt-[10px] bg-red-500 text-white rounded-full w-[30px] h-[30px] hover:bg-red-600">
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
       @if ($partners->hasPages())
           <div class="mt-4">
               {{ $partners->links() }}
           </div>
       @endif
   </div>
</div>

@endsection