<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все преподаватели
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($teachers))
            @foreach ($teachers as $teacher)
                <hr>
                <div>
                    <div>
                        <p class="block mb-1 font-bold text-black font-sm text-md">{{ $teacher->name }}</p>
                    </div>
                    @if ($teacher->main_image_path)
                        <div>
                            <figure class="relative max-w-sm mb-1">
                                <img class="rounded-lg" src="{{ Storage::url($teacher->main_image_path) }}"
                                    alt="image description">
                            </figure>
                        </div>
                    @endif

                    <x-user.link href="{{ route('teachers.edit', $teacher) }}">{{ __('Редактировать') }}</x-user.link>
                </div>
            @endforeach

            @if (isset($teachers))
                {{ $teachers->links() }}
            @endif
        @else
            <p class="no-courses-message">Нет ни одного преподавателя</p>
        @endif


    </div>

</section>

@if (session('status') === 'success')
    <div class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
