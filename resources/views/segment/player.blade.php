<x-app-layout>
    <div class="container mx-auto">

        <h1 class="mb-8 text-6xl font-extrabold h-full text-center">Players</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 p-4 gap-8">
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player1.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Aliin Saar</h3>
                <p>Age: 30</p>
                <p>Player Number: 1</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player2.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Aren Ansper</h3>
                <p>Age: 30</p>
                <p>Player Number: 2</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player3.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Jan Kõrva</h3>
                <p>Age: 30</p>
                <p>Player Number: 3</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player4.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Karel Maarma</h3>
                <p>Age: 37</p>
                <p>Player Number: 4</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player5.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Kaspar Kaasik</h3>
                <p>Age: 30</p>
                <p>Player Number: 5</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player6.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Liis Alber-Jaansalu</h3>
                <p>Age: 25+</p>
                <p>Player Number: 6</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player7.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Mari-Liis Sink</h3>
                <p>Age: 25+</p>
                <p>Player Number: 7</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player8.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Merilyn Tohv</h3>
                <p>Age: 30</p>
                <p>Player Number: 8</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player9.jpg')}}" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Raiko Tõhk</h3>
                <p>Age: 30</p>
                <p>Player Number: 9</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player10.jpg')}}" alt="Player Image"
                    class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Siim Pildre</h3>
                <p>Age: 30</p>
                <p>Player Number: 10</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player11.jpg')}}" alt="Player Image"
                    class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Tene Tiitma</h3>
                <p>Age: 25+</p>
                <p>Player Number: 11</p>
            </div>
            <div class="card card-compact bg-base-200 shadow-xl text-center rounded-md p-4">
                <img src="{{url('/assets/player12.jpg')}}" alt="Player Image"
                    class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Karl G Rauniste</h3>
                <p>Age: 30</p>
                <p>Player Number: 12</p>
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
