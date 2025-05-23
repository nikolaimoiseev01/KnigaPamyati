<main class="flex-1">
    <section class="mb-16">
        <div class="grid grid-cols-12 items-end gap-4 mb-16  md:flex md:flex-col md:gap-4">
            <img
                @click="window.dispatchEvent(new CustomEvent('open-image', { detail: '{{$veteran->getFirstMediaUrl('cover')}}' }))"
                class="col-start-1 w-full max-h-[700px] object-contain col-span-6"
                 src="{{ $veteran->getFirstMediaUrl('cover') ?: '/fixed/no-name-veteran.jpg' }}" alt="">

            <div class="col-start-7 col-span-6 md:col-start-1 md:col-span-12 md:mx-auto flex flex-col">
                <x-medals-gallery :medalss="$veteran->getMedia('medals')"/>
                <h1 class="font-bold text-8xl lg:text-6xl uppercase md:hidden flex flex-col">
                    <span>{{$veteran['surname']}}</span>
                    <span>{{$veteran['name']}}</span>
                    <span>{{$veteran['thirdname']}}</span>
                </h1>
                <h1 class="font-bold text-8xl lg:text-6xl uppercase hidden text-center md:block">
                    {{$veteran['surname']}} {{$veteran['name']}} {{$veteran['thirdname']}}
                </h1>
                <h1 class="font-light text-8xl lg:text-6xl md:text-center">{{$dates_str}}</h1>
            </div>
        </div>
        <div class="sticky-content-wide"><p class="text-2xl lg:text-xl md:!text-base">{{$veteran['description']}}</p>
        </div>
    </section>

    <x-timiline :time-line="$veteran['timeline']"/>
    @if($veteran->getMedia('gallery')->count() > 0)
        <section class="mb-16">
            <x-gallery :images="$veteran->getMedia('gallery')"/>
        </section>
    @endif

</main>
