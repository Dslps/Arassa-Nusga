@extends('layouts.app')
@section('content')
<div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]">
    <div class="animate-left lg:w-[800px] lg:h-[660px] h-auto bg-[var(--accent-color)] flex items-center px-[30px] lg:py-[0px] py-[60px] lg:px-[60px] 2xl:px-[100px] w-full text-[var(--white-color)] break-words min-w-0">
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
            class="animate-bottom hidden lg:flex w-[1120px] px-[30px] lg:px-[60px] 2xl:px-[100px] justify-start items-center  break-words">
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
<div class="animate-left z-[-10] lg:block hidden w-full max-w-[2000px] h-max lg:mt-[-100px] mx-auto overflow-hidden relative">
    <div class="relative w-full h-[600px] overflow-hidden">
        <div class="absolute flex justify-center z-[-10] w-full h-full">
            @if (!empty($project->photos))
                @php
                    $photos = is_array($project->photos) ? $project->photos : explode(',', $project->photos);
                @endphp

                @if (count($photos) > 0)
                    @foreach ($photos as $photo)
                        @php
                            $photo = trim($photo, ' "');
                        @endphp
                        <img class="object-cover h-full min-w-[2000px]" src="{{ Storage::url($photo) }}"
                            alt="{{ __('messages.project_photo') }}">
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
                <p class="title-2">{{ __('messages.examples') }}</p>
                <p class="base-text">
                    {{ __('messages.examples_comment') }}
                </p>
            </div>
        </div>
    </div>

    <div class="w-full max-w-[2000px] px-5 lg:px-[60px] 2xl:px-[100px] m-auto mt-[50px]">
        <div id="projectsContainer" class="grid gap-[35px] grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3">
            @foreach ($projectstore as $projectstores)
                <div class="overflow-hidden mx-[10px] mt-5 w-full project-item">
                    <div class="flex flex-col">
                        @if ($projectstores->photos)
                            <div class="overflow-hidden w-full h-[200px] sm:h-[350px]">
                                <img src="{{ asset('storage/' . $projectstores->photos) }}" alt="Изображение"
                                    class="w-full h-full object-cover">
                            </div>
                        @else
                            Нет изображения
                        @endif
                        <div
                            class="flex justify-between h-[70px] sm:h-[100px] bg-[var(--light-comment-color)] text-[var(--teamplate color)]">
                            <div class="px-5 py-1 sm:p-5 w-full lg:max-w-[70%]">
                                <p class="projet-size-text truncate">
                                    {{ $projectstores->{'title_' . app()->getLocale()} }}
                                </p>
                                <p class="small-text truncate">
                                    {{ $projectstores->{'description_' . app()->getLocale()} }}
                                </p>
                            </div>
                            <a href="{{ route('project.show', $projectstores->id) }}">
                                <div
                                    class="hover-button w-[70px] sm:w-[100px] text-[var(--white-color)] h-[70px] sm:h-[100px] flex justify-center items-center bg-[#D7D7D7]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" fill="#2f3d7c">
                                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                                    </svg> 
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full h-[200px]"></div>

    <div class="flex justify-center mt-5">
        <button id="loadMoreButton" class="bg-[var(--accent-color)] small-text text-white p-5 rounded-[5px] hidden">
            {{ __('messages.button_show') }}
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreButton = document.getElementById('loadMoreButton');
            const projectItems = document.querySelectorAll('.project-item');
            let displayedItems = 3;

            // Update button visibility
            function updateButtonVisibility() {
                if (projectItems.length > 3) {
                    loadMoreButton.classList.remove('hidden');
                } else {
                    loadMoreButton.classList.add('hidden');
                }
            }

            // Hide excess items
            function hideExcessItems() {
                for (let i = displayedItems; i < projectItems.length; i++) {
                    projectItems[i].classList.add('hidden');
                }
            }

            // Initial setup
            updateButtonVisibility();
            hideExcessItems();

            // Show more items on button click
            loadMoreButton.addEventListener('click', function() {
                for (let i = displayedItems; i < displayedItems + 3 && i < projectItems.length; i++) {
                    projectItems[i].classList.remove('hidden');
                }

                displayedItems += 3;
                if (displayedItems >= projectItems.length) {
                    loadMoreButton.classList.add('hidden');
                }
            });
        });
    </script>




@endsection
