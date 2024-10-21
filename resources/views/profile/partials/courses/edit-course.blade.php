@if (isset($course))
<section>
    <form method="POST" action="{{ route('dashboard.update', $course->id) }}"
        enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf
        @method('PUT')


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-course-deletion')">{{ __('Удалить курс') }}</x-danger-button>

        </div>
        <hr>

        <div>
            <x-input-label for="title" :value="__('Название курса')" />
            <x-text-input id="title" name="title" type="text"
                class="block w-full mt-1" value="{{ $course->title }}" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="format" :value="__('Формат курса')" />
            <x-text-input id="format" name="format" type="text"
                class="block w-full mt-1" value="{{ $course->format }}" />
            <x-input-error class="mt-2" :messages="$errors->get('format')" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Дата начала курса')" />
            <x-text-input id="date" name="date" type="text"
                class="block w-full mt-1" value="{{ $course->start_date }}" />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="description" :value="__('Описание курса')" />
            <x-text-area id="description" name="description"
                class="block w-full mt-1 wysiwyg-editor">{{ $course->description }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="content" :value="__('Подробное содержание курса')" />
            <x-text-area id="content" name="content"
                class="block w-full mt-1 wysiwyg-editor">{{ $course->content }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="price" :value="__('Цена курса')" />
            <x-text-area id="price" name="price" class="block w-full mt-1 wysiwyg-editor">{{ $course->price }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="reviews" :value="__('Отзывы курса')" />
            <x-text-area id="reviews" name="reviews" class="block w-full mt-1 wysiwyg-editor">{{ $course->reviews }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('reviews')" />
        </div>

        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Фото курса</p>
            <div>
                <figure class="relative max-w-sm mb-1">
                    <img class="rounded-lg" src="{{ Storage::url($course->image_path) }}"
                        alt="image description">
                </figure>

            </div>

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                for="image">Новое фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" name="image" type="file">
        </div>

        <div class="space-y-4">
            <div class="space-y-4">
                <div>
                    <x-input-label for="schedule" :value="__('Добавить график')" />
                    <x-text-input id="schedule" name="schedule" type="text"
                        class="block w-full mt-1" form="add-schedule-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('schedule')" />
                </div>

                <x-primary-button type="submit" form="add-schedule-form">
                    {{ __('Добавить') }}
                </x-primary-button>
            </div>
        </div>
    </form>
    <div class="mt-6">
        <hr>
        <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Расписания курса</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <tbody>
                    @forelse ($course->schedules as $schedule)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center gap-2 px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-md">
                                {{ $schedule->content }}

                                <!-- Delete Form -->
                                <form class="block ml-auto"
                                    action="{{ route('schedules.destroy', $schedule->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xl">
                                        &times;
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2"
                                class="px-6 py-4 text-sm text-center text-gray-700">
                                У курса пока нет расписаний
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

<form id="add-schedule-form" action="{{ route('schedules.store', $course->id) }}"
    method="POST">
    @csrf
</form>

<x-modal name="confirm-course-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('dashboard.destroy', $course) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            Вы уверены, что хотите удалить этот курс?
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            В случае удаления курса, вся информация, связанная с ним будет безвозвратно
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
