<x-user-layout>

    <x-user.sidebar :phones="$phones" />

    <div>
        @if (isset($course))

            <div>
                <div class="p-8 pt-16 space-y-2 text-gray-500">
                    <h1 class="text-2xl text-center text-black uppercase md:w-3/4 xl:mx-auto xl:mb-8 xl:text-4xl">
                        {{ $course->title }}</h1>
                    <div class="gap-6 xl:flex">
                        <p class="text-gray-500 xl:flex-1 xl:text-3xl xl:text-right">{{ $course->start_date }}</p>
                        <div class="xl:flex-1">
                            <p class="italic text-brand-orange"><span class="text-gray-500">Ведущие:</span> Александр
                                Мусихин, Алексей Андреев-Чадаев, Арман
                                Бекенов, Дмитрий Шаповалов, Ирина Андреева-Чадаева, Марианна Шипицына, Наталья
                                Белова, Юлия
                                Зотова</p>
                            <h4 class="italic">Формат: {{ $course->format }}</h4>
                            <div class="space-y-1 max-w-none">
                                {!! $course->price !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative block mx-auto overflow-hidden md:h-130 lg:w-3/4">
                    <img class="object-cover object-center w-full h-full" src="{{ Storage::url($course->image_path) }}"
                        alt="">
                </div>
                <div class="lg:flex">
                    <div>
                        <div class="p-8 space-y-3 text-gray-500">
                            <h3 class="font-bold text-black text-md">Для записи свяжитесь с куратором:</h3>
                            <a href="" class="text-brand-orange">online.curator@mospsylab.ru</a>
                            <p class="text-gray-500">+7(925)506-17-12 </p>
                            <div class="flex items-center gap-3">
                                <button
                                    class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">WhatsApp</button>
                                <button
                                    class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">Telegram</button>
                            </div>
                            <h3 class="font-bold text-black text-md">Татьяна Князева</h3>
                            <h3 class="font-bold text-black text-md">Узнать подробности об онлайн-обучении в МПЛ12:</h3>
                            <a href="https://online.mpl12.institute/"
                                class="text-brand-orange">https://online.mpl12.institute/</a>
                            <h3 class="font-bold text-black text-md">Особенности нашего подхода к обучению:</h3>
                            <a href="http://mpl12.ru/obuchenie/osobennosti-nashego-podhoda-k-obucheniyu/"
                                class="text-brand-orange">http://mpl12.ru/obuchenie/osobennosti-nashego-podhoda-k-obucheniyu/</a>
                        </div>
                        <div class="px-8 space-y-2 html-content">
                            {!! $course->content !!}
                        </div>
                    </div>
                    <div class="px-8 md:mt-4 lg:mr-16 xl:mr-32">
                        <h3 class="my-2 text-lg font-bold text-black">Расписание</h3>
                        <div class="grid">
                            @foreach ($course->schedules as $schedule)
                                <div class="p-2 text-sm border border-gray-300 even:bg-gray-100 even:text-gray-500">
                                    {{ $schedule->content }}
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-8">

                        <div class="hidden px-4 py-2 text-base font-medium text-center text-white uppercase transition-opacity lg:text-xl md:block bg-brand-orange">Запись по контактам в анонсе курса</div>

                        <hr class="my-4">

                        <x-user.webform />

                    </div>
                </div>
            </div>

            <div>
                <h3 class="my-4 font-bold text-center text-black text-md">Отзывы о курсе</h3>
                <div class="px-8 space-y-2 html-content">
                    {!! $course->reviews !!}
                </div>
            </div>

        @endif

        <x-user.footer :phones="$phones" />
    </div>
</x-user-layout>
