<x-user-layout>

    <x-user.sidebar :phones="$phones" :info="$info" />

    <div class="px-6">
        @if (isset($psychologist))
            <div class="pt-20 xl:mx-10 3xl:mx-40">
                <div class="flex gap-5">
                    @if ($psychologist->main_image_path)
                        <div class="overflow-hidden lg:w-60 lg:flex-none">
                            <img class="object-cover object-top w-full h-full"
                                src="{{ Storage::url($psychologist->main_image_path) }}" alt="">
                        </div>
                    @endif
                    <h3 class="flex-1 block my-2 text-3xl font-normal md:flex-none 2sm:text-5xl lg:text-6xl w-min">
                        {{ $psychologist->name }}</h3>
                </div>
                <div class="my-4 xl:gap-16 2xl:gap:24 xl:flex">
                    <div class="basis-2/3">
                        <div class="space-y-1 prosehtml-content max-w-none">
                            {!! $psychologist->quote !!}
                        </div>
                        <div class="relative mt-4 space-y-1 pros html-content max-w-none">
                            {!! $psychologist->education !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <x-user.footer :phones="$phones" :info="$info" />
    </div>
</x-user-layout>
