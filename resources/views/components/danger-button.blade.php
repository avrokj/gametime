<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-error btn-sm shadow-md']) }}>
    {{ $slot }}
</button>
