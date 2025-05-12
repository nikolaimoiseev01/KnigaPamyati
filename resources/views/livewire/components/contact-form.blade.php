<form action="" wire:submit="send" class="flex flex-col max-w-96">
    <h2 class="text-3xl">Форма обратной связи</h2>
    <div class="flex flex-col gap-2">
        <input required wire:model='email' type="email" placeholder="Ваш Email">
        <input required wire:model='name' type="text" placeholder="Ваше имя">
        <textarea required wire:model='message' placeholder="Сообщение"></textarea>
        <button class="bg-dark-500 w-full flex items-center justify-center py-4 text-bright-100 transition hover:bg-coral-500" type="submit">@if($sent)Отправлено!@elseОтправить@endif</button>
    </div>
</form>
