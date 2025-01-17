<div class="w-full max-w-[2000px] mx-auto px-[30px] lg:px-[60px] xl:px-[100px] mt-[50px] lg:mt-[90px]">
    <div class="flex sm:flex-row flex-col justify-between">
        <div class="flex items-center justify-center lg:justify-start">
            <span class="title-2 text-[var(--accent-color)] mr-[15px] hidden xl:block">//</span>
            <p class="title-2 font-semibold sm:text-start text-center">Наши партнеры</p>
        </div>
        <div class="flex gap-[50px] sm:mt-0 mt-5 mx-auto sm:mx-0">
            <button type="button" class="slider-button partners-prev">
                <span>
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="slider-button partners-next">
                <span>
                    <i class="fa-solid fa-arrow-right"></i>
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