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

        <x-form-field name="number" label="Телефон" />
        <x-form-field name="email" type="email" label="Емаил" />
        <x-form-field name="text" label="Описание" :is-textarea="true" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Добавить') }}</x-primary-button>

            @if (session('status') === 'phone-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>

</section>
