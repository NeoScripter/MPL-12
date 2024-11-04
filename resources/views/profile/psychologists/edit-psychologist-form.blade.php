@if (isset($psychologist))
    <section>
        <form method="POST" action="{{ route('psychologist.update', $psychologist->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('psychologists') }}">Назад</x-user.link>
            </div>
            <hr>


            <x-form-field name="name" label="Имя психолога" :value="$psychologist->name" />

            <x-form-field name="education" label="Подробное описание психолога" :is-textarea="true" :value="$psychologist->education" />

            <x-form-field name="quote" label="Цитата на основной странице" :is-textarea="true" :value="$psychologist->quote" />

            <x-user.image-upload label="Главное фото психолога" :image-path="$psychologist->main_image_path" alt-text="Главное фото"
                new-label="Новое фото" input-id="main_image" input-name="main_image" />

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-teacher-deletion')">{{ __('Удалить психолога') }}</x-danger-button>

            </div>

        </form>

    </section>

    <x-modal name="confirm-teacher-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('psychologist.destroy', $psychologist) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить этого психолога?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                В случае удаления психолога, вся информация, связанная с ним будет безвозвратно
                удалена.
            </p>

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
