<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary btn-sm shadow-md']) }}>
    {{ $slot }}
</button>
