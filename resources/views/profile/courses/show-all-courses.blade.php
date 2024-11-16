<section>
    <div>
        <h2 class="flex flex-wrap items-center justify-between gap-4 text-lg font-medium text-gray-900">
            Все курсы

            <form class="max-w-sm sm:ml-auto w-100 shrink-0" method="GET"
                onsubmit="event.preventDefault(); window.location.href = '/admin/' + encodeURIComponent(this.search.value);">
                <label for="default-search"
                    class="text-sm font-medium text-gray-900 sr-only dark:text-white">Поиск</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-gray-900 focus:border-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Найти курс..." />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Поиск</button>
                </div>
            </form>
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($courses))
            @if ($courses->isNotEmpty())
                @foreach ($courses as $course)
                    <hr>
                    <div>
                        <div>
                            <p class="block mb-1 font-bold text-black font-sm text-md">{{ $course->title }}</p>
                        </div>
                        <div>
                            <p class="block mb-1 text-gray-700 font-sm text-md">{{ $course->start_date }}</p>
                        </div>
                        @if ($course->image_path)
                            <div>
                                <figure class="relative max-w-sm mb-1">
                                    <img class="rounded-lg" src="{{ Storage::url($course->image_path) }}"
                                        alt="image description">
                                </figure>
                            </div>
                        @endif

                        <div>
                            <p class="block max-w-xl font-normal text-black font-sm text-md">{!! $course->description !!}</p>
                        </div>
                        <x-user.link
                            href="{{ route('dashboard.edit', $course) }}">{{ __('Редактировать') }}</x-user.link>
                    </div>
                @endforeach
            @else
                <p class="no-courses-message">Не найдено ни одного курса</p>
            @endif

            {{ $courses->links() }}
        @else
            <p class="no-courses-message">Нет ни одного курса</p>
        @endif


    </div>

</section>

@if (session('status') === 'course-deleted')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
        {{ __('Курс удален.') }}</p>
@endif

@if (session('status') === 'success')
    <div class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
