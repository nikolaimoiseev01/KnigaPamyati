<main class="flex-1">
    <div style="background-image: url('/fixed/veterans_list_background.jpeg')" class="pb-16">
        <div class="w-full text-center py-16">
            <h1 class="text-[5vw]">ВЕТЕРАНЫ ВЕЛИКОЙ ПОБЕДЫ</h1>
        </div>
    </div>
    <form wire:submit="update_list()" class="filters flex justify-center gap-8 sticky-content-wide py-8">
            <x-ui.dropdown
                wire:model="district"
                :opts="$districts"
                placeholder="Выберите округ"
                class="min-w-max"
            />
            <x-ui.dropdown
                wire:model="company"
                :opts="$companies"
                placeholder="Выберите предприятие"
                class="min-w-max"
            />
            <x-ui.search-bar/>
        <x-ui.link-button>Применить</x-ui.link-button>
    </form>
    <section class="flex flex-col justify-center">
        <div class="sticky-content-wide m-auto flex gap-4 flex-wrap justify-center mb-16">
            @foreach($veterans as $veteran)
                <x-card-veteran :veteran="$veteran"/>
            @endforeach
        </div>
        <a wire:click="load_more()" class="mx-auto text-center">Загрузить еще</a>

    </section>
</main>
