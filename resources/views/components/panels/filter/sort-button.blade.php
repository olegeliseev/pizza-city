<input type="hidden" name="{{ $name }}" value="{{ $currentValue }}">
<button name="{{ $name }}" value="{{ $nextValue }}"
    @class([
        'sort-list__item',
        'active' => $currentValue
        ])
>
    <span>{{ $slot }}</span>
    @if ($showAscIcon())
        <x-icons.arrow-up/>
    @endif
    @if ($showDescIcon())
        <x-icons.arrow-down/>
    @endif
</button>
