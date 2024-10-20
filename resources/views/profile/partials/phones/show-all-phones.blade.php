<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Все телефоны
        </h2>
    </div>


    <div class="mt-4 space-y-6">

        @if (isset($phones))
            @foreach ($phones as $phone)
            <hr>
            <div>
                <div>
                    <p class="block mb-1 font-bold text-black font-sm text-md">{{ $phone->number }}</p>
                </div>
                <div>
                    <p class="block mb-1 text-gray-700 font-sm text-md">{{ $phone->email }}</p>
                </div>
                <div>
                    <p class="block mb-1 text-gray-700 font-sm text-md">{!! $phone->text !!}</p>
                </div>

                <x-user.link href="{{ route('phones.edit', $phone) }}">{{ __('Редактировать') }}</x-user.link>
            </div>
            @endforeach
        @else
            <p class="no-courses-message">Нет ни одного телефона</p>
        @endif


    </div>

</section>

@if (session('status') === 'course-deleted')
<p x-data="{ show: true }" x-show="show" x-transition
    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
    {{ __('Курс удален.') }}</p>
@endif
