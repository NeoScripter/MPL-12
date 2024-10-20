<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Редактировать курс
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.phones.edit-phone')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
