<?php
$validateComponent($slot);
$attributes = $attributesPreprocess($attributes)->merge(['aria-label' => $label ?: $slot]);
?>

@if ($withWrapper)
    <div class="mdc-touch-target-wrapper">
@endif

@if ($attributes->has('href'))
    <a {{ $attributes }}>
    @else
        <button {{ $attributes }}>
@endif

@if ($isRipple)
    <span class="mdc-button__ripple"></span>
@endif

@if ($startIcon)
    <x-mbc::Icon
        :name="$startIcon"
        class="mdc-button__icon"
        aria-hidden="true"
    />
@endif

<span class="mdc-button__label">{{ $label ?: $slot }}</span>

@if ($endIcon)
    <x-mbc::Icon
        :name="$endIcon"
        class="mdc-button__icon"
        aria-hidden="true"
    />
@endif

@if ($attributes->has('href'))
    </a>
@else
    </button>
@endif

@if ($withWrapper)
    </div>
@endif
