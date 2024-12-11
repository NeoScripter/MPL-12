<div class="my-4">
    <!-- Hidden Input for Default False Value -->
    <input type="hidden" name="{{ $name }}" value="0">

    <!-- Label -->
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-700">
        {{ $slot }}
    </label>

    <!-- Checkbox -->
    <input id="{{ $name }}" type="checkbox" name="{{ $name }}" value="1"
        class="block w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-black dark:focus:ring-black dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
        {{ old($name, $checked ?? false) ? 'checked' : '' }}>
</div>
