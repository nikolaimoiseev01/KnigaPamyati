<main class="flex-1">
    <section class="mb-16">
        <div class="grid grid-cols-12 items-end gap-4 mb-16">
            <img class="col-start-1 w-full max-h-[700px] object-cover col-span-6" src="{{$veteran->getFirstMediaUrl('cover')}}" alt="">
            <div class="col-start-7 col-span-6 flex flex-col">
                <div class="flex">
                    @foreach($veteran->getMedia('medals') as $image)
                        <img src="{{$image->getUrl()}}" class="w-64" alt="">
                    @endforeach
                </div>
                <h1 class="font-bold text-[6vw] uppercase">{{$veteran['surname']}}<br>{{$veteran['name']}}<br>{{$veteran['thirdname']}}</h1>
                <h1 class="font-light text-[6vw]">{{$veteran['birth_dt']}}-{{$veteran['death_dt']}}</h1>
            </div>
        </div>
        <div class="sticky-content-wide"><p class="text-[1vw]">{{$veteran['description']}}</p></div>
    </section>

    <x-timiline :time-line="$veteran['timeline']"/>
    <section class="mb-16">
        <x-gallery :images="$veteran->getMedia('gallery')"/>
    </section>

</main>
