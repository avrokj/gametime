<x-app-layout>
    <div class="container mx-auto">

        <h1 class="mb-8 text-6xl font-extrabold h-full text-center">Teams</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8">
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <a href="player">
                    <img src="{{url('/assets/ametikooli-logo_1.jpg')}}" alt="Team Image"
                        class="object-cover w-full aspect-square rounded-md">
                    <h2 class="text-3xl font-bold">TA-22</h2>
                </a>
            </div>
        </div>

        <div class="flex justify-center p-8">
            <button onclick="history.back()" class="btn btn-neutral m-4">
                <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <p>Go back</p>
            </button>
        </div>
    </div>
</x-app-layout>
