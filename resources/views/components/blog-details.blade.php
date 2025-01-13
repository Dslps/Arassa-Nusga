@extends('layouts.app')
@section('content')

<div class="w-full flex m-auto max-w-[2000px] lg:pt-[15vh] pt-[140px]"></div>
<div class="w-full h-max pb-40">
    <div class="">
        @if ($blogstore->photos)
            <div class="w-full h-[600px]">
                <img src="{{ asset('storage/' . $blogstore->photos) }}" alt="blog image" class=" w-full h-full object-cover" />
            </div>
        @endif
        <div>
            {{ $blogstore->{'title_' . app()->getLocale()} }}
        </div>
        <div>
            {{ $blogstore->{'description_' . app()->getLocale()} }}
        </div>

    </div>
</div>

@endsection
