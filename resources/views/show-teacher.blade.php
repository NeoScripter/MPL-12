<x-user-layout>

    <x-user.sidebar :phones="$phones" :info="$info" />

    <div class="px-6">
        @if (isset($teacher))
            <div class="pt-20 xl:mx-10 3xl:mx-40">
                <div class="flex gap-5">
                    @if ($teacher->main_image_path)
                        <div class="overflow-hidden lg:w-60 lg:flex-none">
                            <img class="object-cover object-top w-full h-full"
                                src="{{ Storage::url($teacher->main_image_path) }}" alt="">
                        </div>
                    @endif
                    <h3 class="flex-1 block my-2 text-3xl font-normal md:flex-none 2sm:text-5xl lg:text-6xl w-min">
                        {{ $teacher->name }}</h3>
                </div>
                <div class="my-4 xl:gap-16 2xl:gap:24 xl:flex">
                    <div class="basis-2/3">
                        <div class="space-y-1 prosehtml-content max-w-none">
                            {!! $teacher->quote !!}
                        </div>
                        @if ($teacher->secondary_image_path)
                            <div class="w-full my-4 overflow-hidden 2sm:m-4 2sm:float-right 2sm:w-52 lg:h-72 lg:w-60">
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ Storage::url($teacher->secondary_image_path) }}" alt="">
                            </div>
                        @endif
                        <div class="relative mt-4 space-y-1 pros html-content max-w-none">
                            {!! $teacher->education !!}
                        </div>
                    </div>
                    <div class="my-2 basis-1/3">
                        <h3 class="pl-2 mb-6 text-2xl font-medium">Обучение и мероприятия</h3>
                        @if ($teachersCourses)
                            <ul>
                                @foreach ($teachersCourses as $id => $title)
                                    <li>
                                        <a class="text-lg font-medium transition-opacity hover:opacity-70"
                                            href="{{ route('dashboard.show', $id) }}">
                                            {{ $title }}
                                        </a>
                                    </li>
                                    <hr class="my-1">
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="my-4 md:w-3/4">
                    <h2 class="my-4 text-2xl font-medium text-center md:my-6 md:text-3xl">Статьи</h2>

                    @if ($teacher->articles)
                        <ul class="space-y-2">
                            @foreach ($teacher->articles as $article)
                                <li>
                                    <a class="text-base font-normal md:text-lg text-brand-orange hover:underline"
                                        href="{{ $article->link }}">{{ $article->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endif

        <x-user.footer :phones="$phones" :info="$info" />
    </div>
</x-user-layout>
