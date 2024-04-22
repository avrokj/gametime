<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 focus:outline-none focus:shadow-outline text-blue-500 hover:text-blue-600', 'title' => 'Edit']) }}>
    <x-heroicon-s-pencil-square class="w-6" /> {{ $slot }}
</button>
