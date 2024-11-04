<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Создать новый видеокурс
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового видеокурса
        </p>
    </div>


    <form method="POST" action="{{ route('videocourse.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <x-form-field name="title" label="Название курса" />

        <x-form-field name="link" label="Ссылка на курс" />

        <x-form-field name="description" label="Описание курса" :is-textarea="true" />

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
