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

                    const totalWidth = this.cards.length * (this.cardWidth + this.gap) - this.gap;
                    const containerWidth = this.$el.offsetWidth;

                    if (totalWidth <= containerWidth) {
                        // Центрируем карточки вручную
                        this.$refs.wrapper.style.position = 'relative';
                        this.$refs.wrapper.style.left = '50%';
                        this.$refs.wrapper.style.transform = 'translateX(-50%)';
                        this.cards.forEach((el, i) => {
                            el.style.position = 'relative';
                            el.style.left = 'unset';
                        });
                        return; // Не запускаем анимацию
                    }

                    // Иначе запускаем анимацию
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



