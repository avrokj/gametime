<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn btn-neutral btn-sm text-white']) }}> 
    <x-heroicon-o-x-circle class="w-6 text-white" /> {{ $slot }}
</button>