<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 focus:outline-none focus:shadow-outline', 'title' => 'Delete'])}}>
    <x-heroicon-s-trash class="w-6 text-red-500 hover:text-red-600" /> {{ $slot }}
</button>
