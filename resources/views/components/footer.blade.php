<footer class="w-full text-dark-500 flex flex-col pt-40 pb-16 bg-cover bg-top mt-16 md:mt-8"
        style="background-image: url('/fixed/footer_background_2.png')">
    <div class="sticky-content-wide">
        <div class="w-full flex justify-between items-center mb-4">
            <p>КНИГА ПАМЯТИ. ВЕТЕРАНЫ ВЕЛИКОЙ ПОБЕДЫ</p>
        </div>
        <div class="flex justify-between md:flex-col gap-4">
            <div class="flex flex-col">
                <h2 class="text-3xl">Предприятия</h2>
                <select onchange="location.href=this.value" class="border p-2 rounded">
                    @foreach($companies as $company)
                        <option value="{{route('portal.company', $company['id'])}}">{{$company['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <h2 class="text-3xl">Предприятия</h2>
                <div class="flex flex-col gap-2 text-black-500">
                    <div class="flex gap-2 items-center">
                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.1965 4.72239C12.0266 5.0607 12.0266 6.23617 11.1965 6.57449L2.09616 10.2832C1.43844 10.5513 0.71875 10.0674 0.71875 9.35719V1.93968C0.71875 1.22945 1.43844 0.745588 2.09615 1.01363L11.1965 4.72239Z"
                                fill="#202020"/>
                        </svg>
                        <a href="/" class="!text-dark-600 font-bold">О проекте</a>
                    </div>
                    <div class="flex gap-2 items-center">
                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.1965 4.72239C12.0266 5.0607 12.0266 6.23617 11.1965 6.57449L2.09616 10.2832C1.43844 10.5513 0.71875 10.0674 0.71875 9.35719V1.93968C0.71875 1.22945 1.43844 0.745588 2.09615 1.01363L11.1965 4.72239Z"
                                fill="#202020"/>
                        </svg>
                        <a href="/#map" class="!text-dark-600 font-bold">География проекта</a>
                    </div>
                    <div class="flex gap-2 items-center">
                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.1965 4.72239C12.0266 5.0607 12.0266 6.23617 11.1965 6.57449L2.09616 10.2832C1.43844 10.5513 0.71875 10.0674 0.71875 9.35719V1.93968C0.71875 1.22945 1.43844 0.745588 2.09615 1.01363L11.1965 4.72239Z"
                                fill="#202020"/>
                        </svg>
                        <a href="{{route('portal.veterans-list')}}" class="!text-dark-600 font-bold">Истории
                            ветеранов </a>
                    </div>
                </div>
            </div>
            <livewire:components.contact-form/>
        </div>

    </div>
</footer>
