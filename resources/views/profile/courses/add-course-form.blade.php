<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Создать новый курс
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового курса
        </p>
    </div>


    <form method="POST" action="{{ route('course.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <x-form-field name="title" label="Название курса" />

        <x-form-field name="format" label="Формат курса" />

        <div>
            <x-input-label :value="__('Видео курс')" />
            <div
                class="mt-1 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg w-72 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                <div class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="is_video" type="checkbox" name="is_video" value="1"
                            class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2">
                        <label for="is_video"
                            class="w-full py-3 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Да</label>
                    </div>
                </div>

            </div>
        </div>

        <x-form-field name="date" label="Дата начала курса" />

        <x-form-field name="description" label="Описание курса" :is-textarea="true" />

        <x-form-field name="content" label="Подробное содержание курса" :is-textarea="true" />

        <x-form-field name="price" label="Цена курса" :is-textarea="true" />

        <x-form-field name="reviews" label="Отзывы курса" :is-textarea="true" />

        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Фото курса</p>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Новое
                фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" name="image" type="file">
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Создать') }}</x-primary-button>


        </div>
    </form>

</section>
