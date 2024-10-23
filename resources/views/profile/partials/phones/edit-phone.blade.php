@if (isset($phone))
<section>
    <form method="POST" action="{{ route('phones.update', $phone->id) }}" class="mt-4 space-y-4">
        @csrf
        @method('PUT')

        <div class="flex items-center gap-4">
            <a href="{{ route('phones') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Назад</a>

        </div>

        <hr>
        <div>
            <x-input-label for="number" :value="__('Телефон')" />
            <x-text-input id="number" name="number" type="text" class="block w-full mt-1" value="{{ $phone->number }}"/>
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Емаил')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" value="{{ $phone->email }}"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="text" :value="__('Описание')" />
            <x-text-area id="text" name="text" class="block w-full mt-1 wysiwyg-editor">{{ $phone->text }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('text')" />
        </div>

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
