<!-- Глобальная модалка -->
<div
    x-show="show"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50"
    @click.self="close"
>
    <div class="max-w-full max-h-full p-4 bg-gray-200 bg-opacity-70">
        <img :src="imageUrl" alt="Full size" class="max-w-full max-h-[90vh] rounded">
    </div>
</div>

@push('page-js')
    <script>
        function imageModal() {
            return {
                show: false,
                imageUrl: '',
                open(url) {
                    this.imageUrl = url;
                    this.show = true;
                },
                close() {
                    this.show = false;
                    this.imageUrl = '';
                }
            }
        }
    </script>
@endpush
