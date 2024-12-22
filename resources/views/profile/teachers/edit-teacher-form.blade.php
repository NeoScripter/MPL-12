@if (isset($teacher))
    <section>
        <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('teachers') }}">Назад</x-user.link>
            </div>
            <hr>


            <x-form-field name="name" label="Имя преподавателя" :value="$teacher->name" />

            <x-select-field name="category" label="Категория преподавателя" :options="['Супервизор', 'Консультант', 'Выпускник']" placeholder="Категория преподавателя" :value="$teacher->category" />

            <x-form-field name="whatsapp" label="Whatsapp преподавателя" :value="$teacher->whatsapp" />

            <x-form-field name="telegram" label="Telegram преподавателя" :value="$teacher->telegram" />

            <x-form-field name="email" type="email" label="Email преподавателя" :value="$teacher->email" />

            <x-form-field name="phone" label="Телефон преподавателя" :value="$teacher->phone" />

            <x-form-field name="education" label="Подробное описание преподавателя" :is-textarea="true"
                :value="$teacher->education" />

            <x-form-field name="quote" label="Цитата на основной странице" :is-textarea="true" :value="$teacher->quote" />

            <x-user.image-upload label="Главное фото преподавателя" :image-path="$teacher->main_image_path" alt-text="Главное фото"
                input-id="main_image" input-name="main_image" />

            <x-user.image-upload label="Второе фото преподавателя" :image-path="$teacher->secondary_image_path" alt-text="Второе фото"
                input-id="secondary_image" input-name="secondary_image" />

            <div class="flex items-center gap-4 mt-6">
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-teacher-deletion')">{{ __('Удалить преподавателя') }}</x-danger-button>

            </div>

        </form>
        <div class="mt-6">
            <hr>
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Статьи преподавателя</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <tbody>
                        @forelse ($teacher->articles as $article)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="relative flex items-center max-w-full gap-2 px-8 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-md">
                                    {{ $article->title }}

                                    <form class="absolute block w-2 h-2 ml-auto top-1 left-2"
                                        action="{{ route('article.destroy', $article->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xl">
                                            &times;
                                        </button>
                                    </form>
                                </th>
                                @if ($article->link)
                                    <th scope="row"
                                        class="flex items-center gap-2 px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-md">
                                        {{ $article->link }}
                                    </th>
                                @else
                                    <th scope="row"
                                        class="flex items-center gap-2 px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-md">
                                        У статьи нет ссылки
                                    </th>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-sm text-center text-gray-700">
                                    У преподавателя пока нет статей
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <form class="mt-4 space-y-1" id="add-article-form" action="{{ route('article.store', $teacher->id) }}" method="POST">
            @csrf
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Добавить статью</p>
            <hr>
            <div class="space-y-2">
                <div>
                    <x-input-label for="articleTitle" :value="__('Название статьи')" />
                    <x-text-input id="articleTitle" name="articleTitle" type="text" class="block w-full mt-1"
                        form="add-article-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('articleTitle')" />
                </div>

                <div>
                    <x-input-label for="articleLink" :value="__('Ссылка на статью')" />
                    <x-text-input id="articleLink" name="articleLink" type="text" class="block w-full mt-1"
                        form="add-article-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('articleLink')" />
                </div>

                <x-primary-button type="submit" form="add-article-form" class="mt-1">
                    {{ __('Добавить') }}
                </x-primary-button>
            </div>
        </form>

    </section>

    <x-modal name="confirm-teacher-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('teachers.destroy', $teacher) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить этого преподавателя?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                В случае удаления преподавателя, вся информация, связанная с ним будет безвозвратно
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
