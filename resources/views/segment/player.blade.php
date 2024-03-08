<x-app-layout>
    <div class="container mx-auto">

        <h1 class="mb-8 text-6xl font-extrabold h-full text-center">Players</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 p-4 gap-8">
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player1.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Aliin Saar</h3>
                <p>Age: 30</p>
                <p>Player Number: 1</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player2.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Aren Ansper</h3>
                <p>Age: 30</p>
                <p>Player Number: 2</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player3.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Jan Kõrva</h3>
                <p>Age: 30</p>
                <p>Player Number: 3</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player4.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Karel Maarma</h3>
                <p>Age: 37</p>
                <p>Player Number: 4</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player5.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Kaspar Kaasik</h3>
                <p>Age: 30</p>
                <p>Player Number: 5</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player6.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Liis Alber-Jaansalu</h3>
                <p>Age: 25+</p>
                <p>Player Number: 6</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player7.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Mari-Liis Sink</h3>
                <p>Age: 25+</p>
                <p>Player Number: 7</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player8.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Merilyn Tohv</h3>
                <p>Age: 30</p>
                <p>Player Number: 8</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player9.jpg" alt="Player Image" class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Raiko Tõhk</h3>
                <p>Age: 30</p>
                <p>Player Number: 9</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player10.jpg" alt="Player Image"
                    class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Siim Pildre</h3>
                <p>Age: 30</p>
                <p>Player Number: 10</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player11.jpg" alt="Player Image"
                    class="object-cover w-full aspect-square rounded-full">
                <h2 class="text-2xl">TA-22</h2>
                <h3 class="text-xl font-bold">Tene Tiitma</h3>
                <p>Age: 25+</p>
                <p>Player Number: 11</p>
            </div>
            <div class="card glass text-center rounded-md p-4">
                <img src="assets/player12.jpg" alt="Player Image"
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
            <label class="swap swap-rotate">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" id="darkModeCheckbox" />

                <!-- sun icon -->
                <svg class="swap-on fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                </svg>

                <!-- moon icon -->
                <svg class="swap-off fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                </svg>

            </label>
        </div>
    </div>
    <script type="module" src="{{ asset('js/spaghetti.js') }}"></script>
</x-app-layout>
