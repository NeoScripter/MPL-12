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
        <div class="relative bg-[url('/images/hero.jpg')] bg-cover bg-center bg-no-repeat min-h-96 w-full pt-24 px-16">
            <h1 class="mb-1 text-4xl font-medium bg-white shadow-white-large max-w-max">Психологическое консультирование
                онлайн</h1>
            <h2 class="mb-4 text-2xl font-medium bg-white md:mb-12 shadow-white-large max-w-max">Базовый курс обучения
            </h2>
            <a href=""
                class="block px-4 py-2 font-normal text-white transition-opacity bg-brand-orange w-max hover:opacity-90">Оставить
                заявку</a>
        </div>
        <div class="grid w-10/12 gap-8 mx-auto mt-8 sm:grid-cols-auto-fit-240 xl:grid-cols-3 md:gap-12 md:mt-12 md:w-10/12">
            @if (isset($courses))
                @foreach ($courses as $course)
                    <div>
                        <a href="{{ route('dashboard.show', $course->id)}}"
                            class="relative block overflow-hidden after:inset-0 after:z-20 after:bg-white after:opacity-0 after:absolute after:hover:opacity-70 after:transition-opacity">
                            <img class="object-cover object-center w-full h-full"
                                src="{{ Storage::url($course->image_path) }}" alt="">
                        </a>
                        <h3 class="w-10/12 mx-auto my-2 text-2xl font-bold text-center text-brand-orange">
                            {{ $course->title }}</h3>
                        <div class="grid gap-1 py-3 border-t border-b border-gray-300">
                            <span
                                class="font-normal text-gray-500 text-md">{{ $course->start_date }}
                            </span>
                            <h4 class="italic">Ведущие:</h4>
                            <p class="italic text-brand-orange">Александр Мусихин, Алексей Андреев-Чадаев, Арман
                                Бекенов, Дмитрий Шаповалов, Ирина Андреева-Чадаева, Марианна Шипицына, Наталья
                                Белова, Юлия
                                Зотова</p>
                            <h4 class="italic">Формат: {{ $course->format }}</h4>
                            <div class="space-y-1 prose text-gray-400 max-w-none">
                                {!! $course->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
        <div class="max-w-md mx-auto mt-12">
            @if (isset($courses))
            {{ $courses->links() }}
            @endif
        </div>

        <x-user.footer :phones="$phones" />
    </div>
</x-user-layout>
