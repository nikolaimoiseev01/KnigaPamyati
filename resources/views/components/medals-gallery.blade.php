<style>
    .medalGallery .swiper-slide {
        width: 256px !important;
    }
    .swiper-button-lock {
        display: none;
    }
</style>
<div style="margin-left: inherit" class=" swiper medalGallery mb-6">
    <div class="swiper-wrapper">
        @foreach($medals as $medal)
            <img
                @click="window.dispatchEvent(new CustomEvent('open-image', { detail: '{{$medal->getUrl()}}' }))"
                src="{{$medal->getUrl()}}" class="md:w-20 swiper-slide" alt="">
        @endforeach
    </div>
    <div class="col-start-7 col-span-6 flex gap-4 lg:col-start-1 lg:col-span-12 lg:mx-auto">
        <svg class="cursor-pointer button-prev-medals md:!w-1/2" width="167" height="13" viewBox="0 0 167 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.949219 6.44385L10.9492 12.2174L10.9492 0.670345L0.949219 6.44385ZM9.94922 7.44385L166.362 7.44385L166.362 5.44385L9.94922 5.44385L9.94922 7.44385Z" fill="#FBE6E6"/>
        </svg>
        <svg class="cursor-pointer button-next-medals md:!w-1/2" width="167" height="13" viewBox="0 0 167 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M166.355 6.44385L156.355 12.2174L156.355 0.670345L166.355 6.44385ZM157.355 7.44385L0.942856 7.44385L0.942856 5.44385L157.355 5.44385L157.355 7.44385Z" fill="#FBE6E6"/>
        </svg>
    </div>
</div>

@push('page-js')
    <script>
        document.addEventListener('livewire:navigated', () => {
            console.log('test')
            var swiper = new Swiper(".medalGallery", {
                slidesPerView: 'auto',
                spaceBetween: 5,
                watchOverflow: true,
                navigation: {
                    nextEl: ".button-next-medals",
                    prevEl: ".button-prev-medals",
                },
            });
        })
    </script>
@endpush
