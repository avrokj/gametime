<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-info btn-sm mx-1']) }}>
    {{ $slot }}
</button>
