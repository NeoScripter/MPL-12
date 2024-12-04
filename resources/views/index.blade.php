<x-user-layout>

    {{-- <x-user.sidebar :phones="$phones" :info="$info" /> --}}
    @include('partials.sidebar')

    <div>
        <div
        x-data="{ showModal: {{ session('status') === 'error' ? 'true' : 'false' }} }"
        x-cloak
        class="relative bg-[url('/images/hero.jpg')] bg-cover bg-center bg-no-repeat min-h-96 w-full pt-24 px-16">
            <h1 class="mb-1 text-2xl font-medium bg-white sm:text-4xl shadow-white-large max-w-max">Психологическое
                консультирование
                онлайн</h1>
            <h2 class="mb-4 text-base font-medium bg-white sm:text-2xl md:mb-12 shadow-white-large max-w-max">Базовый
                курс обучения
            </h2>
            <button
                @click="showModal = true"
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
                            <button type="button"
                                @click="showModal = false"
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
        <div
            class="grid w-10/12 gap-8 mx-auto mt-8 sm:grid-cols-auto-fit-240 xl:grid-cols-3 md:gap-12 md:mt-12 md:w-10/12">
            @if (isset($courses))
                @foreach ($courses as $course)
                    <div>
                        <a href="{{ route('dashboard.show', $course->id) }}"
                            class="relative block overflow-hidden after:inset-0 after:z-20 after:bg-white after:opacity-0 after:absolute after:hover:opacity-70 after:transition-opacity">
                            <img class="object-cover object-center w-full h-full"
                                src="{{ Storage::url($course->image_path) }}" alt="Фотография курса">
                        </a>
                        <h3 class="w-10/12 mx-auto my-2 text-xl font-bold text-center md:text-2xl text-brand-orange">
                            {{ $course->title }}</h3>
                        <div class="grid gap-1 py-3 border-t border-b border-gray-300">
                            <span class="font-normal text-gray-500 text-md">{{ $course->start_date->translatedFormat('j F Y') . ' года' }}
                            </span>
                            <h4 class="italic">Ведущие:</h4>
                            <p class="italic text-brand-orange">{{ $course->teachers->pluck('name')->implode(', ') }}</p>
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
