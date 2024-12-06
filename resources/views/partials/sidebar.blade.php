<div x-data="{ isShown: false }">
    <header class="fixed z-30 w-full py-2 bg-white/70 md:hidden">

        <div class="flex items-center justify-between w-4/5 mx-auto">
            <a href="{{ route('index') }}" class="block overflow-hidden w-36">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
            <button @click="isShown = true" class="w-12 overflow-hidden transition-opacity hover:opacity-90">
                <img src="{{ asset('images/burger.svg') }}" alt="">
            </button>
        </div>

    </header>

    <sidebar :class="isShown ? '' : 'translate-x-full'"
        class="fixed transition-transform duration-500 md:transform-none top-0 right-0 z-30 grid gap-6 px-8 pt-4 pb-12 md:pb-0 md:pt-0 bg-white md:static place-content-start max-w-full w-[317px] md:w-72 shrink-0">
        <a href="{{ route('index') }}" class="hidden overflow-hidden md:block">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>

        <button @click="isShown = false" class="ml-auto md:hidden">
            <img class="w-8 h-8" src="{{ asset('images/close-brg.svg') }}" alt="">
        </button>

        <nav class="text-black">
            <ul class="grid gap-4 text-base leading-none text-right md:text-xl">
                @php
                    // Decode the menu_names JSON into an array
                    $menuNames = json_decode($info->menu_names, true);

                    // Define a list of routes (keep order in sync with menuNames)
                    $routes = [
                        'basiccourse', 'softskills', 'specialists', 'training', 'index', 'supervisions', 'videolessons', 'consultants', 'graduates', 'vids', 'contacts'
                    ];
                @endphp

                <!-- Iterate over menu names and combine with routes -->
                @foreach ($menuNames as $index => $menuName)
                    @php
                        // Check if the route exists at the current index
                        $route = $routes[$index] ?? 'dummy'; // Default to 'dummy' if index doesn't exist
                    @endphp

                    <!-- Pass the route and content to x-sidebar-link -->
                    <x-sidebar-link :route="$route" :content="$menuName" />
                @endforeach
            </ul>
        </nav>

        <a href="mailto:admin@mospsylab.ru"
            class="flex items-center justify-center gap-3 p-2 transition-colors border border-brand-orange text-brand-orange mail-svg hover:bg-brand-orange">
            {!! file_get_contents(public_path('images/email.svg')) !!}
        </a>

        <style>
            .mail-svg:hover path {
                fill: white;
            }

            .mail-svg:hover rect {
                fill: #C3512F;
            }
        </style>

        <div class="hidden px-4 py-2 font-normal text-white transition-opacity md:block bg-brand-orange">Телефоны</div>

        <ul class="hidden gap-3 md:grid">

            @if (isset($phones))
                @foreach ($phones as $phone)
                    <li>
                        <a href="tel:{{ preg_replace('/\D/', '', $phone->number) }}"
                            class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->number }}</a>
                        @if ($phone->email)
                            <a href="mailto:{{ e($phone->email) }}"
                                class="block hover:underline text-brand-orange text-md hover:text-gray-400">{{ $phone->email }}</a>
                        @endif
                        <div class="text-gray-400">{!! $phone->text !!}</div>
                    </li>
                @endforeach

            @endif
        </ul>
    </sidebar>

    @if (session('status') === 'success')
    <div
        class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert"
        x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
</div>
