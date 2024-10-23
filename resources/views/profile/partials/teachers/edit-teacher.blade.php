@if (isset($teacher))
    <section>
        <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <a href="{{ route('teachers') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Назад</a>

            </div>
            <hr>

            <div>
                <x-input-label for="name" :value="__('Имя преподавателя')" />
                <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                    value="{{ $teacher->name }}" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label class="mb-1" for="quote" :value="__('Цитата на основной странице')" />
                <x-text-area id="quote" name="quote"
                    class="block w-full mt-1 wysiwyg-editor">{{ $teacher->quote }}</x-text-area>
                <x-input-error class="mt-2" :messages="$errors->get('quote')" />
            </div>

            <div>
                <x-input-label class="mb-1" for="education" :value="__('Подробное описание преподавателя')" />
                <x-text-area id="education" name="education"
                    class="block w-full mt-1 wysiwyg-editor">{{ $teacher->education }}</x-text-area>
                <x-input-error class="mt-2" :messages="$errors->get('education')" />
            </div>

            <div>
                <p class="block mb-1 text-sm font-medium text-gray-700">Главное фото преподавателя</p>

                @if ($teacher->main_image_path)
                    <div>
                        <figure class="relative max-w-sm mb-1">
                            <img class="rounded-lg" src="{{ Storage::url($teacher->main_image_path) }}"
                                alt="image description">
                        </figure>

                    </div>
                @endif

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="main_image">Новое
                    фото</label>
                <input
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="main_image" name="main_image" type="file">
            </div>

            <div>
                <p class="block mb-1 text-sm font-medium text-gray-700">Второе фото преподавателя</p>
                @if ($teacher->secondary_image_path)
                    <div>
                        <figure class="relative max-w-sm mb-1">
                            <img class="rounded-lg" src="{{ Storage::url($teacher->secondary_image_path) }}"
                                alt="image description">
                        </figure>

                    </div>
                @endif

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="secondary_image">Новое
                    фото</label>
                <input
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="secondary_image" name="secondary_image" type="file">
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-teacher-deletion')">{{ __('Удалить преподавателя') }}</x-danger-button>

            </div>

        </form>
        <div class="mt-6">
            <hr>
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Статьи преподавателя</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <tbody>
                        @forelse ($teacher->articles as $article)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="relative flex items-center max-w-full gap-2 px-8 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-md">
                                    {{ $article->title }}

                                    <form class="absolute block w-2 h-2 ml-auto top-1 left-2"
                                    action="{{ route('article.destroy', $article->id) }}"
                                    method="POST">
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
                                <td colspan="2"
                                    class="px-6 py-4 text-sm text-center text-gray-700">
                                    У преподавателя пока нет статей
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-1">
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Добавить статью</p>
            <hr>
            <div class="space-y-2">
                <div>
                    <x-input-label for="articleTitle" :value="__('Название статьи')" />
                    <x-text-input id="articleTitle" name="articleTitle" type="text"
                        class="block w-full mt-1" form="add-article-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('articleTitle')" />
                </div>

                <div>
                    <x-input-label for="articleLink" :value="__('Ссылка на статью')" />
                    <x-text-input id="articleLink" name="articleLink" type="text"
                        class="block w-full mt-1" form="add-article-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('articleLink')" />
                </div>

                <x-primary-button type="submit" form="add-article-form">
                    {{ __('Добавить') }}
                </x-primary-button>
            </div>
        </div>

    </section>

    <form id="add-article-form" action="{{ route('article.store', $teacher->id) }}"
        method="POST">
        @csrf
    </form>

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
