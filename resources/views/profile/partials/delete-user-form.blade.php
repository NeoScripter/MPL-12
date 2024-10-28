<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Удалить аккаунт
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            После удаления вашего аккаунта все его ресурсы и данные будут удалены навсегда. ВАЖНО!! Не удаляйте аккаунт администратора, дабы не потерять доступ к админ панели.
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Удалить
        аккаунт</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить данный аккаунт?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                После удаления вашего аккаунта все его ресурсы и данные будут удалены навсегда. ВАЖНО!! Не удаляйте аккаунт администратора, дабы не потерять доступ к админ панели.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="block w-3/4 mt-1"
                    placeholder="{{ __('Пароль') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Отмена
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Удалить аккаунт
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
