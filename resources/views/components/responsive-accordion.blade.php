<div x-data="{ open: false }">
    <div class="cursor-pointer flex items-center justify-between border-b border-gray-200 py-2" @click="open = !open">
        <div class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:border-indigo-400 focus:outline-none focus:text-gray-800 focus:border-indigo-400 transition duration-150 ease-in-out">{{ $title }}</div>
        <svg class="w-4 h-4 transform pr-2" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" d="M4.293 5.293a1 1 0 0 1 1.414-1.414L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5z"></path>
            <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" d="M4.293 14.293a1 1 0 0 1 1.414-1.414L10 17.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5z"></path>
        </svg>
    </div>
    <div x-show="open" class="overflow-hidden">
        {{ $slot }}
    </div>
</div>