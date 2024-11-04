<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все видео
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($videos))
            @foreach ($videos as $video)
                <hr>
                <div>
                    <div>
                        <p class="block mb-1 font-bold text-black font-sm text-md">{{ $video->title }}</p>
                    </div>

                    <div>
                        <p class="block max-w-xl font-normal text-black font-sm text-md">{!! $video->description !!}</p>
                    </div>
                    <x-user.link href="{{ route('video.edit', $video) }}">{{ __('Редактировать') }}</x-user.link>
                </div>
            @endforeach

            {{ $videos->links() }}
        @else
            <p class="no-courses-message">Нет ни одного видеокурса</p>
        @endif


    </div>

</section>

@if (session('status') === 'video-deleted')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
        {{ __('Видео удалено.') }}</p>
@endif

@if (session('status') === 'success')
    <div
        class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
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
