<x-app-layout>
    <div class="container mx-auto">
        <div class="md:columns-2 sm:columns-1 border-dashed border-2 border-sky-200">
                <div id="container" class="flex justify-center border-dashed border-2 border-sky-100">
                    <h1 class="mb-8 text-6xl font-extrabold">
                        <a href="{{ Route('segment.hometeam') }}">{{ $game->home_team }}</a>
                    </h1>
                </div>
                <p id="homeScore" style="font-family: 'Seven Segment', sans-serif;" class="text-red-600 text-[240px] text-center"></p>
                <div id="buttons" class="flex justify-start flex-row p-4 gap-8 border-dashed border-2 border-sky-100">
                    <svg type="button" onclick="handleHomeScore(-1)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="12" y="40"
                            style="
                                fill: pink;
                                font-weight: bold;
                                stroke: red;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            -1
                        </text>
                    </svg>
                    <svg type="button" onclick="handleHomeScore(1)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="9" y="40"
                            style="
                                fill: greenyellow;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +1
                        </text>
                    </svg>
                    <svg type="button" onclick="handleHomeScore(2)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: lightgreen;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +2
                        </text>
                    </svg>
                    <svg type="button" onclick="handleHomeScore(3)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: green;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +3
                        </text>
                    </svg>
                </div>
            </div>

            <div>
                <div id="container" class="flex justify-center border-dashed border-2 border-red-100">
                    <h1 class="mb-8 text-6xl font-extrabold">
                        <a href="{{ Route('segment.guestteam') }}">{{ $game->away_team }}</a>
                    </h1>
                </div>
                
                <p id="awayScore" style="font-family: 'Seven Segment', sans-serif;" class="text-red-600 text-[240px] text-center"></p>
                <div id="buttons" class="flex justify-end flex-row p-4 gap-8 border-dashed border-2 border-red-100">
                    <svg type="button" class="select-none" onclick="handleAwayScore(-1)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="12" y="40"
                            style="
                                fill: pink;
                                font-weight: bold;
                                stroke: red;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            -1
                        </text>
                    </svg>
                    <svg type="button" onclick="handleAwayScore(1)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="9" y="40"
                            style="
                                fill: greenyellow;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +1
                        </text>
                    </svg>
                    <svg type="button" onclick="handleAwayScore(2)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: lightgreen;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +2
                        </text>
                    </svg>
                    <svg type="button" onclick="handleAwayScore(3)" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black"
                            stroke-width="2" opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: green;
                                font-weight: bold;
                                stroke: green;
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
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let aScore = {{ $game->away_score }};
    let hScore = {{ $game->home_score }};
    homeScore.innerHTML = hScore;
    awayScore.innerHTML = aScore;

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
    awayScore.innerHTML = aScore;
    // Make an AJAX request to update the away score in the database
    $.ajax({
        url: 'score', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            gameId: {{ $game->id }},
            awayScore: aScore
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};

var handleHomeScore = function(amount2) {
    // Increment or decrement the away score by the specified amount
    hScore += amount2;
    
    // Ensure the score doesn't go below 0
    if (hScore < 0) {
        hScore = 0;
    }
    // Ensure the score doesn't exceed 99
    else if (hScore > 99) {
        hScore = 99;
    }
    homeScore.innerHTML = hScore;
    // Make an AJAX request to update the away score in the database
    $.ajax({
        url: 'score', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            gameId: {{ $game->id }},
            homeScore: hScore,
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