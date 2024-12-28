<x-user-layout>

    @include('partials.sidebar')

    @if (session('status') === 'error')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errorElement = document.getElementById('webform');
                if (errorElement) {
                    errorElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        </script>
    @endif

    <div>
        @if (isset($course))

            <div>
                <div class="p-8 pt-16 space-y-2 text-gray-500">
                    <h1 class="text-2xl text-center text-black uppercase md:w-3/4 xl:mx-auto xl:mb-8 xl:text-4xl">
                        {{ $course->title }}</h1>
                    <div class="gap-6 xl:flex">
                        <p class="text-gray-500 xl:flex-1 xl:text-3xl xl:text-right">
                            {{ $course->start_date->translatedFormat('j F Y') . ' года, ' . $course->start_time }}</p>
                        <div class="xl:flex-1">
                            <p class="italic text-brand-orange"><span class="text-gray-500">Ведущие:
                                </span>{{ $course->teachers->pluck('name')->map(fn($name) => strtoupper($name))->implode(', ') }}
                            </p>
                            <h4 class="italic">Формат: {{ $course->format }}</h4>
                            <div class="space-y-1 max-w-none">
                                {!! $course->price !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative block mx-auto overflow-hidden md:h-130 lg:w-3/4">
                    <img class="object-contain object-center w-full h-full" src="{{ Storage::url($course->image_path) }}"
                        alt="">
                </div>
                <div class="lg:flex">
                    <div>
                        <div class="p-8 space-y-2 text-gray-500">
                            @isset($course->supervisingTeacher)
                                <h3 class="font-bold text-black text-md">КОНТАКТЫ ДЛЯ ЗАПИСИ:</h3>
                                <a href="mailto:{{ $course->supervisingTeacher->email }}"
                                    class="text-brand-orange">{{ $course->supervisingTeacher->email }}</a>
                                <p class="text-gray-500">{{ $course->supervisingTeacher->phone }} </p>
                                <div class="flex items-center gap-3">
                                    <a href="https://wa.me/{{ $course->supervisingTeacher->whatsapp }}"
                                        class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">WhatsApp</a>
                                    <a href="https://t.me/{{ $course->supervisingTeacher->telegram }}"
                                        class="block px-4 py-2 font-normal text-white transition-colors border border-brand-orange bg-brand-orange w-min hover:bg-white hover:text-brand-orange">Telegram</a>
                                </div>
                                <h3 class="font-bold text-black text-md">{{ $course->supervisingTeacher->name }}</h3>
                            @endisset
                        </div>
                        <div class="px-8 space-y-2 html-content">
                            {!! $course->content !!}
                        </div>
                    </div>
                    <div class="max-w-[35%] px-8 md:mt-4 lg:mr-16 xl:mr-32">
                        @if ($course->schedules->isNotEmpty())

                        <h3 class="my-2 text-lg font-bold text-black">Расписание</h3>
                        <div class="grid">
                            @foreach ($course->schedules as $schedule)
                                <div class="p-2 text-sm border border-gray-300 even:bg-gray-100 even:text-gray-500">
                                    {!! $schedule->content !!}
                                </div>
                            @endforeach
                        </div>
                        @endif

                        <hr class="my-8">

                        <div
                            class="hidden px-4 py-2 text-base font-medium text-center text-white uppercase transition-opacity lg:text-xl md:block bg-brand-orange">
                            ОСТАВИТЬ ЗАЯВКУ НА КУРС</div>

                        <hr class="my-4">


                            <x-user.webform :recipient_email="$course->supervisingTeacher->email ?? 'admin@bespokewebsites.ru'" />

                    </div>
                </div>
            </div>

            <div class="xl:max-w-6xl ">
                <div class="px-8 space-y-2 html-content">
                    {!! $course->reviews !!}
                </div>
            </div>

        @endif

        @include('partials.footer')
    </div>
</x-user-layout>
