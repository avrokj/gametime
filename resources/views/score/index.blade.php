<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Scoreboard') }}
                </h2> 
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-300 overflow-hidden shadow-md rounded-md">
                <div class="p-6 grid grid-cols-[repeat(auto-fit,minmax(340px,1fr))]  gap-4 overflow-auto">
                    <div class="bg-base-200 rounded-lg">
                        <div id="container" class="flex justify-center">
                            <h1 class="mb-8 text-6xl font-extrabold">
                                <a href="{{ Route('segment.hometeam') }}">{{ $game->home_team }}</a>
                            </h1>
                        </div>

                        <p id="homeScore" style="font-family: 'CustomFont', sans-serif;" class="text-red-600 text-[240px] text-center"></p>

                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">

<div  x-show="!open" @click="open = ! open" id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #bf0915); background-color: #c1a3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleHomeScore(-1)" >
                                    <p style="
                                            color: #bf0915;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        -1
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #c1b6a6); background-color: #c1b6a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleHomeScore(0)" >
                                    <p style="
                                            color: #555555;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        0
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #b4bfb7; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleHomeScore(1)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        +1
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleHomeScore(2)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        +2
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleHomeScore(3)" >
                                    <p style="
                                            color: #08660d;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        +3
                                    </p>
                                </button>
                            </div>
</div>
<div  x-show="open" @click="open = false" style="display: none" id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #bf0915); background-color: #c1a3a6; border: 2px; border-color: black;border-style: solid; border-radius: 25% ;" onclick="lastHomePointsBy(11)" >
                                    <p style="
                                            color: #bf0915;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        11
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #c1b6a6); background-color: #c1b6a6; border: 2px; border-color: black;border-style: solid; border-radius: 25% ;" onclick="lastHomePointsBy(12)" >
                                    <p style="
                                            color: #555555;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        12
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #b4bfb7; border: 2px; border-color: black;border-style: solid; border-radius: 25% ;" onclick="lastHomePointsBy(13)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        13
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 25% ;" onclick="lastHomePointsBy(14)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        14
                                    </p>
                                </button>
                            </div>

                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 25% ;" onclick="lastHomePointsBy(15)" >
                                    <p style="
                                            color: #08660d;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">
                                        15
                                    </p>
                                </button>
                            </div>
</div>


                        </div>
                    </div>

                    
                    <div class="bg-base-200 rounded-lg">
                        <div id="container" class="flex justify-center">
                            <h1 class="mb-8 text-6xl font-extrabold">
                                <a href="{{ Route('segment.guestteam') }}">{{ $game->away_team }}</a>
                            </h1>
                        </div>

                        <p id="awayScore" style="font-family: 'CustomFont', sans-serif;" class="text-red-600 text-[240px] text-center"></p>
                        <div id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #bf0915); background-color: #c1a3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleAwayScore(-1)" >
                                    <p style="
                                            color: #bf0915;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">-1</p></button>
                            </div>
                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #c1b6a6); background-color: #c1b6a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleAwayScore(0)" >
                                    <p style="
                                            color: #555555;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">0</p></button>
                            </div>
                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #b4bfb7; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleAwayScore(1)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">+1</p></button>
                            </div>
                            <div class="flex items-center justify-center">
                            <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleAwayScore(2)" >
                                    <p style="
                                            color: #08680b;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">+2</p></button>
                            </div>
                            <div class="flex items-center justify-center">
                                <button class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px #b4bfb7); background-color: #a2b3a6; border: 2px; border-color: black;border-style: solid; border-radius: 50% ;" onclick="handleAwayScore(3)" >
                                    <p style="
                                            color: #08660d;
                                            font-weight: bold;
                                            font-size: xx-large;
                                            text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                        ">+3</p></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    let aScore = {{ $game->away_score }};
    let hScore = {{ $game->home_score }};
    var formattedHomeScore = hScore < 10 ? '0' + hScore : hScore;
    homeScore.innerHTML = formattedHomeScore;
    var formattedAwayScore = aScore < 10 ? '0' + aScore : aScore;
    awayScore.innerHTML = formattedAwayScore;
    
    var handleAwayScore = function(amount) {
        
    // Increment or decrement the away score by the specified amount
    aScore += amount;
    lastAwayPoints = amount;
    //console.log(lastAwayPoints);
    // Ensure the score doesn't go below 0
    if (aScore < 0) {
        aScore = 0;
    }
    // Ensure the score doesn't exceed 99
    else if (aScore > 99) {
        aScore = 99;
    }
    // rewrite score to screen
    var formattedAwayScore = aScore < 10 ? '0' + aScore : aScore;
    awayScore.innerHTML = formattedAwayScore;
    $.ajax({
        url: 'score', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            gameId: {{ $game->id }},
            awayScore: aScore,
            homeScore: hScore,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: 'apis', // Endpoint for API route
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            sb_id: 241002, // Provide sb_id here
            awayScore: aScore,
            homeScore: hScore
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    //return lastAwayPoints;
};

var handleHomeScore = function(amount) {
    // Increment or decrement the away score by the specified amount
    hScore += amount;
    lastHomePoints = amount;
    //console.log(lastHomePoints);
    // Ensure the score doesn't go below 0
    if (hScore < 0) {
        hScore = 0;
    }
    // Ensure the score doesn't exceed 99
    else if (hScore > 99) {
        hScore = 99;
    }
    // rewrite score to screen
    var formattedHomeScore = hScore < 10 ? '0' + hScore : hScore;
    homeScore.innerHTML = formattedHomeScore;
    // Make an AJAX request to update the away score in the database
    $.ajax({
        url: 'score', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            gameId: {{ $game->id }},
            awayScore: aScore,
            homeScore: hScore,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    $.ajax({
        url: 'apis', // Endpoint for API route
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            sb_id: 241002, // Provide sb_id here
            awayScore: aScore,
            homeScore: hScore
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    //return lastHomePoints;
};

var lastAwayPointsBy = function(playerNr){
    //var lastAwayPoints = handleAwayScore();
    //writing lastHomePoint and who scored it to game log
    console.log(playerNr);
    console.log(lastAwayPoints);
};

var lastHomePointsBy = function(playerNr){
    //var lastHomePoints = handleHomeScore();
    //writing lastHomePoint and who scored it to game log
    console.log(playerNr);
    console.log(lastHomePoints);
};

</script>
<style>
    @font-face {
    font-family: 'CustomFont';
    src: url('/fonts/fs-sevegment.woff2') format('woff2');
    /* Add additional font properties if needed */
}
</style>