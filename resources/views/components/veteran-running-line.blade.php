{{--<div class="space-y-4 overflow-hidden py-8">--}}
{{--    <div x-data="streamingCarousel('left')" x-init="start()" class="relative overflow-hidden h-80 bg-black w-full">--}}
{{--        <div class="absolute top-0 left-0 flex gap-8 w-max" x-ref="wrapper">--}}
{{--            @foreach($veterans as $veteran)--}}
{{--                <div style="background-image: url('/fixed/footer_background.png')"--}}
{{--                     class="carousel-card w-[200px] shrink-0 bg-white rounded shadow p-2">--}}
{{--                    <img src="{{ $veteran->getFirstMediaUrl('cover') }}" alt=""--}}
{{--                         class="w-full h-52 object-cover rounded">--}}
{{--                    <p class="text-sm mt-2 font-bold text-dark-600">{{ $veteran['surname'] }} {{ $veteran['name'] }}</p>--}}
{{--                    <p class="text-xs text-gray-500">{{$veteran['position']}}</p>--}}
{{--                    <p class="text-xs text-dark-500">{{$veteran['birth_dt'] }} - {{ $veteran['death_dt'] }} гг.</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@push('page-js')--}}
{{--    <script>--}}
{{--        function streamingCarousel(direction = 'left') {--}}
{{--            return {--}}
{{--                speed: 0.2,--}}
{{--                cardWidth: 200,--}}
{{--                gap: 16,--}}
{{--                cards: [],--}}
{{--                start() {--}}
{{--                    this.cards = Array.from(this.$refs.wrapper.children);--}}

{{--                    this.cards.forEach((el, i) => {--}}
{{--                        el.style.position = 'absolute';--}}
{{--                        el.style.left = `${i * (this.cardWidth + this.gap)}px`;--}}
{{--                    });--}}

{{--                    const animate = () => {--}}
{{--                        this.cards.forEach(el => {--}}
{{--                            let left = parseFloat(el.style.left);--}}
{{--                            left += (direction === 'left' ? -this.speed : this.speed);--}}

{{--                            const totalWidth = (this.cardWidth + this.gap) * this.cards.length;--}}
{{--                            const offscreenLeft = -this.cardWidth;--}}
{{--                            const offscreenRight = window.innerWidth;--}}

{{--                            if (direction === 'left' && left < offscreenLeft) {--}}
{{--                                const max = Math.max(...this.cards.map(e => parseFloat(e.style.left)));--}}
{{--                                left = max + this.cardWidth + this.gap;--}}
{{--                            }--}}

{{--                            if (direction === 'right' && left > offscreenRight) {--}}
{{--                                const min = Math.min(...this.cards.map(e => parseFloat(e.style.left)));--}}
{{--                                left = min - this.cardWidth - this.gap;--}}
{{--                            }--}}

{{--                            el.style.left = `${left}px`;--}}
{{--                        });--}}

{{--                        requestAnimationFrame(animate);--}}
{{--                    };--}}

{{--                    requestAnimationFrame(animate);--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}


{{--<style>--}}
{{--    .swiper {--}}
{{--        width: 100%;--}}
{{--        height: 100%;--}}
{{--        overflow: visible; /* чтобы было видно выход за пределы */--}}

{{--    }--}}

{{--    .swiper-slide {--}}
{{--        text-align: center;--}}
{{--        font-size: 18px;--}}
{{--        background: #fff;--}}
{{--        display: flex;--}}
{{--        justify-content: center;--}}
{{--        align-items: center;--}}
{{--    }--}}
{{--    .swiper-button-disabled path {--}}
{{--        fill: gray;--}}
{{--    }--}}
{{--</style>--}}

{{--<div class="mx-10 grid overflow-hidden">--}}
{{--    <h1 class="mb-8 font-bold text-[6vw]">ГЕРОИ ПРЕДПРИЯТИЯ</h1>--}}
{{--    <div class="swiper veteranSlider mb-8">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            @foreach($veterans as $veteran)--}}
{{--                <p class="swiper-slide">123</p>--}}
{{--                <div style="background-image: url('/fixed/footer_background.png')"--}}
{{--                     class="swiper-slide  w-[200px] flex flex-col gap-4 bg-white rounded shadow p-2">--}}
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
{{--<!-- Initialize Swiper -->--}}
{{--<script>--}}

{{--    window.onload = function () {--}}
{{--        var swiper = new Swiper(".veteranSlider", {--}}
{{--            slidesPerView: 3,--}}
{{--            spaceBetween: 5,--}}
{{--            navigation: {--}}
{{--                nextEl: ".swiper-button-next",--}}
{{--                prevEl: ".swiper-button-prev",--}}
{{--            },--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
{{--@endscript--}}


