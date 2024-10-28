<x-user-layout>

    <x-user.sidebar :phones="$phones" :info="$info" />

    <div>
        <div class="flex items-center w-10/12 mx-auto mt-8 text-5xl md:mt-12 md:w-10/12 min-h-100">
            Данная страница сайта пока что находится в разработке
        </div>

        <x-user.footer :phones="$phones" :info="$info" />
    </div>
</x-user-layout>
