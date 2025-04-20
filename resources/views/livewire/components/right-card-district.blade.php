@props([
    'name',
    'show' => false,
    'maxWidth' => '500px'
])

<div
    x-data="{
        show: @js($show),
        cardWidth: '384px', // соответствует max-w-96 (24rem = 384px)
        shiftBody(enable) {
            if (enable) {
                document.body.style.transition = 'margin-right 0.3s ease';
                document.body.style.marginRight = this.cardWidth;
            } else {
                document.body.style.marginRight = '';
            }
        }
    }"
    x-init="
        $watch('show', value => {
{{--            shiftBody(value);--}}
            if (value) {
                document.body.classList.add('overflow-hidden');
            } else {
                document.body.classList.remove('overflow-hidden');
            }
        })
    "
    x-on:open-right-card.window="$event.detail == 'right-card-district' ? show = true : null"
    x-on:close-right-card.window="$event.detail == 'right-card-district' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    class="fixed inset-0 z-50 flex justify-end"
    style="display: none;"
    x-show="show"
>
    <!-- Затемнение фона -->
    <div
        x-show="show"
        class="fixed inset-0 bg-gray-600 opacity-70 transition-opacity"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-on:click="show = false"
    ></div>

    <!-- Выезжающая карточка -->
    <div
        x-show="show"
        class="bg-gray-400 shadow-xl h-screen max-w-96 md:max-w-none w-full transform transition-transform"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <div class="p-6 overflow-auto bg-white-500 h-full">
            @if($district)
                {{$district['name']}}
                <div class="flex flex-col">
                    @foreach($district['company'] as $company)
                        <a wire:navigate href="{{route('portal.company', $company['id'])}}">{{$company['name']}}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
