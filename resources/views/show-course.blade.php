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
        @if (isset($course))

        <div class="p-8 pt-16 space-y-2 text-gray-500">
            <h1 class="text-2xl text-center text-black uppercase md:w-3/4 xl:mx-auto xl:mb-8 xl:text-4xl">{{ $course->title }}</h1>
            <div class="gap-6 xl:flex">
                <p class="text-gray-500 xl:flex-1 xl:text-3xl xl:text-right">{{ $course->start_date }}</p>
                <div class="xl:flex-1">
                    <p class="italic text-brand-orange"><span class="text-gray-500">Ведущие:</span> Александр Мусихин, Алексей Андреев-Чадаев, Арман
                        Бекенов, Дмитрий Шаповалов, Ирина Андреева-Чадаева, Марианна Шипицына, Наталья
                        Белова, Юлия
                        Зотова</p>
                    <h4 class="italic">Формат: {{ $course->format }}</h4>
                    <div class="space-y-1 max-w-none">
                        Стоимость: за семестр: единый платеж 80 000 рублей.
                        Двумя частями - 84 000 рублей (по 42 000 рублей).
                        Тремя частями - 87 рублей (по 29 000 рублей)
                        Всего 3 семестра.
                        По всем вопросам, куратор онлайн программ МПЛ12,
                        7 925 506 17 12, Татьяна
                    </div>
                </div>
            </div>
        </div>

        <div
            class="relative block mx-auto overflow-hidden md:h-130 lg:w-3/4">
            <img class="object-cover object-center w-full h-full"
                src="{{ Storage::url($course->image_path) }}" alt="">
        </div>

        <div class="p-8 space-y-3 text-gray-500">
            <h3 class="font-bold text-black text-md">Для записи свяжитесь с куратором:</h3>
            <a href="" class="text-brand-orange">online.curator@mospsylab.ru</a>
            <p class="text-gray-500">+7(925)506-17-12 </p>

            <div class="flex items-center gap-3">
                <button class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">WhatsApp</button>
                <button class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">Telegram</button>
            </div>

            <h3 class="font-bold text-black text-md">Татьяна Князева</h3>
            <h3 class="font-bold text-black text-md">Узнать подробности об онлайн-обучении в МПЛ12:</h3>
            <a href="https://online.mpl12.institute/" class="text-brand-orange">https://online.mpl12.institute/</a>

            <h3 class="font-bold text-black text-md">Особенности нашего подхода к обучению:</h3>
            <a href="http://mpl12.ru/obuchenie/osobennosti-nashego-podhoda-k-obucheniyu/" class="text-brand-orange">http://mpl12.ru/obuchenie/osobennosti-nashego-podhoda-k-obucheniyu/</a>

        </div>

        <div class="px-8 space-y-2 html-content">
            {!! $course->content !!}
        </div>

        @endif

        <x-user.footer :phones="$phones" />
    </div>
</x-user-layout>
