<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-error btn-sm mx-1 shadow-md']) }}>
    {{ $slot }}
</button>
