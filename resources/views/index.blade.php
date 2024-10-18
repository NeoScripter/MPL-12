<x-user-layout>

    <header class="fixed z-10 w-full py-2 md:hidden">

        <div class="flex items-center justify-between w-4/5 mx-auto">
            <div class="overflow-hidden w-36">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <button class="w-12 overflow-hidden">
                <img src="{{ asset('images/burger.svg') }}" alt="">
            </button>
        </div>

    </header>

    <sidebar class="hidden md:grid">
        <div class="overflow-hidden">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>

        <nav>
            <ul>
                <li><a href="" class="link">Обучение: базовый курс онлайн</a></li>
                <li><a href="" class="link">Видео курсы</a></li>
                <li><a href="" class="link">SOFT SKILLS <br> Навыки жизни</a></li>
                <li><a href="" class="link">Супервизия</a></li>
                <li><a href="" class="link">Отзывы</a></li>
                <li><a href="" class="link">Текущие мероприятия. Уже стартовали</a></li>
                <li><a href="" class="link">Идет набор. Предварительная запись</a></li>
                <li><a href="" class="link">Команда психологов. МПЛ 12</a></li>
                <li><a href="" class="link">Доступная помощь. Выпускники МПЛ 12</a></li>
                <li><a href="" class="link">Видео</a></li>
            </ul>
        </nav>
    </sidebar>

    <div class="relative bg-[url('/images/hero.jpg')] bg-cover bg-center bg-no-repeat min-h-96 w-full pt-24 px-16">

        <h1 class="mb-1 text-4xl font-medium bg-white shadow-white-large">Психологическое консультирование онлайн</h1>
        <h2 class="mb-4 text-2xl font-medium bg-white shadow-white-large">Базовый курс обучения</h2>

        <a href="" class="block px-4 py-2 font-normal text-white bg-brand-orange w-max">Оставить заявку</a>
    </div>
</x-user-layout>
