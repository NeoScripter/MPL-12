@props(['phones'])

<footer class="mt-8 text-white bg-black-800 md:mt-12">

    <div class="w-10/12 pt-4 pb-20 mx-auto">

        <h3 class="mb-4 text-xl">Телефоны</h3>

        <ul class="grid gap-x-20 gap-y-6 grid-cols-auto-fit-240">
            @if (isset($phones))
                @foreach ($phones as $phone)
                    <li>
                        <a href=""
                            class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->number }}</a>
                        <a href=""
                            class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->email }}</a>
                        <div class="text-white">{!! $phone->text !!}</div>
                    </li>
                @endforeach

            @endif
        </ul>
    </div>

    <div class="pt-3 pb-6 bg-black-700">
        <p class="w-10/12 mx-auto">© Копирайт - Московская Психологическая Лаборатория 12</p>
    </div>
</footer>
