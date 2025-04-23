<header x-data="{ isHome: window.location.pathname === '/' }"
        :class="isHome ?
        'top-0 w-full absolute z-50'
        :'top-0 w-full bg-dark-600 border-b border-bright-85 z-50'">
    <div class="sticky-content-wide py-4 flex justify-between">
        <x-application-logo class="w-44"/>
        <div class="flex gap-4 text-bright-100">
            <a wire:navigate href="/">Главная</a>
            <a wire:navigate href="#map">Предприятия</a>
            <a wire:navigate href="{{route('portal.veterans-list')}}">Ветераны</a>
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
