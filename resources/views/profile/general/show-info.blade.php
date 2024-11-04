<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Разделы сайта
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        <form action="{{ route('general.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700" for="menu_names">Разделы меню</label>
                @php
                    $menuNames = json_decode($info->menu_names, true);
                    $menuNames = array_pad($menuNames, 8, '');
                @endphp

                @foreach($menuNames as $index => $menuName)
                    <div class="mb-2 input-group">
                        <input type="text" name="menu_names[]" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $menuName }}" placeholder="Menu Name {{ $index + 1 }}" required>
                    </div>
                @endforeach
            </div>

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

            <!-- Submit Button -->
            <x-primary-button>Обновить данные</x-primary-button>
        </form>


    </div>

</section>

@if (session('status') === 'success')
    <div
        class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 -translate-x-1/2 bg-white divide-x divide-gray-200 rounded-lg shadow left-1/2 rtl:divide-x-reverse top-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800"
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
