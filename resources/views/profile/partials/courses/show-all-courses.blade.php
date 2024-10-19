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
                    <p class="block mb-1 text-gray-700 font-sm text-md">{{ \Carbon\Carbon::parse($course->start_date)
        ->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <figure class="relative max-w-sm mb-1">
                        <img class="rounded-lg"
                                src="{{ Storage::url($course->image_path) }}"
                                alt="image description">
                    </figure>
                </div>
                <div>
                    <p class="block font-bold text-black font-sm text-md">{!!  $course->description !!}</p>
                </div>
            </div>
            @endforeach

            {{ $courses->links() }}
        @else
            <p class="no-courses-message">Нет ни одного курса</p>
        @endif

    </div>

</section>
