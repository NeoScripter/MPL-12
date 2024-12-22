
<div x-data="{ showModal: {{ session('status') === 'error' ? 'true' : 'false' }} }" x-cloak
    class="relative w-full px-16 pt-24 bg-center bg-no-repeat bg-cover min-h-96" style="background-image: url('{{ Storage::url($info->banner_image) }}')">
    <h1 class="mb-1 text-2xl font-medium bg-white sm:text-4xl shadow-white-large max-w-max">Психологическое
        консультирование
        онлайн</h1>
    <h2 class="mb-4 text-base font-medium bg-white sm:text-2xl md:mb-12 shadow-white-large max-w-max">Базовый
        курс обучения
    </h2>
    <button @click="showModal = true"
        class="block px-4 py-2 font-normal text-white transition-colors border bg-brand-orange w-max hover:bg-white hover:text-brand-orange border-brand-orange">
        Оставить заявку
    </button>

    <div x-show="showModal" x-transition tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full max-h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 bg-black/50">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-8 bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between py-4 mb-3 border-b rounded-t md:py-5 dark:border-gray-600">
                    <h3 class="text-lg font-medium uppercase sm:text-2xl text-brand-orange dark:text-white">
                        Записаться на курс
                    </h3>
                    <button type="button" @click="showModal = false"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="small-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <x-user.webform />
            </div>
        </div>
    </div>
</div>

