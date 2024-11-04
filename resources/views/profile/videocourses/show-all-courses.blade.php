<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все видеокурсы
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($videocourses))
            @foreach ($videocourses as $videocourse)
                <hr>
                <div>
                    <div>
                        <p class="block mb-1 font-bold text-black font-sm text-md">{{ $videocourse->title }}</p>
                    </div>
                    @if ($videocourse->image_path)
                        <div>
                            <figure class="relative max-w-sm mb-1">
                                <img class="rounded-lg" src="{{ Storage::url($videocourse->image_path) }}"
                                    alt="image description">
                            </figure>
                        </div>
                    @endif

                    <div>
                        <p class="block max-w-xl font-normal text-black font-sm text-md">{!! $videocourse->description !!}</p>
                    </div>
                    <x-user.link href="{{ route('videocourse.edit', $videocourse) }}">{{ __('Редактировать') }}</x-user.link>
                </div>
            @endforeach

            {{ $videocourses->links() }}
        @else
            <p class="no-courses-message">Нет ни одного видеокурса</p>
        @endif


    </div>

</section>

@if (session('status') === 'course-deleted')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
        {{ __('Курс удален.') }}</p>
@endif

@if (session('status') === 'success')
    <div
        class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert"
        x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
