@if (isset($phone))
    <section>
        <form method="POST" action="{{ route('phones.update', $phone->id) }}" class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('phones') }}">Назад</x-user.link>
            </div>

            <hr>
            <x-form-field name="number" label="Телефон" :value="$phone->number" />
            <x-form-field name="email" type="email" label="Емаил" :value="$phone->email" />
            <x-form-field name="text" label="Описание" :value="$phone->text" :is-textarea="true" />

            <hr>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-phone-deletion')">{{ __('Удалить телефон') }}</x-danger-button>

            </div>
        </form>
    </section>

    <x-modal name="confirm-phone-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('phones.destroy', $phone) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить этот телефон?
            </h2>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Отмена') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Удалить') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
@endif
