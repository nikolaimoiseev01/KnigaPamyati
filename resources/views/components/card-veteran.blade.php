<a wire:navigate href="{{route('portal.veteran', $veteran['id'])}}"
    {{ $attributes->merge(['class' => 'block font-mono carousel-card w-[200px] shrink-0 bg-coral-300 rounded shadow p-2 hover:scale-[1.03] transition duration-200']) }}>
    <img src="{{ $veteran->getFirstMediaUrl('cover') }}" alt=""
         class="w-full h-52 object-cover object-top rounded">
    <p class="text-sm mt-2 font-bold text-dark-600">{{ $veteran['surname'] }} {{ $veteran['name'] }}</p>
    <p class="text-xs text-gray-500">{{$veteran['position']}}</p>
    <p class="text-xs italic  text-dark-500">{{$dates_str}}</p>
</a>
