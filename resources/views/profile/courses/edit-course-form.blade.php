@if (isset($course))
    <section>
        <form method="POST" action="{{ route('dashboard.update', $course->id) }}" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4">
                <x-user.link href="{{ route('dashboard') }}">Назад</x-user.link>
            </div>
            <hr>

            <x-form-field name="title" label="Название курса" :value="$course->title" />

            <x-form-field name="format" label="Формат курса" :value="$course->format" />

            <x-form-field name="date" label="Дата начала курса" :value="$course->start_date" />

            <x-form-field name="description" label="Описание курса" :is-textarea="true" :value="$course->description" />

            <x-form-field name="content" label="Подробное содержание курса" :is-textarea="true" :value="$course->content" />

            <x-form-field name="price" label="Цена курса" :is-textarea="true" :value="$course->price" />

            <x-form-field name="reviews" label="Отзывы курса" :is-textarea="true" :value="$course->reviews" />

            <div>
                <x-input-label :value="__('Добавить преподавателей курса')" />
                <ul
                    class="mt-1 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg w-72 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    @foreach ($teachers as $teacher)
                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="teacher-{{ $teacher->id }}" type="checkbox" name="teachers[]"
                                    value="{{ $teacher->id }}"
                                    {{ in_array($teacher->id, $courseTeachers) ? 'checked' : '' }}
                                    class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2">
                                <label for="teacher-{{ $teacher->id }}"
                                    class="w-full py-3 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $teacher->name }}</label>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>

            <x-user.image-upload label="Фото курса" :image-path="$course->image_path" alt-text="Главное фото"
                new-label="Новое фото" input-id="image" input-name="image" />

            <div class="flex items-center gap-4">

                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>

                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-course-deletion')">{{ __('Удалить курс') }}</x-danger-button>

            </div>
            <hr>
        </form>
        <div class="mt-6">
            <p class="block mt-6 mb-2 text-sm font-medium text-gray-700">Расписания курса</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <tbody>
                        @forelse ($course->schedules as $schedule)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center gap-2 px-6 py-2 font-medium text-gray-900 dark:text-white text-md">
                                    {{ $schedule->content }}

                                    <!-- Delete Form -->
                                    <form class="block ml-auto"
                                        action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
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
                                <td colspan="2" class="px-6 py-4 text-sm text-center text-gray-700">
                                    У курса пока нет расписаний
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6 space-y-4">
            <hr>
            <div class="space-y-4">
                <div>
                    <x-input-label for="schedule" :value="__('Добавить расписание')" />
                    <x-text-input id="schedule" name="schedule" type="text" class="block w-full mt-1"
                        form="add-schedule-form" />
                    <x-input-error class="mt-2" :messages="$errors->get('schedule')" />
                </div>

                <x-primary-button type="submit" form="add-schedule-form">
                    {{ __('Добавить') }}
                </x-primary-button>
            </div>
        </div>


    </section>

    <form id="add-schedule-form" action="{{ route('schedules.store', $course->id) }}" method="POST">
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
