<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все выпускники
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($graduates))
            @foreach ($graduates as $graduate)
                <hr>
                <div>
                    <div>
                        <p class="block mb-1 font-bold text-black font-sm text-md">{{ $graduate->name }}</p>
                    </div>
                    @if ($graduate->main_image_path)
                        <div>
                            <figure class="relative max-w-sm mb-1">
                                <img class="rounded-lg" src="{{ Storage::url($graduate->main_image_path) }}"
                                    alt="image description">
                            </figure>
                        </div>
                    @endif

                    <x-user.link href="{{ route('graduate.edit', $graduate) }}">{{ __('Редактировать') }}</x-user.link>
                </div>
            @endforeach

            @if (isset($graduates))
                {{ $graduates->links() }}
            @endif
        @else
            <p class="no-courses-message">Нет ни одного выпускника</p>
        @endif


    </div>

</section>

@if (session('status') === 'success')
    <div class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
