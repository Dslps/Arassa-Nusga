@extends('layouts.app')
@section('content')

    <div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]">
        <div
            class="animate-left lg:w-[800px] lg:h-[660px] h-auto bg-[var(--accent-color)] flex items-center px-[30px] lg:py-[0px] py-[30px] lg:px-[60px] 2xl:px-[100px] w-full text-[var(--white-color)] break-words min-w-0">
            <div class="flex flex-col min-w-0">
                <div class="min-w-0">
                    {{-- Титульное название --}}
                    <p class="title-2 break-words min-w-0">{{ $blog->{'title_' . app()->getLocale()} ?? __('О нас') }}</p>
                    {{-- Описание --}}
                    <ul class="space-y-[15px] base-text mt-[30px] break-words min-w-0">
                        @if ($blog->{'description_' . app()->getLocale()})
                            @foreach (explode("\n", $blog->{'description_' . app()->getLocale()}) as $line)
                                <li class="list-marker break-words min-w-0">{{ $line }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                {{-- Дополнительная информация --}}
                @if ($blog->{'additional_' . app()->getLocale()})
                    <div class="lg:hidden block mt-10 break-words min-w-0">
                        <div class="flex items-start min-w-0">
                            <div class="space-y-5 break-words min-w-0">
                                {!! nl2br(e($blog->{'additional_' . app()->getLocale()})) !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Дополнительная информация для больших экранов --}}
        @if ($blog->{'additional_' . app()->getLocale()})
            <div
                class="animate-bottom lg:flex w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] justify-start items-center hidden break-words min-w-0">
                <div class="min-w-0">
                    <div class="flex items-start min-w-0">
                        <span class="title leading-[70px] mr-[15px] text-[var(--accent-color)]">//</span>
                        <div class="space-y-5 break-words min-w-0">
                            {!! nl2br(e($blog->{'additional_' . app()->getLocale()})) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Блок с изображением --}}
    <div
        class="animate-left z-[-10] lg:block hidden w-full max-w-[2000px] h-max lg:mt-[-100px] mx-auto overflow-hidden relative">
        <div class="relative w-full h-[800px] overflow-hidden">
            <div class="absolute flex justify-center z-[-10] w-full h-full">
                @if (!empty($blog->photos))
                    @php
                        $photos = is_array($blog->photos) ? $blog->photos : explode(',', $blog->photos);
                    @endphp

                    @if (count($photos) > 0)
                        @foreach ($photos as $photo)
                            @php
                                $photo = trim($photo, ' "');
                            @endphp
                            <img class="object-cover h-full min-w-[2000px]" src="{{ Storage::url($photo) }}"
                                alt="{{ __('messages.about_us_photo') }}">
                        @endforeach
                    @endif

                @endif
            </div>
        </div>
    </div>


    {{-- ------------------------------------------------------------------------------------------ --}}

    <div class="w-full max-w-[2000px] px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px]">
        <div class="flex justify-start flex-wrap gap-[30px]" id="itemContainer">

            @foreach ($blogstore as $blogstores)
                <div class="flex flex-col w-[400px] h-[500px] bg-[#D3D3D3] rounded-[5px] item">
                    @if ($blogstores->photos)
                        <div class="flex justify-center w-full h-[250px]">
                            <img src="{{ asset('storage/' . $blogstores->photos) }}" alt="Изображение"
                                class="w-full h-full object-cover">
                        </div>
                    @else
                        Нет изображения
                    @endif
                    <div class="p-[20px] flex flex-col justify-between h-full">
                        <p class="text-[var(--accent-color)] small-text">{{ $blogstores->{'title_' . app()->getLocale()} }}
                        </p>
                        <p class="mt-[15px] base-text font-semibold multiline-ellipsis" style="max-width: 400px;">
                            {{ $blogstores->{'description_' . app()->getLocale()} }}
                        </p>
                        <div class="flex items-end justify-between mt-10">
                            <p class="small-text">6 июля 2022</p>
                            <a href="{{ route('blog.show', $blogstores->id) }}">
                                <button
                                    class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                    <span class="button-service">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <!-- Кнопка для отображения следующих 4 элементов -->
        <div class="text-center mt-6">
            <button id="loadMoreBtn"
                class="px-4 py-2 bg-[var(--accent-color)] text-white rounded-md focus:outline-none">Показать
                больше</button>
        </div>
    </div>

    <script>
        const items = document.querySelectorAll('.item');
        const loadMoreBtn = document.getElementById('loadMoreBtn');

        let visibleCount = 4;

        function updateItemsDisplay() {
            items.forEach((item, index) => {
                if (index < visibleCount) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }
        loadMoreBtn.addEventListener('click', () => {
            visibleCount += 4;
            updateItemsDisplay();


            if (visibleCount >= items.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
        updateItemsDisplay();
    </script>
@endsection
