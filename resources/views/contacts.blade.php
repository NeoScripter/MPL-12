<x-user-layout>

    {{-- <x-user.sidebar :phones="$phones" :info="$info" /> --}}
    @include('partials.sidebar')

    <div>
        <div x-data="{ showModal: {{ session('status') === 'error' ? 'true' : 'false' }} }" x-cloak
            class="relative bg-[url('/images/hero.jpg')] bg-cover bg-center bg-no-repeat min-h-96 w-full pt-24 px-16">
            <h1 class="mb-1 text-2xl font-medium bg-white sm:text-4xl shadow-white-large max-w-max">Психологическое
                консультирование
                онлайн</h1>
            <h2 class="mb-4 text-base font-medium bg-white sm:text-2xl md:mb-12 shadow-white-large max-w-max">Базовый
                курс обучения
            </h2>
            <button @click="showModal = true"
                class="block px-4 py-2 font-normal text-white transition-colors border bg-brand-orange w-max hover:bg-white hover:text-brand-orange border-brand-orange">
                Оставить заявку
            </button>

            <div x-show="showModal" x-transition tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full max-h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 bg-black/50">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative p-8 bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between py-4 mb-3 border-b rounded-t md:py-5 dark:border-gray-600">
                            <h3 class="text-lg font-medium uppercase sm:text-2xl text-brand-orange dark:text-white">
                                Записаться на курс
                            </h3>
                            <button type="button" @click="showModal = false"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="small-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <x-user.webform />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-10/12 mx-auto mt-8 xl:mt-12">
            <div class="lg:flex lg:gap-8">
                <div class="flex-1 mb-8 h-80 lg:order-2">
                    <iframe src="https://yandex.com/map-widget/v1/-/CDhpvQyL?lang=ru_RU" width="100%" height="100%" frameborder="0"></iframe>
                </div>
                    <div class="flex-1 mb-8">
                        <h3 class="mb-2 font-bold text-brand-orange">Адрес</h3>
                        <div class="font-base">Адрес: ул Новая Басманная 23б с20.
                            <br class="mb-2">
                            метро Красные Ворота
                            <br class="mb-2">
                            Как пройти: с Новой Басманной войти в железные ворота около дома 23c1, пройти прямо, сквозь арку,
                            дальше тоже прямо.
                            <br class="mb-2">
                            Не доходя до железных ворот увидите справа дверь, вам туда. Охраннику сказать что
                            в МПЛ, он пропустит.
                            <br class="mb-2">
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

        {{--  <x-user.footer :phones="$phones" :info="$info" /> --}}
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
