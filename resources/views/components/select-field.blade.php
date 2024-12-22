@props(['name', 'label', 'options', 'optionNames' => null, 'placeholder' => '', 'value' => null])

<div class="max-w-sm space-y-2">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }}
    </label>
    <select id="{{ $name }}" name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @php
            $optionNames = $optionNames === null ? $options : $optionNames;
        @endphp
        @foreach ($options as $index => $option)
            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>
                {{ $optionNames[$index] }}
            </option>
        @endforeach
    </select>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
