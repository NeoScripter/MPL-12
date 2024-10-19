<sidebar class="hidden px-8 place-content-start md:grid md:gap-6 md:w-72 shrink-0">
    <div class="overflow-hidden">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>

    <nav class="text-black">
        <ul class="gap-4 text-xl leading-none text-right md:grid">
            <?php $linkContent = ['Обучение: базовый курс онлайн', 'Видео курсы', "SOFT SKILLS \n Навыки жизни", 'Супервизия', 'Отзывы', 'Текущие мероприятия. Уже стартовали', 'Идет набор. Предварительная запись', 'Команда психологов. МПЛ 12', 'Доступная помощь. Выпускники МПЛ 12', 'Видео']; ?>
            @foreach ($linkContent as $link)
                <li><a href="" class="transition-colors hover:text-brand-orange">{{ $link }}</a></li>
            @endforeach
        </ul>
    </nav>

    <a href=""
        class="flex items-center justify-center gap-3 p-2 border border-brand-orange text-brand-orange">Напишите нам
        <img class="h-full" src="{{ asset('images/email.svg') }}" alt="">
    </a>

    <div class="flex items-center">
        <input class="w-9/12 bg-gray-100 border-none shrink-1 focus:ring-1 focus:ring-brand-orange" type="search"
            placeholder="Поиск...">
        <button class="flex items-center justify-center w-12 h-full cursor-pointer bg-brand-orange shrink-0">
            <img src="{{ asset('images/search.svg') }}" alt="">
        </button>

    </div>

    <div class="block px-4 py-2 font-normal text-white transition-opacity bg-brand-orange">Телефоны</div>

    <ul class="grid gap-3">
        @for ($i = 0; $i < 5; $i++)
        <li>
            <a href="" class="hover:underline text-brand-orange text-md hover:text-gray-400">+7(925)441-74-12</a>
            <a href="" class="hover:underline text-brand-orange text-md hover:text-gray-400">prog.curator@mospsylab.ru</a>
            <p class="text-gray-400">Запись на мероприятия и расстановки
                Куратор мероприятий для всех желающих, Анна
                Будни с 10 до 21 (телефон и WhatsApp)Суббота и воскресенье только WhatsApp</p>
        </li>
        @endfor

    </ul>
</sidebar>
