<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Создать нового выпускника
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового выпускника
        </p>
    </div>


    <form method="POST" action="{{ route('graduate.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Имя выпускника')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="quote" :value="__('Цитата на основной странице')" />
            <x-text-area id="quote" name="quote"
                class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('quote')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="education" :value="__('Подробное описание выпускника')" />
            <x-text-area id="education" name="education"
                class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('education')" />
        </div>

        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Главное фото выпускника</p>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                for="main_image">Новое фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="main_image" name="main_image" type="file">
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Создать') }}</x-primary-button>

            @if (session('status') === 'graduate-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>

</section>
