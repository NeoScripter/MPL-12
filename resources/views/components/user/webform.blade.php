<form>
    <div class="mb-3">
        <label for="first_name"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
        <input type="text" id="first_name" name="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand-orange focus:border-brand-orange block w-full p-2.5" placeholder="Имя"
            required />
    </div>
    <div class="mb-3">
        <label for="last_name"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамилия</label>
        <input type="text" id="last_name" name="last_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand-orange focus:border-brand-orange block w-full p-2.5" placeholder="Фамилия"
            required />
    </div>
    <div class="mb-3">
        <label for="phone"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Телефон</label>
        <input type="tel" id="phone" name="phone"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand-orange focus:border-brand-orange block w-full p-2.5" placeholder="Телефон"
            required />
    </div>
    <div class="mb-3">
        <label for="email"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-brand-orange focus:border-brand-orange block w-full p-2.5"
            placeholder="example@gmail.com" required />
    </div>
    <div class="flex items-start mb-6">
        <div class="flex items-center me-4">
            <input checked id="orange-checkbox" type="checkbox" value="" name="privacy_policy" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-brand-orange focus:ring-brand-orange focus:ring-2">
            <label for="orange-checkbox" class="text-sm font-medium text-gray-900 ms-2">Я соглашаюсь с политикой конфиденциальности</label>
        </div>
    </div>
    <button type="submit"
        class="text-white bg-brand-orange hover:bg-white hover:text-brand-orange border border-brand-orange focus:ring-4 focus:outline-none focus:ring-brand-orange/20 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center">Отправить</button>
</form>