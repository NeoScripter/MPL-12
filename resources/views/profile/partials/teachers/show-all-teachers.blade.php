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
                        <img class="rounded-lg"
                                src="{{ Storage::url($teacher->main_image_path) }}"
                                alt="image description">
                    </figure>
                </div>
                @endif

                <x-user.link href="{{ route('teachers.edit', $teacher) }}">{{ __('Редактировать') }}</x-user.link>
            </div>
            @endforeach

            {{ $teachers->links() }}
        @else
            <p class="no-courses-message">Нет ни одного преподавателя</p>
        @endif


    </div>

</section>

@if (session('status') === 'teacher-deleted')
<p x-data="{ show: true }" x-show="show" x-transition
    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
    {{ __('Курс удален.') }}</p>
@endif
