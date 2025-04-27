<section class=" flex flex-col gap-8 mb-16 text-2xl lg:text-xl md:!text-base">
    @foreach($time_line as $event)
        @if($event['type'] == 'general')
            <div class="sticky-content-wide grid grid-cols-12 md:flex md:flex-col md:gap-2">
                <div class="col-start-1 col-span-2 lg:col-span-4 flex gap-4">
                    <svg class="w-4 mt-2" width="12" height="11" viewBox="0 0 12 11" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.1462 4.3999C11.971 4.7402 11.971 5.90842 11.1462 6.24872L2.09163 9.98444C1.43337 10.256 0.710236 9.77211 0.710236 9.06002V1.5886C0.710236 0.876514 1.43337 0.3926 2.09163 0.664185L11.1462 4.3999Z"
                            class="fill-dark-300" fill-opacity="0.85"/>
                    </svg>
                    <p class="text-dark-300">{{$event['data']['period']}}</p>
                </div>
                <p class="col-start-7 col-span-6">{{$event['data']['desc']}}</p>
            </div>
        @elseif($event['type'] == 'big_block')
            <div style="background-image: url('/fixed/block_3_image.jpeg')"
                 class="bg-cover bg-center w-full bg-[url(/fixed/welcome_background.jpeg)] relative">
                <div
                    class="absolute w-full h-full bg-[linear-gradient(180deg,_#141414_0%,_rgba(0,0,0,0.6)_59.32%,_#141414_99.27%)] z-0"></div>
                <div class="py-48 md:py-20 sm:py-4 sticky-content-wide">
                    <h2 class="text-[64px] lg:text-5xl !md:text-4xl sm:!text-xl relative mb-16">{!! $event['data']['text'] !!}</h2>
                </div>
            </div>
        @endif
    @endforeach
</section>
