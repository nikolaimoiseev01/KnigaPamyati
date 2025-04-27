<main class="flex-1">
    <section class="mb-16">
        <div class="grid grid-cols-12 md:flex md:flex-col md:gap-4 items-end gap-2 mb-16">
            <img class="col-start-1 col-span-6" src="{{$company->getFirstMediaUrl('cover')}}" alt="">
            <div class="col-start-7 col-span-6 md:col-start-1 md:col-span-12 md:mx-auto flex flex-col">
                <h1 class="font-bold text-8xl lg:text-6xl">{{$company['name']}}</h1>
                <h1 class="font-light text-8xl lg:text-6xl">{{$company['date_start']}}-{{$company['date_end']}}</h1>
            </div>
        </div>
        <div class="sticky-content-wide"><p class="text-2xl lg:text-xl md:!text-base">{{$company['description']}}</p></div>
    </section>
    <x-timiline :time-line="$company['timeline']"/>
    <section class="mb-16">
        <x-gallery :images="$company->getMedia('gallery')"/>
    </section>
    <section>
        <div class="sticky-content-wide grid grid-cols-12">
            <h1 class="mb-8 col-start-7 col-span-6 lg:mx-auto md:col-start-1 md:col-span-12 font-bold text-6xl md:text-5xl">ГЕРОИ ПРЕДПРИЯТИЯ</h1>
        </div>
        <x-veteran-running-line :veterans="$company->veteran"/>
    </section>
</main>
