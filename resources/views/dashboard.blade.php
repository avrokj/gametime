<x-app-layout>
    <div class="flex justify-center items-center h-[66vh]">
        <div class="w-52">
            <x-application-logo class="block h-9 fill-current" />
        </div>
    </div>

    <div class="text-center mt-4">
        <h1 class="text-4xl text-orange-500 dark:text-orange-400 font-bold">Tere tulemast GAMETIME testimise lehele</h1>
        <a href="{{ Route('segment.index') }}" class="text-blue-500 hover:underline">7 segment scoreboard</a>
        <span class="mx-2 text-gray-500 dark:text-gray-400">|</span>
        <a href="" class="text-blue-500 hover:underline">5x11 scoreboard</a>
        <span class="mx-2 text-gray-500 dark:text-gray-400">|</span>
        <a href="" class="text-blue-500 hover:underline">memory game</a>
    </div>

    <script type="module" src="{{ asset('js/app.home.js') }}"></script>
</x-app-layout>
