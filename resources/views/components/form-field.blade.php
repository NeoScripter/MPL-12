@props(['class' => ''])

<div class="{{ $class }}">
    <x-input-label :for="$name" :value="$label" />

    @if ($isTextarea)
        <x-text-area :id="$name" :name="$name" class="block w-full mt-1 wysiwyg-editor" rows="4">{{ $value }}</x-text-area>
    @else
        <x-text-input :id="$name" :name="$name" :type="$type" class="block w-full mt-1" :value="$value" />
    @endif

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
