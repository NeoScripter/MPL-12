@props(['phones', 'info'])

<footer class="mt-8 text-white bg-black-800 md:mt-12">

    <div class="items-start w-10/12 gap-20 pt-4 pb-20 mx-auto xl:flex">

        <div class="basis-3/4">
            <h3 class="mb-4 text-xl">Телефоны</h3>
            <ul class="grid gap-x-20 gap-y-6 grid-cols-auto-fit-240">
                @if (isset($phones))
                    @foreach ($phones as $phone)
                        <li>
                            <a href="tel:{{ preg_replace('/\D/', '', $phone->number) }}"
                                class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->number }}</a>
                            <a href="mailto:{{ e($phone->email) }}"
                                class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->email }}</a>
                            <div class="text-white">{!! $phone->text !!}</div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="mt-10 space-y-10 basis-1/4">
            <div>
                <h3 class="mb-2 text-xl">Наши соц. сети</h3>
                <a href="{{$info->vk}}"
                    class="block text-white hover:underline text-md hover:text-gray-400">ВКонтакте</a>
                <a href="{{$info->youtube}}"
                    class="block text-white hover:underline text-md hover:text-gray-400">YouTube</a>
                <a href="{{$info->telegram_channel}}"
                    class="block text-white hover:underline text-md hover:text-gray-400">Канал в Telegram</a>
                <a href="{{$info->telegram_group}}"
                    class="block text-white hover:underline text-md hover:text-gray-400">Открытая группа в Telegram</a>
            </div>
            <div>
                <h3 class="mb-2 text-xl">Адрес</h3>
                <a href=""
                    class="block text-white hover:underline text-md hover:text-gray-400">{{$info->address}}</a>
                <a href=""
                    class="block text-white hover:underline text-md hover:text-gray-400">Как проехать</a>
                <a href=""
                    class="block text-white hover:underline text-md hover:text-gray-400">Соглашение на обработку
                    персональных данных</a>
            </div>
        </div>
    </div>

    <div class="pt-3 pb-6 bg-black-700">
        <p class="w-10/12 mx-auto">© Копирайт - Московская Психологическая Лаборатория 12</p>
    </div>
</footer>
