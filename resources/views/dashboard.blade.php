<x-app-layout>
    <div class="flex justify-center items-center h-[60vh]">
        <div class="w-52 hover:animate-bounce">
            <x-application-logo class="block h-9 fill-current" />
        </div>
    </div>

    <div class="text-center mt-4">
        <div class="flex items-center justify-center">
            <div class="w-max">
                <h1 class="text-4xl text-amber-500 font-bold animate-typing overflow-hidden whitespace-nowrap border-r-4 border-r-amber-500 pr-5">Tere tulemast GAMETIME testimise lehele </h1>
            </div>
        </div>
        <a href="{{ Route('segment.index') }}" class="text-blue-500 hover:underline">7 segment scoreboard</a>
        <span class="mx-2 text-gray-500 dark:text-gray-400">|</span>
        <a href="" class="text-blue-500 hover:underline">5x11 scoreboard</a>
        <span class="mx-2 text-gray-500 dark:text-gray-400">|</span>
        <a href="" class="text-blue-500 hover:underline">memory game</a>
    </div>

    <script type="module" src="{{ asset('js/app.home.js') }}"></script>
</x-app-layout>
