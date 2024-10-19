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
            <x-text-input id="date" name="date" type="date" class="block w-full mt-1" />
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
            <p class="block mb-1 text-sm font-medium text-gray-700">Фото курса</p>
            <div class="flex items-center justify-center w-full">
                <label for="image"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Выберите файл</span> или перетащите его</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG или GIF (MAX. 1200x600px)</p>
                    </div>
                    <input id="image" name="image" type="file" class="hidden" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>
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
