<x-user-layout>

    <x-user.sidebar :phones="$phones" />

    <div>
        <div class="grid w-10/12 mx-auto mt-8 sm:grid-cols-2 xl:grid-cols-6 md:mt-12 md:w-10/12">
            @if (isset($teacher))
                    <div>
                        <h3 class="w-10/12 mx-auto my-2 text-xl font-bold text-center md:text-2xl text-brand-orange">
                            {{ $teacher->name }}</h3>
                        <div class="grid gap-1 py-3 border-t border-b border-gray-300">
                            <div class="space-y-1 prose text-gray-400 max-w-none">
                                {!! $teacher->quote !!}
                            </div>
                        </div>
                    </div>

            @endif
        </div>
        <div class="max-w-md mx-auto mt-12">
            @if (isset($courses))
            {{ $courses->links() }}
            @endif
        </div>

        <x-user.footer :phones="$phones" />
    </div>
</x-user-layout>
