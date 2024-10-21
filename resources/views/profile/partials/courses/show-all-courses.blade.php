<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все курсы
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($courses))
            @foreach ($courses as $course)
            <hr>
            <div>
                <div>
                    <p class="block mb-1 font-bold text-black font-sm text-md">{{ $course->title }}</p>
                </div>
                <div>
                    <p class="block mb-1 text-gray-700 font-sm text-md">{{ $course->start_date }}</p>
                </div>
                <div>
                    <figure class="relative max-w-sm mb-1">
                        <img class="rounded-lg"
                                src="{{ Storage::url($course->image_path) }}"
                                alt="image description">
                    </figure>
                </div>
                <div>
                    <p class="block font-normal text-black font-sm text-md">{!!  $course->description !!}</p>
                </div>
                <x-user.link href="{{ route('dashboard.edit', $course) }}">{{ __('Редактировать') }}</x-user.link>
            </div>
            @endforeach

            {{ $courses->links() }}
        @else
            <p class="no-courses-message">Нет ни одного курса</p>
        @endif


    </div>

</section>

@if (session('status') === 'course-deleted')
<p x-data="{ show: true }" x-show="show" x-transition
    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
    {{ __('Курс удален.') }}</p>
@endif
