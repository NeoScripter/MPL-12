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

        <div>
            <x-input-label for="title" :value="__('Название курса')" />
            <x-text-input id="title" name="title" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="format" :value="__('Формат курса')" />
            <x-text-input id="format" name="format" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('format')" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Дата начала курса')" />
            <x-text-input id="date" name="date" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="description" :value="__('Описание курса')" />
            <x-text-area id="description" name="description" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="content" :value="__('Подробное содержание курса')" />
            <x-text-area id="content" name="content" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="price" :value="__('Цена курса')" />
            <x-text-area id="price" name="price" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="reviews" :value="__('Отзывы курса')" />
            <x-text-area id="reviews" name="reviews" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('reviews')" />
        </div>

        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Фото курса</p>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                for="image">Новое фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" name="image" type="file">
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Создать') }}</x-primary-button>

            @if (session('status') === 'course-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>

</section>
