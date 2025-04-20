<main class="flex-1">
    <section class="mb-16">
        <div class="grid grid-cols-12 items-end gap-2 mb-16">
            <img class="col-start-1 col-span-6" src="{{$company->getFirstMediaUrl('cover')}}" alt="">
            <div class="col-start-7 col-span-6 flex flex-col">
                <h1 class="font-bold text-[6vw]">{{$company['name']}}</h1>
                <h1 class="font-light text-[6vw]">{{$company['date_start']}}-{{$company['date_end']}}</h1>
            </div>
        </div>
        <div class="sticky-content-wide"><p class="text-[1vw]">{{$company['description']}}</p></div>
    </section>
    <section class="flex flex-col gap-8 mb-16">
        @foreach(json_decode($company['timeline']) as $event)
            <div class="sticky-content-wide grid grid-cols-12">
                <div class="col-start-1 col-span-2 flex gap-4">
                    <svg class="w-4 mt-2" width="12" height="11" viewBox="0 0 12 11" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.1462 4.3999C11.971 4.7402 11.971 5.90842 11.1462 6.24872L2.09163 9.98444C1.43337 10.256 0.710236 9.77211 0.710236 9.06002V1.5886C0.710236 0.876514 1.43337 0.3926 2.09163 0.664185L11.1462 4.3999Z"
                            class="fill-dark-300" fill-opacity="0.85"/>
                    </svg>
                    <p class="text-dark-300">{{$event->period}}</p>
                </div>
                <p class="col-start-7 col-span-6">{{$event->desc}}</p>
            </div>
        @endforeach
    </section>
    <section class="mb-16">
        <x-company-slider :images="$company->getMedia('gallery')"/>
    </section>
    <section>
        <div class="sticky-content-wide grid grid-cols-12">
            <h1 class="mb-8 col-start-7 col-span-6 font-bold text-[6vw]">ГЕРОИ ПРЕДПРИЯТИЯ</h1>
        </div>
        <x-veteran-running-line :veterans="$company->veteran"/>
    </section>
</main>
