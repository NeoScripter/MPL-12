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
                    $menuNames = json_decode($info->menu_names, true);

                    $routes = [
                        'event-schedule',
                        'basiccourse',
                        'basicoffline',
                        'softskills',
                        'specialists',
                        'training',
                        'index',
                        'supervisions',
                        'videolessons',
                        'consultants',
                        'graduates',
                        'vids',
                        'contacts',
                    ];
                @endphp

                @foreach ($menuNames as $index => $menuName)
                    @php
                        if (!$info->show_offline_course && $routes[$index] === 'basicoffline') {
                            continue;
                        }
                        if (!$info->show_schedule && $routes[$index] === 'event-schedule') {
                            continue;
                        }
                        $new_page =
                            $routes[$index] === 'basiccourse' || $routes[$index] === 'softskills' ? true : false;
                        $route = $routes[$index] ?? 'dummy';
                    @endphp

                    <x-sidebar-link :route="$route" :content="$menuName" :new_page="$new_page" />
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
        <div class="fixed z-30 flex items-center max-w-full p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-80 left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
            role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            <div class="space-y-3 text-lg font-normal text-gray-800 text-balance">
                <p>Ваша заявка принята. Ожидайте письмо с информация по курсу на указанную почту.</p>
                <p>p.s. При записи менее. чем за 24 часа до начала, не можем гарантировать, что успеем обработать вашу
                    заявку, пожалуйста, свяжитесь с куратором направления.</p>
                <p>p.p.s. Рекомендуем проверить папки СПАМ и РАССЫЛКИ, если письма не будет во входящих</p>
            </div>
        </div>
    @endif
</div>
