<x-user-layout>

    <x-user.sidebar :phones="$phones" :info="$info" />

    <div class="pt-24 md:pt-0">
        <div
            class="grid w-10/12 gap-8 mx-auto mt-8 sm:grid-cols-auto-fit-240 xl:grid-cols-3 md:gap-12 md:mt-12 md:w-10/12">
            @if (isset($videos))
                @foreach ($videos as $video)
                    <div>
                        <a href="{{ $video->link }}"
                            target="_blank"
                            class="relative grid p-4 border border-gray-300 rounded-sm place-content-center after:inset-0 after:z-20 after:bg-white after:opacity-0 after:absolute after:hover:opacity-70 after:transition-opacity">
                            <img class="object-cover object-center w-14 h-14"
                                src="{{ asset('images/link.svg') }}" alt="">
                        </a>
                        <h3 class="w-10/12 mx-auto my-2 text-xl font-bold text-center md:text-2xl text-brand-orange">
                            {{ $video->title }}</h3>
                        <div class="grid gap-1 py-3 border-t border-gray-300">
                            <div class="space-y-1 prose text-gray-400 max-w-none">
                                {!! $video->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
        <div class="max-w-md mx-auto mt-12">
            @if (isset($videos))
                {{ $videos->links() }}
            @endif
        </div>

        <x-user.footer :phones="$phones" :info="$info" />
    </div>
</x-user-layout>


@if (session('status') === 'success')
    <div class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
