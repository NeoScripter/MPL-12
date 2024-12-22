<x-user-layout>

    @include('partials.sidebar')

    <div>
        @include('partials.banner')

        <div class="w-10/12 mx-auto mt-8 xl:mt-12">
            <div class="lg:flex lg:gap-8">
                <div class="flex-1 mb-8 h-80 lg:order-2">
                    <iframe src="https://yandex.com/map-widget/v1/-/CDhpvQyL?lang=ru_RU" width="100%" height="100%"
                        frameborder="0"></iframe>
                </div>
                <div class="flex-1 mb-8">
                    <h3 class="mb-2 font-bold text-brand-orange">Адрес</h3>
                    <div class="font-base">Адрес: ул Новая Басманная 23б с20.
                        <br class="mb-2" />
                        метро Красные Ворота
                        <br class="mb-2" />
                        Как пройти: с Новой Басманной войти в железные ворота около дома 23c1, пройти прямо, сквозь
                        арку, дальше тоже прямо.
                        <br class="mb-2" />
                        Не доходя до железных ворот увидите справа дверь, вам туда. Охраннику сказать что
                        в МПЛ, он пропустит.
                        <br class="mb-2" />
                        Навигатор может вводить в заблуждение — проход в лабораторию ТОЛЬКО с Новой Басманной улицы.
                    </div>
                </div>
            </div>
            <div class="grid gap-8 grid-cols-auto-fit-150 md:gap-12">
                @for ($i = 1; $i < 16; $i++)
                    <div class="overflow-hidden rounded">
                        <img src="{{ asset('images/contacts/contact-' . $i . '.jpg') }}" alt=""
                            class="object-cover object-center w-full h-full">
                    </div>
                @endfor
            </div>
        </div>

        @include('partials.footer')
    </div>
</x-user-layout>


@if (session('status') === 'success')
    <div class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
