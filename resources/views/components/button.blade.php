<button type="submit" class="btn @isset($color){{ ' btn-' . $color }}@else btn-primary @endisset">
    {{ $slot }}
</button>
