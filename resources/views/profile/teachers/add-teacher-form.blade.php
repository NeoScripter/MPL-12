<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Создать нового преподавателя
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового преподавателя
        </p>
    </div>


    <form method="POST" action="{{ route('teachers.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4 create-teacher-form">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Имя преподавателя')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <x-select-field name="category" label="Категория преподавателя" :options="['Супервизор', 'Консультант', 'Выпускник']"
            placeholder="Категория преподавателя" />

        <x-form-field name="whatsapp" label="Whatsapp преподавателя" />

        <x-form-field name="telegram" label="Telegram преподавателя" />

        <x-form-field name="email" type="email" label="Email преподавателя" />

        <x-form-field name="phone" label="Телефон преподавателя" />

        <div>
            <x-input-label class="mb-1" for="quote" :value="__('Цитата на основной странице')" />
            <x-text-area id="quote" name="quote" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('quote')" />
        </div>

        <div>
            <x-input-label class="mb-1" for="education" :value="__('Подробное описание преподавателя')" />
            <x-text-area id="education" name="education" class="block w-full mt-1 wysiwyg-editor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('education')" />
        </div>

        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Главное фото преподавателя</p>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="main_image">Новое
                фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="main_image" name="main_image" type="file">
        </div>


        <div>
            <p class="block mb-1 text-sm font-medium text-gray-700">Второе фото преподавателя</p>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="secondary_image">Новое
                фото</label>
            <input
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="secondary_image" name="secondary_image" type="file">
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Создать') }}</x-primary-button>

            @if ($errors->any())

                <script>
                    window.addEventListener('load', () => {
                        const errorMessages = document.querySelector('.create-teacher-form');
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
