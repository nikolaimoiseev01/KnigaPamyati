@props([
    'opts' => [],
    'placeholder' => 'Выберите...',
])

@php
    $model = $attributes->wire('model'); // Получим имя переменной из wire:model
@endphp

<div
    x-data="{
        open: false,
        selected_id: @entangle($model),
        selected_name: '',
        toggle() { this.open = !this.open },
        select(id, name) { this.selected_id = id; this.selected_name = name; this.open = false }
    }"
    {{ $attributes->merge(['class' => 'relative inline-block text-left w-full']) }}
>
    <button type="button"
        @click="toggle"
        class="w-full bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-600 hover:bg-gray-700 transition flex justify-between items-center"
    >
        <span x-text="selected_name || '{{ $placeholder }}'"></span>
        <svg class="w-4 h-4 ml-2 transform transition-transform" :class="{ 'rotate-180': open }" fill="none"
             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute z-20 mt-2 w-full bg-gray-900 border border-gray-700 rounded-lg shadow-lg overflow-hidden"
    >
        <ul class="text-white divide-y divide-gray-700">
            @foreach ($opts as $opt)
                <li
                    @click="select({{ $opt['id'] }}, '{{ $opt['name'] }}')"
                    class="px-4 py-2 hover:bg-gray-700 cursor-pointer"
                >
                    {{ $opt['name'] }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
