<style>
    .swiper.companyGallery {
        width: 100%;
        height: 100%;
        overflow: visible; /* чтобы было видно выход за пределы */

    }
    .swiper-button-disabled path {
        fill: gray;
    }

    .swiper {
        width: 100%;
        max-width: 100%;
        max-height: 100vh;
        min-height: 0;
        min-width: 0;
    }

</style>

<div class="grid grid-cols-12 overflow-hidden">
    <div class="col-start-4 col-span-9 lg:col-start-1 lg:col-span-12 swiper sliderVeteransMainPage mb-8">
        <div class="swiper-wrapper">
            @foreach($veterans as $veteran)
                <a wire:navigate
                   class="veteran-slider-card swiper-slide text-lg flex flex-col font-mono carousel-card max-w-[360px] lg:!max-w-60 shrink-0 bg-coral-300 rounded shadow p-4 hover:scale-[1.03] transition duration-200" href="{{route('portal.veteran', $veteran['id'])}}">
                    <img src="{{ $veteran->getFirstMediaUrl('cover') ?: '/fixed/no-name-veteran.jpg' }}" alt=""
                         class="w-full h-96 lg:h-60 object-cover object-top rounded">
                    <p class="text-sm mt-2 font-bold text-dark-600">{{ $veteran['surname'] }} {{ $veteran['name'] }}</p>
                    <p class="text-xs text-gray-500">{{$veteran['position']}}</p>
                    <p class="text-xs italic  text-dark-500">{{$veteran['dates_str']}}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="col-start-4 col-span-6 lg:col-start-1 lg:col-span-12 lg:mx-auto flex gap-4 relative">
        <svg class="cursor-pointer swiper-button-prev md:!w-1/2" width="167" height="13" viewBox="0 0 167 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.949219 6.44385L10.9492 12.2174L10.9492 0.670345L0.949219 6.44385ZM9.94922 7.44385L166.362 7.44385L166.362 5.44385L9.94922 5.44385L9.94922 7.44385Z" fill="#FBE6E6"/>
        </svg>
        <svg class="cursor-pointer swiper-button-next md:!w-1/2" width="167" height="13" viewBox="0 0 167 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M166.355 6.44385L156.355 12.2174L156.355 0.670345L166.355 6.44385ZM157.355 7.44385L0.942856 7.44385L0.942856 5.44385L157.355 5.44385L157.355 7.44385Z" fill="#FBE6E6"/>
        </svg>
    </div>
</div>
@push('page-js')
    <script>

        document.addEventListener('livewire:navigated', () => {

            $('.veteran-slider-card').on('click', function (e) {
                e.preventDefault();
                const url = $(this).attr('href'); // или data-url, если у тебя div
                window.Livewire.navigate(url);
            })

            var swiper3 = new Swiper(".sliderVeteransMainPage", {
                slidesPerView: 'auto',
                spaceBetween: 25,
                breakpoints: {
                    768: {
                        spaceBetween: 50,
                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        })
    </script>
@endpush
