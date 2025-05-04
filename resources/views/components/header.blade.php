<header x-data="{ isHome: window.location.pathname === '/' }"
        :class="isHome ?
        'top-0 w-full absolute z-50 md:hidden'
        :'top-0 w-full bg-dark-600 border-b border-bright-85 z-50'">
    <div class="sticky-content-wide py-4 flex justify-between">
        <x-application-logo class="w-44"/>
        <div class="flex gap-4 text-bright-100 md:hidden">
            <a wire:navigate href="/">Главная</a>
            <a href="#map">Предприятия</a>
            <a wire:navigate href="{{route('portal.veterans-list')}}">Ветераны</a>
        </div>
        <div class="hidden md:flex  justify-center">
            <div class="flex justify-center">
                <div x-data="{ open: false }" class="relative flex flex-col justify-center">
                    <div @click="open = !open"
                         class="tham tham-e-squeeze tham-w-6"
                         :class="open ? 'tham-active' : ''"
                    >
                        <div class="tham-box">
                            <div class="tham-inner bg-bright-100"></div>
                        </div>
                    </div>
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="absolute right-0 top-6 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20">
                        <ul class="py-2">
                            <li>
                                <a wire:navigate href="/" class="block px-4 py-2 text-gray-800 ">Главная</a>
                            </li>
                            <li>
                                <a href="/#map" class="block px-4 py-2 text-gray-800 ">Предприятия</a>
                            </li>
                            <li>
                                <a wire:navigate href="{{route('portal.veterans-list')}}" class="block px-4 py-2 text-gray-800 ">Ветераны</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>

@push('page-js')

    <script>
        setTimeout(function() {
            console.log('Header INIT')
            const event = new Event("headerInit");
            window.dispatchEvent(event);
        }, 1)
    </script>

@endpush
