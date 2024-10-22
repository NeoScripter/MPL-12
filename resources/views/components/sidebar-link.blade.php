@props(['route', 'content'])

<li>
    <a href="{{ route($route) }}"
       class="transition-colors hover:text-brand-orange {{ $isActive() ? 'text-brand-orange' : '' }}">
        {{ $content }}
    </a>
</li>
