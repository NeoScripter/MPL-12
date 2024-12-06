<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Создать новый курс
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового курса
        </p>
    </div>


    <form method="POST" action="{{ route('course.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4 create-course-form">
        @csrf

        <x-form-field name="title" label="Название курса" />

        <x-select-field name="category" label="Категория курса" :options="['Для специалистов и студентов', 'Тренинги', 'Подросткам и родителям']" placeholder="Категория курса" />

        <x-select-field name="format" label="Формат курса" :options="$courseFormats ?? []" placeholder="Формат курса" />

        <x-form-field class="w-60" name="date" type="date" label="Дата начала курса" />

        <x-form-field class="w-60" name="time" label="Время начала курса" />

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

            @if ($errors->any())

            <script>
                window.addEventListener('load', () => {
                    const errorMessages = document.querySelector('.create-course-form');
                    if (errorMessages) {
                        errorMessages.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            </script>
        @endif
        </div>
    </form>

</section>
