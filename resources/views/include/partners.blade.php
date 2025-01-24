<div class="w-full max-w-[2000px] mx-auto px-[30px] lg:px-[60px] xl:px-[100px] mt-[50px] lg:mt-[90px]">
    <div class="flex sm:flex-row flex-col justify-between">
        <div class="flex items-center justify-center lg:justify-start">
            <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden xl:block">//</span>
            <p class="title-2 font-semibold sm:text-start text-center">{{ __('messages.partners') }}</p>
        </div>
        <div class="flex gap-[50px] sm:mt-0 mt-5 mx-auto sm:mx-0">
            <button type="button" class="slider-button partners-prev">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="#2f3d7c">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                    </svg> 
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="slider-button partners-next">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="#2f3d7c">
                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                    </svg> 
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="flex mt-[75px]">
        <div class="partners">
            @php
                $partnerPairs = array_chunk($partners->all(), 2);
            @endphp

            @foreach ($partnerPairs as $pair)
                <div class="carousel-item flex overflow-hidden flex-col">
                    @foreach ($pair as $index => $partner)
                    <div class="carousel-item flex flex-col border-r-[1px] border-[var(--light-comment-color)]">
                        <div class="w-[285px] h-[285px] flex justify-center items-center">
                            <img class="w-[200px] h-[200px] object-contain" src="{{ asset('storage/' . $partner->photo_path) }}" alt="Partner Logo">
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>