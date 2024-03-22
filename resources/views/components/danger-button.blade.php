<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-error btn-sm']) }}>
    {{ $slot }}
</button>
