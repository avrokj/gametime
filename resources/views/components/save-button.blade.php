<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success btn-sm text-white shadow-md']) }}>
    <x-feathericon-save class="w-6 text-white" /> {{ $slot }}
</button>