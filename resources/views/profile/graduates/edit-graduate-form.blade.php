@if (isset($graduate))
    <section>
        <form method="POST" action="{{ route('graduate.update', $graduate->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('graduates') }}">Назад</x-user.link>
            </div>
            <hr>


            <x-form-field name="name" label="Имя выпускника" :value="$graduate->name" />

            <x-form-field name="education" label="Подробное описание выпускника" :is-textarea="true" :value="$graduate->education" />

            <x-form-field name="quote" label="Цитата на основной странице" :is-textarea="true" :value="$graduate->quote" />

            <x-user.image-upload label="Главное фото выпускника" :image-path="$graduate->main_image_path" alt-text="Главное фото"
                new-label="Новое фото" input-id="main_image" input-name="main_image" />

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-teacher-deletion')">{{ __('Удалить выпускника') }}</x-danger-button>

            </div>

        </form>

    </section>

    <x-modal name="confirm-teacher-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('graduate.destroy', $graduate) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить этого выпускника?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                В случае удаления выпускника, вся информация, связанная с ним будет безвозвратно
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
