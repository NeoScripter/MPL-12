<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Добавить новое видео
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Введите необходимые данные для создания нового видео
        </p>
    </div>


    <form method="POST" action="{{ route('video.create') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <x-form-field name="title" label="Название видео" />

        <x-form-field name="link" label="Ссылка на видео" />

        <x-form-field name="description" label="Описание видео" :is-textarea="true" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Создать') }}</x-primary-button>


        </div>
    </form>

</section>
