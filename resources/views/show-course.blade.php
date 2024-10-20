<x-user-layout>

    <header class="fixed z-30 w-full py-2 md:hidden">

        <div class="flex items-center justify-between w-4/5 mx-auto">
            <div class="overflow-hidden w-36">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <button class="w-12 overflow-hidden transition-opacity hover:opacity-90">
                <img src="{{ asset('images/burger.svg') }}" alt="">
            </button>
        </div>

    </header>

    <x-user.sidebar :phones="$phones" />

    <div>
        <div class="p-8 pt-16 space-y-2 text-gray-500">
            <h1 class="text-2xl text-black uppercase">Базовый курс обучения «Психологическое
                консультирование», онлайн-формат</h1>
            <p class="text-gray-500">22 Января 19:00</p>
            <p class="italic text-brand-orange">Александр Мусихин, Алексей Андреев-Чадаев, Арман
                Бекенов, Дмитрий Шаповалов, Ирина Андреева-Чадаева, Марианна Шипицына, Наталья
                Белова, Юлия
                Зотова</p>
            <h4 class="italic">Формат: Онлайн</h4>
            <div class="space-y-1 max-w-none">
                Стоимость: за семестр: единый платеж 80 000 рублей.
                Двумя частями - 84 000 рублей (по 42 000 рублей).
                Тремя частями - 87 рублей (по 29 000 рублей)
                Всего 3 семестра.
                По всем вопросам, куратор онлайн программ МПЛ12,
                7 925 506 17 12, Татьяна
            </div>
        </div>

        <div
            class="relative block overflow-hidden">
            <img class="object-cover object-center w-full h-full"
                src="{{ asset('images/items/item-2.png') }}" alt="">
        </div>

        <x-user.footer :phones="$phones" />
    </div>
</x-user-layout>
