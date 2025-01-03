<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Разделы сайта
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        <form action="{{ route('general.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700" for="menu_names">Разделы меню</label>
                @php
                    $menuNames = json_decode($info->menu_names, true);
                    $menuNames = array_pad($menuNames, 12, '');
                @endphp

                @foreach ($menuNames as $index => $menuName)
                    <div class="mb-2 input-group">
                        <input type="text" name="menu_names[]"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ $menuName }}" placeholder="Menu Name {{ $index + 1 }}" required>
                    </div>
                @endforeach
            </div>

            <x-user.checkbox name="show_schedule" :checked="old('show_schedule', $info->show_schedule ?? false)">
                Показывать страницу с расписаниями в меню
            </x-user.checkbox>

            <x-user.checkbox name="show_offline_course" :checked="old('show_offline_course', $info->show_offline_course ?? false)">
                Показывать базовый очный курс в меню
            </x-user.checkbox>

            <!-- Address -->
            <div class="mb-3">
                <x-form-field name="address" label="Адрес" :value="$info->address" />
            </div>

            <!-- WhatsApp -->
            <div class="mb-3">
                <x-form-field name="whatsapp" label="WhatsApp" :value="$info->whatsapp" />
            </div>

            <!-- YouTube -->
            <div class="mb-3">
                <x-form-field name="youtube" label="YouTube" :value="$info->youtube" />
            </div>

            <!-- VK -->
            <div class="mb-3">
                <x-form-field name="vk" label="VK" :value="$info->vk" />
            </div>

            <!-- Telegram Channel -->
            <div class="mb-3">
                <x-form-field name="telegram_channel" label="Группа Telegram" :value="$info->telegram_channel" />
            </div>

            <!-- Telegram Group -->
            <div class="mb-6">
                <x-form-field name="telegram_group" label="Telegram канал" :value="$info->telegram_group" />
            </div>

            <div class="mb-3">
                <x-form-field name="banner_title" label="Заголовок баннера" :value="$info->banner_title" />
            </div>

            <div class="mb-3">
                <x-form-field name="banner_subtitle" label="Подзаголовок баннера" :value="$info->banner_subtitle" />
            </div>

            <div class="mb-3">
                <x-form-field name="banner_btn_text" label="Текст на кнопке баннера" :value="$info->banner_btn_text" />
            </div>

            <div class="mb-6">
                <x-user.image-upload label="Фото баннера" :image-path="$info->banner_image" alt-text="Фото баннера"
                new-label="(горизонтальное фото соотношением 4 : 1)" input-id="banner_image" input-name="banner_image" />
            </div>

            <div class="mb-6">
                <x-user.array-field field-name="format" label="Форматы курсов" singular-label="Формат курсов"
                    placeholder="" :values="$info->format ?? []" />
            </div>

            <!-- Submit Button -->
            <x-primary-button>Обновить данные</x-primary-button>
        </form>


    </div>

</section>

@if (session('status') === 'success')
    <div class="fixed flex items-center p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow w-max left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
        role="alert" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
        <div class="text-base font-normal text-center text-gray-600">
            {{ session('message') }}
        </div>
    </div>
@endif
