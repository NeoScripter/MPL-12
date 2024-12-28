@props(['route', 'content', 'new_page' => false])

<li>
    <a href="{{ route($route) }}"
       class="transition-colors hover:text-brand-orange {{ $isActive() ? 'text-brand-orange' : '' }}"
       target="{{ $new_page ? "_blank" : '' }}"
       >
        {{ $content }}
    </a>
</li>
