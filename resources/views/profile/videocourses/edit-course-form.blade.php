@if (isset($videocourse))
    <section>
        <form method="POST" action="{{ route('videocourse.update', $videocourse->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('videocourses') }}">Назад</x-user.link>
            </div>
            <hr>

            <x-form-field name="title" label="Название видеокурса" :value="$videocourse->title" />

            <x-form-field name="link" label="Ссылка на видеокурс" :value="$videocourse->link" />

            <x-form-field name="description" label="Описание видеокурса" :is-textarea="true" :value="$videocourse->description" />

            <x-user.image-upload label="Фото курса" :image-path="$videocourse->image_path" alt-text="Главное фото"
                new-label="Новое фото" input-id="image" input-name="image" />

            <div class="flex items-center gap-4">

                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-course-deletion')">{{ __('Удалить видеокурс') }}</x-danger-button>

            </div>
            <hr>
        </form>

    </section>

    <x-modal name="confirm-course-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('videocourse.destroy', $videocourse) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить этот видеокурс?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                В случае удаления видеокурса, вся информация, связанная с ним будет безвозвратно
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
