<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Добавить телефон
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные
        </p>
    </div>


    <form method="POST" action="{{ route('phones.create') }}" class="mt-4 space-y-4">
        @csrf

        <div>
            <x-input-label for="number" :value="__('Телефон')" />
            <x-text-input id="number" name="number" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Емаил')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="text" :value="__('Описание')" />
            <x-text-area id="text" name="text" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('text')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Добавить') }}</x-primary-button>

            @if (session('status') === 'phone-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>

</section>
