<a href="{{ $route }}" class="flex items-center gap-2 rounded-lg bg-gradient-to-r {{ $gradient }} text-white {{ $padding }} transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-5 h-5" />
    @endif
    @if ($text)
        {{ $text }}
    @endif
</a>