<div class="flex items-center w-full max-w-sm bg-neutral-800 border border-gray-400 rounded h-10">
    <div class="bg-bright-100 h-10 w-10 flex items-center justify-center">
        <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.377 25.7754L20.4561 19.8546M12.7658 5.35872C16.5244 5.35872 19.5714 8.40568 19.5714 12.1643M23.6547 12.1643C23.6547 18.178 18.7796 23.0532 12.7658 23.0532C6.75207 23.0532 1.87695 18.178 1.87695 12.1643C1.87695 6.15051 6.75207 1.27539 12.7658 1.27539C18.7796 1.27539 23.6547 6.15051 23.6547 12.1643Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <input {{$attributes->wire('model')}}
        type="text"
        placeholder="Поиск"
        class="bg-neutral-800 text-white placeholder-gray-300 outline-none w-full py-2"
    />
</div>
