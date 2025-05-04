<main class="flex-1">
    <section class="mb-16">
        <div class="grid grid-cols-12 items-end gap-4 mb-16  md:flex md:flex-col md:gap-4">
            <img class="col-start-1 w-full max-h-[700px] object-cover col-span-6"
                 src="{{$veteran->getFirstMediaUrl('cover')}}" alt="">
            <div class="col-start-7 col-span-6 md:col-start-1 md:col-span-12 md:mx-auto flex flex-col">
                <div class="flex md:flex-wrap md:justify-center">
                    @foreach($veteran->getMedia('medals') as $image)
                        <img src="{{$image->getUrl()}}" class="w-64 md:w-20" alt="">
                    @endforeach
                </div>
                <h1 class="font-bold text-8xl lg:text-6xl uppercase md:text-center">{{$veteran['surname']}}<br
                        class="md:hidden">{{$veteran['name']}}<br class="md:hidden">{{$veteran['thirdname']}}</h1>
                <h1 class="font-light text-8xl lg:text-6xl md:text-center">{{$veteran['birth_dt']}}
                    -{{$veteran['death_dt']}}</h1>
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
