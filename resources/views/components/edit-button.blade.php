<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 focus:outline-none focus:shadow-outline', 'title' => 'Edit']) }}>
    <x-heroicon-s-pencil-square class="w-6 text-blue-500 hover:text-blue-600" /> {{ $slot }}
</button>
