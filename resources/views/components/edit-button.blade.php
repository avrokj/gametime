<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-info btn-sm mx-1 shadow-md']) }}>
    <x-heroicon-s-pencil-square class="w-6 text-white" /> {{ $slot }}
</button>
