@extends('layouts.app')
@section('content')
    <div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]">
        <div
            class="animate-left lg:w-[800px] lg:h-[660px] h-auto bg-[var(--accent-color)] flex items-center px-[30px] lg:py-[0px] py-[30px] lg:px-[60px] 2xl:px-[100px] w-full text-[var(--white-color)] break-words min-w-0">
            <div class="flex flex-col min-w-0">
                <div class="min-w-0">
                    {{-- Титульное название --}}
                    <p class="title-2 break-words min-w-0">{{ $project->{'title_' . app()->getLocale()} ?? __('О нас') }}</p>
                    {{-- Описание --}}
                    <ul class="space-y-[15px] base-text mt-[30px] break-words min-w-0">
                        @if ($project->{'description_' . app()->getLocale()})
                            @foreach (explode("\n", $project->{'description_' . app()->getLocale()}) as $line)
                                <li class="list-marker break-words min-w-0">{{ $line }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                {{-- Дополнительная информация --}}
                @if ($project->{'additional_' . app()->getLocale()})
                    <div class="lg:hidden block mt-10 break-words min-w-0">
                        <div class="flex items-start min-w-0">
                            <div class="space-y-5 break-words min-w-0">
                                {!! nl2br(e($project->{'additional_' . app()->getLocale()})) !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Дополнительная информация для больших экранов --}}
        @if ($project->{'additional_' . app()->getLocale()})
            <div
                class="animate-bottom lg:flex w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] justify-start items-center hidden break-words min-w-0">
                <div class="min-w-0">
                    <div class="flex items-start min-w-0">
                        <span class="title leading-[70px] mr-[15px] text-[var(--accent-color)]">//</span>
                        <div class="space-y-5 break-words min-w-0">
                            {!! nl2br(e($project->{'additional_' . app()->getLocale()})) !!}
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
                @if (!empty($project->photos))
                    @php
                        // Проверяем, является ли photos массивом. Если нет, разбиваем строку на массив по запятой.
                        $photos = is_array($project->photos) ? $project->photos : explode(',', $project->photos);
                    @endphp

                    @if (count($photos) > 0)
                        @foreach ($photos as $photo)
                            {{-- Убираем возможные пробелы и экранирование символов --}}
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
    {{-- ------------------------------------- --}}
    <div class="w-full max-w-[2000px] px-10 lg:px-[60px] 2xl:px-[100px] m-auto mt-[80px] xl:mt-[80px] 2xl:mt-[130px] ">
        <div class="flex">
            <span class="title-2 mr-[10px] text-[var(--accent-color)]">//</span>
            <div class="flex flex-col">
                <p class="title-2">Примеры наших работ</p>
                <p class="base-text">Remember, even the tallest trees were once tiny seeds that grew steadily, day by day.
                </p>
            </div>
        </div>
    </div>
    <div class="w-full px-5 lg:px-[60px] 2xl:px-[100px] m-auto mt-[50px]">
        <div id="projectsContainer" class="flex justify-center gap-[35px] flex-wrap">

            @foreach ($projectstore as $projectstores)
                <div class=" rounded-[10px] overflow-hidden mx-[10px] lg:w-[500px] w-[400px]">
                    <div class="flex flex-col">
                        @if ($projectstores->photos)
                            <div class="overflow-hidden w-full h-[350px]">
                                <img src="{{ asset('storage/' . $projectstores->photos) }}" alt="Изображение" class="w-full h-full object-cover">
                            </div>
                        @else
                            Нет изображения
                        @endif
                        <div
                            class="flex justify-between h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                            <div class="p-5">
                                <p class="projet-size-text">{{ $projectstores->{'title_' . app()->getLocale()} }}</p>
                                <p class="small-text">{{ $projectstores->{'description_' . app()->getLocale()} }}</p>
                            </div>
                            <a href="{{ route('project.show', $projectstores->id) }}">
                                <div
                                    class="hover-button w-[100px] text-[var(--white-color)] h-[100px] flex justify-center items-center bg-[var(--button-color)]">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="flex justify-center mt-5">
            <button id="loadMoreButton" class="bg-[var(--accent-color)] small-text text-white p-5 rounded-[5px]">
                Показать ещё
            </button>
        </div>
    </div>
@endsection
