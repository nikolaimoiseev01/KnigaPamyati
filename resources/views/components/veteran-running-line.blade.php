<div class="space-y-4 overflow-hidden py-8">
    <div x-data="streamingCarousel('left')" x-init="start()" class="relative overflow-hidden h-80 w-full">
        <div class="absolute top-5 left-0 flex gap-8 w-max" x-ref="wrapper">
            @foreach($veterans as $veteran)
                <x-card-veteran :veteran="$veteran" />
            @endforeach
        </div>
    </div>
</div>

@push('page-js')
    <script>
        function streamingCarousel(direction = 'left') {
            return {
                speed: 0.2,
                cardWidth: 200,
                gap: 16,
                cards: [],
                start() {
                    this.cards = Array.from(this.$refs.wrapper.children);

                    this.cards.forEach((el, i) => {
                        el.style.position = 'absolute';
                        el.style.left = `${i * (this.cardWidth + this.gap)}px`;
                    });

                    const animate = () => {
                        this.cards.forEach(el => {
                            let left = parseFloat(el.style.left);
                            left += (direction === 'left' ? -this.speed : this.speed);

                            const totalWidth = (this.cardWidth + this.gap) * this.cards.length;
                            const offscreenLeft = -this.cardWidth;
                            const offscreenRight = window.innerWidth;

                            if (direction === 'left' && left < offscreenLeft) {
                                const max = Math.max(...this.cards.map(e => parseFloat(e.style.left)));
                                left = max + this.cardWidth + this.gap;
                            }

                            if (direction === 'right' && left > offscreenRight) {
                                const min = Math.min(...this.cards.map(e => parseFloat(e.style.left)));
                                left = min - this.cardWidth - this.gap;
                            }

                            el.style.left = `${left}px`;
                        });

                        requestAnimationFrame(animate);
                    };

                    requestAnimationFrame(animate);
                }
            }
        }
    </script>
@endpush

{{--<style>--}}
{{--    .swiper {--}}
{{--        /*width: 100%;*/--}}
{{--        height: 100%;--}}

{{--    }--}}

{{--    .swiper-button-disabled path {--}}
{{--        fill: gray;--}}
{{--    }--}}
{{--</style>--}}

{{--<div class="mx-10 ">--}}
{{--    <h1 class="mb-8 font-bold text-[6vw]">ГАЛЕРЕЯ</h1>--}}
{{--    <div class="swiper veteranRunningLine mb-8">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            @foreach($veterans as $veteran)--}}
{{--                <div class="swiper-slide min-w-52 w-52 flex flex-col bg-coral-300 p-4">--}}
{{--                    <img src="{{ $veteran->getFirstMediaUrl('cover') }}" alt=""--}}
{{--                         class="h-52 object-cover rounded">--}}
{{--                    <p class="text-sm mt-2 font-bold text-dark-600">{{ $veteran['surname'] }} {{ $veteran['name'] }}</p>--}}
{{--                    <p class="text-xs text-gray-500">{{$veteran['position']}}</p>--}}
{{--                    <p class="text-xs text-dark-500">{{$veteran['birth_dt'] }} - {{ $veteran['death_dt'] }} гг.</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@script--}}
{{--<script>--}}
{{--    window.addEventListener('load', function () {--}}
{{--        var swiper2 = new Swiper(".veteranRunningLine", {--}}
{{--            slidesPerView: 5,--}}
{{--            spaceBetween: 15,--}}
{{--            loop: true,--}}
{{--            // autoplay: {--}}
{{--            //     delay: 0,--}}
{{--            //     disableOnInteraction: false--}}
{{--            // },--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
{{--@endscript--}}



