<x-user-layout>

    @include('partials.sidebar')

    <div class="px-4">
        <div class="pt-20 my-8 md:flex md:pt-0 md:gap-10">
            <div class="flex-1 max-w-5xl">
                <p class="text-gray-400">
                    Для того чтобы договориться о индивидуальной супервизии, вы можете позвонить по телефону или
                    отправить нам сообщение. Пожалуйста, указывайте в сообщении ваш контактный номер телефона.
                </p>
                <p class="mt-2 font-bold text-brand-orange">Телефон: +7(968)930-29-01, Анастасия</p>
            </div>
        </div>
        <div class="relative 3xl:[columns:6] xl:[columns:5] lg:[columns:3] 2sm:[columns:2] [column-gap:0]">
            @if (isset($teachers))
                @foreach ($teachers as $teacher)
                    @if ($teacher->main_image_path)
                        <a href="{{ route('teacher.show', $teacher->id) }}" class="block col-span-2 break-inside-avoid">
                            <div
                                class="relative block overflow-hidden after:inset-0 after:z-20 after:bg-white after:opacity-20 after:absolute after:hover:opacity-0 after:transition-opacity group">
                                <img class="object-cover object-center w-full h-full transition-transform duration-500 group-hover:scale-110"
                                    src="{{ Storage::url($teacher->main_image_path) }}" alt="">
                            </div>
                        @else
                            <a href="{{ route('teacher.show', $teacher->id) }}" class="block break-inside-avoid">
                    @endif
                    <div class="p-4 border border-gray-300/40">
                        <h3 class="w-10/12 mx-auto text-base font-bold text-center md:text-lg">
                            {{ $teacher->name }}</h3>
                        <div class="space-y-1 prose text-gray-500 max-w-none">
                            {!! $teacher->quote !!}
                        </div>
                    </div>
                    </a>
                @endforeach
            @endif
        </div>

        <style>
            .grid-m {
                --columns: 6;
                display: column;
                columns: var(--columns);
            }

            .grid-m>* {
                break-inside: avoid;
            }

            .featured {
                grid-column: span 2;
            }
        </style>

        @include('partials.footer')
    </div>
</x-user-layout>
