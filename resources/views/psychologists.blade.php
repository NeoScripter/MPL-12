<x-user-layout>

    <x-user.sidebar :phones="$phones" :info="$info" />

    <div class="px-4">
        <div class="pt-20 my-8 md:flex md:pt-0 md:gap-10">
            <div class="flex-1 max-w-5xl">
                <p class="text-gray-400">
                    Здесь вы можете выбрать специалиста из числа наших психологов по цене сессии до 2500 рублей. Все психологи данного раздела прошли наш 1,5-годичный курс по психологическому консультированию и обладают необходимыми навыками для предоставления качественной психологической помощи. Мы отбираем специалистов по опыту, образованию и часам супервизии, и можем смело рекомендовать каждого.

                    Если затрудняетесь с выбором специалиста, позвоните или напишите по телефону координаторам:
                </p>
                <p class="mt-2 font-bold text-brand-orange">8-929-662-27-80 Ольга</p>
                <p class="mt-2 font-bold text-brand-orange">8-926-577-61-35 Юлия</p>
            </div>
        </div>
        <div class="relative 3xl:[columns:6] xl:[columns:5] lg:[columns:3] 2sm:[columns:2] [column-gap:0]">
            @if (isset($psychologists))
                @foreach ($psychologists as $psychologist)
                        @if ($psychologist->main_image_path)
                        <a href="{{ route('psychologist.show', $psychologist->id) }}" class="block col-span-2 break-inside-avoid">
                            <div
                                class="relative block overflow-hidden after:inset-0 after:z-20 after:bg-white after:opacity-20 after:absolute after:hover:opacity-0 after:transition-opacity group">
                                <img class="object-cover object-center w-full h-full transition-transform duration-500 group-hover:scale-110"
                                    src="{{ Storage::url($psychologist->main_image_path) }}" alt="">
                            </div>
                        @else
                        <a href="{{ route('psychologist.show', $psychologist->id) }}" class="block break-inside-avoid">
                        @endif
                        <div class="p-4 border border-gray-300/40">
                            <h3 class="w-10/12 mx-auto text-base font-bold text-center md:text-lg">
                                {{ $psychologist->name }}</h3>
                            <div class="space-y-1 prose text-gray-500 max-w-none">
                                {!! $psychologist->quote !!}
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

            .grid-m > * {
            break-inside: avoid;
            }
            .featured {
            grid-column: span 2;
            }
        </style>

        <x-user.footer :phones="$phones" :info="$info" />
    </div>
</x-user-layout>
