<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary btn-sm text-white shadow-md']) }}>
    {{ $slot }}
</button>
