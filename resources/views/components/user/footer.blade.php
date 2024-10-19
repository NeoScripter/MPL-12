<footer class="mt-8 text-white bg-black-800 md:mt-12">

    <div class="w-10/12 pt-4 pb-20 mx-auto">

        <h3 class="mb-4 text-xl">Телефоны</h3>

        <ul class="grid gap-x-20 gap-y-6 grid-cols-auto-fit-240">
            @for ($i = 0; $i < 5; $i++)
            <li>
                <a href="" class="hover:underline text-brand-orange text-md hover:text-gray-400">+7(925)441-74-12</a>
                <a href="" class="hover:underline text-brand-orange text-md hover:text-gray-400">prog.curator@mospsylab.ru</a>
                <p class="text-white">Запись на мероприятия и расстановки
                    Куратор мероприятий для всех желающих, Анна
                    Будни с 10 до 21 (телефон и WhatsApp)Суббота и воскресенье только WhatsApp</p>
            </li>
            @endfor

        </ul>
    </div>

    <div class="pt-3 pb-6 bg-black-700">
        <p class="w-10/12 mx-auto">© Копирайт - Московская Психологическая Лаборатория 12</p>
    </div>
</footer>
