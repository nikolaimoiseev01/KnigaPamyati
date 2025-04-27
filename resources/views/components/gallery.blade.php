<style>
    .swiper.companyGallery {
        width: 100%;
        height: 100%;
        overflow: visible; /* чтобы было видно выход за пределы */

    }
    .swiper-button-disabled path {
        fill: gray;
    }
</style>

<div class="mx-10 grid grid-cols-12 overflow-hidden">
    <h1 class="mb-8 col-start-7 col-span-6 lg:mx-auto md:col-start-1 md:col-span-12 font-bold text-6xl md:text-5xl">ГАЛЕРЕЯ</h1>
    <div class="col-start-7 col-span-6 col-span-6 lg:col-start-1 lg:col-span-12 swiper companyGallery mb-8">
        <div class="swiper-wrapper">
            @foreach($images as $image)
                <img class="!h-[512px] swiper-slide object-cover" src="{{$image->getUrl()}}" alt="">
            @endforeach
        </div>
    </div>
    <div class="col-start-7 col-span-6 flex gap-4 lg:col-start-1 lg:col-span-12 lg:mx-auto">
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
        var swiper = new Swiper(".companyGallery", {
            slidesPerView: 1,
            spaceBetween: 5,
            breakpoints: {
                1024: {
                    slidesPerView: 1,
                },
                767: {
                    slidesPerView: 2,
                },
                468: {
                    slidesPerView: 1,
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
