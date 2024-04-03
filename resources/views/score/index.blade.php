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
                                <svg type="button" onclick="handleHomeScore(-1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px red);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2" 
                                        opacity="0.8" />
                                    <text x="12" y="40"
                                            style="
                                            fill: #f00;
                                            font-weight: bold;
                                            stroke: #C70039 ;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                            ">
                                            -1
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(0)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px orange);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="20" y="40"
                                        style="
                                            fill: #666;
                                            font-weight: bold;
                                            stroke: #555;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        0
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px lightgreen);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="9" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +1
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(2)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +2
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(3)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +3
                                    </text>
                                </svg>
                            </div>
</div>
<div  x-show="open" @click="open = false" style="display: none" id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(-1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px red);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2" 
                                        opacity="0.8" />
                                    <text x="12" y="40"
                                            style="
                                            fill: #f00;
                                            font-weight: bold;
                                            stroke: #C70039 ;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                            ">
                                            1
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(0)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px orange);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="20" y="40"
                                        style="
                                            fill: #666;
                                            font-weight: bold;
                                            stroke: #555;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        2
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px lightgreen);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="9" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        3
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(2)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        4
                                    </text>
                                </svg>
                            </div>

                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleHomeScore(3)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        5
                                    </text>
                                </svg>
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
                                <svg type="button" onclick="handleAwayScore(-1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px red);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="12" y="40"
                                        style="
                                            fill: red;
                                            font-weight: bold;
                                            stroke: darkred;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        -1
                                    </text>
                                </svg>
                            </div>
                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleAwayScore(0)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px orange);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="20" y="40"
                                        style="
                                            fill: #666;
                                            font-weight: bold;
                                            stroke: #555;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        0
                                    </text>
                                </svg>
                            </div>
                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleAwayScore(1)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px lightgreen);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="9" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +1
                                    </text>
                                </svg>
                            </div>
                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleAwayScore(2)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +2
                                    </text>
                                </svg>
                            </div>
                            <div class="flex items-center justify-center">
                                <svg type="button" onclick="handleAwayScore(3)" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 select-none cursor-pointer opacity-75 hover:opacity-100" style="filter: drop-shadow(2px 4px 2px green);">
                                    <circle r="27" cx="30" cy="30" fill="white" stroke="black" stroke-width="2"
                                        opacity="0.8" />
                                    <text x="8" y="40"
                                        style="
                                            fill: green;
                                            font-weight: bold;
                                            stroke: darkgreen;
                                            stroke-width: 1;
                                            font-size: xx-large;
                                        ">
                                        +3
                                    </text>
                                </svg>
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
};
var handleHomeScore = function(amount) {
    // Increment or decrement the away score by the specified amount
    hScore += amount;
    
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
};
</script>
<style>
    @font-face {
    font-family: 'CustomFont';
    src: url('/fonts/fs-sevegment.woff2') format('woff2');
    /* Add additional font properties if needed */
}
</style>