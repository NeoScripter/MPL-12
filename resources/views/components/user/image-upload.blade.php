<div>

    <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $inputId }}">
        {{ $label }}
    </label>

    @isset($newLabel)
        <p class="block mb-1 text-sm font-medium text-gray-700">{{ $newLabel }}</p>
    @endisset

    @if ($imagePath)
        <div x-data="{ isNull: false }">
            <figure class="relative max-w-sm mb-1">
                <img class="rounded-lg" :src="isNull ? null : '{{ Storage::url($imagePath) }}'"
                    alt="{{ $altText ?? 'Image' }}">
            </figure>
            <button
                class="text-white my-2 bg-gradient-to-r hover:bg-gradient-to-br focus:ring-4 focus:outline-none shadow-lg dark:shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                :class="isNull ? 'focus:ring-green-300 shadow-green-500/50 from-green-500 via-green-600 to-green-700' :
                    'focus:ring-red-300 shadow-red-500/50 from-red-500 via-red-600 to-red-700'"
                type="button" @click="isNull = !isNull" x-text="isNull ? 'Восстановить фото' : 'Удалить фото'"></button>

            <input type="hidden" name="{{ $inputName }}_is_null" :value="isNull ? 'true' : 'false'">
        </div>
    @endif

    <input
        class="block w-full mt-2 text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="{{ $inputId }}" name="{{ $inputName }}" type="file">

    <x-input-error :messages="$errors->get($inputName)" class="mt-2" />
</div>
