<select {{ $attributes->merge(['class' => 'select select-bordered w-full max-w-xs']) }}>
    {{ $slot }}
</select>