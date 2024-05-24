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
            <div id="myDiv" class="bg-base-300 overflow-hidden shadow-md rounded-md">                                
                <label class="flex swap swap-rotate px-2 justify-end pt-2 pr-2 mb-[-20px]">
                    <input type="checkbox" id="screen-toggle" class="hidden" placeholder="Toggle full Screen"/>
                    <x-iconpark-fullscreenone-o class="swap-off w-6 h-6 font-bold" />
                    <x-iconpark-offscreenone-o class="swap-on w-6 h-6 font-bold" />
                </label>
                <div class="p-6 grid grid-cols-[repeat(auto-fit,minmax(340px,1fr))]  gap-4 overflow-auto">
                    <div class="bg-base-200 rounded-lg">
                        <div id="container" class="flex justify-center">
                            <h1 class="pt-2 text-6xl font-extrabold uppercase">
                                <a href="{{ Route('score.hometeam', ['team_id' => $home_team->id]) }}">{{ $home_team->team_name }}</a>
                            </h1>
                        </div>
                        <p id="homeScore" style="font-family: 'CustomFont', sans-serif;" class="text-red-600 text-[240px] text-center"></p>
                        @if($status==1)
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                            <div  x-show="!open" @click="open = ! open" id="buttons1" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            
                                @foreach($buttons['step'] as $index => $step)
                                <div class="flex items-center justify-center">
                                    <button class="w-16 h-16 select-none cursor-pointer opacity-75 rounded-[50%] border-black border-solid border-2" style="filter: drop-shadow(2px 4px 2px {{ $buttons['color'][$index] }}); background-color: {{ $buttons['bg_color'][$index] }};" onclick="handleHomeScore({{ $step }})" >
                                        <p style="
                                                color: {{$buttons['color'][$index]}};
                                                font-weight: bold;
                                                font-size: xx-large;
                                                text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                            ">
                                            {{ $step }}
                                        </p>
                                    </button>
                                </div>
                            @endforeach

                        </div>
                        <div x-show="open" @click="open = false" style="display: none" id="buttons1" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                            
                            @php $i = 0; @endphp
                            @foreach($homeTeamPlayers as $index => $player)
                                <div class="flex items-center justify-center">
                                    <button class="w-16 h-16 select-none cursor-pointer opacity-75 rounded-[25%] border-black border-solid border-2" style="filter: drop-shadow(2px 4px 2px {{ $buttons['color'][$i] }}); background-color: {{ $buttons['bg_color'][$i] }};" onclick="lastHomePointsBy({{ $player->player_id }})">
                                        @csrf
                                        @method('POST')
                                            <p style="
                                                color: {{ $buttons['color'][$i] }};
                                                font-weight: bold;
                                                font-size: xx-large;
                                                text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                            ">
                                            {{ $player->player_no }}
                                        </p>
                                     </button>
                                </div>
                                @php $i++; @endphp
                            @endforeach

                        </div>
                    </div>
                    @endif
                </div>
                    <div class="bg-base-200 rounded-lg">
                        <div id="container" class="flex justify-center">
                            <h1 class="pt-2 text-6xl font-extrabold uppercase">
                                <a href="{{ Route('score.guestteam', ['team_id' => $away_team->id]) }}">{{ $away_team->team_name }}</a>
                            </h1>
                        </div>
                        <p id="awayScore" style="font-family: 'CustomFont', sans-serif;" class="text-red-600 text-[240px] text-center"></p>
                        @if($status==1)
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                            <div  x-show="!open" @click="open = ! open" id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                                
                                @foreach($buttons['step'] as $index => $step)
                                <div class="flex items-center justify-center">
                                    <button class="w-16 h-16 select-none cursor-pointer opacity-75 rounded-[50%] border-black border-solid border-2" style="filter: drop-shadow(2px 4px 2px {{ $buttons['color'][$index] }}); background-color: {{ $buttons['bg_color'][$index] }};" onclick="handleAwayScore({{ $step }})" >
                                        <p style="
                                                color: {{ $buttons['color'][$index] }};
                                                font-weight: bold;
                                                font-size: xx-large;
                                                text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                            ">
                                            {{ $step }}
                                        </p>
                                    </button>
                                </div>
                                @endforeach

                            </div>
                            <div x-show="open" @click="open = false" style="display: none" id="buttons" class="grid grid-cols-[repeat(auto-fit,minmax(64px,1fr))] gap-4 content-stretch border-dashed border-t-8 py-2 border-base-300">
                                
                                @php $i = 0; @endphp
                                @foreach($awayTeamPlayers as $index => $player)
                                <div class="flex items-center justify-center">
                                    <button class="w-16 h-16 select-none cursor-pointer opacity-75 rounded-[25%] border-black border-solid border-2" style="filter: drop-shadow(2px 4px 2px {{ $buttons['color'][$i] }}); background-color: {{ $buttons['bg_color'][$i] }};" onclick="lastAwayPointsBy({{ $player->player_id }})">
                                        <p style="
                                                color: {{ $buttons['color'][$i] }};
                                                font-weight: bold;
                                                font-size: xx-large;
                                                text-shadow: -1px 1px 0 #111, 1px 1px 0 #111, 1px -1px 0 #111, -1px -1px 0 #111;
                                            ">
                                            {{ $player->player_no }}
                                        </p>
                                    </button>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                                
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    let aScore = {{ $away_score }};
    let hScore = {{ $home_score }};
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
            gameId: {{ $id }},
            awayScore: aScore,
            homeScore: hScore,
        },
        success: function(response) {
            console.log('score saved to database');
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
            console.log('score saved to api');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    return lastAwayPoints;
};

var handleHomeScore = function(amount) {
    // Increment or decrement the away score by the specified amount
    hScore += amount;
    lastHomePoints = amount;
    console.log(lastHomePoints);
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
            gameId: {{ $id }},
            awayScore: aScore,
            homeScore: hScore,
        },
        success: function(response) {
            console.log('score saved to database');
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
            console.log('score saved to api');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    return lastHomePoints;
};

var lastAwayPointsBy = function(player){
        
    $.ajax({
        url: 'gamelog/away', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            game_id: {{ $id }},
            team_id: 2,
            player_id: player,
            action: lastAwayPoints,
            home_score: hScore,
            away_score: aScore
        },
        success: function(response) {
            console.log('gamelog saved to database');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};

var lastHomePointsBy = function(player){
    
    $.ajax({
        url: 'gamelog/home', // Assuming this is the route you've defined in your Laravel routes file
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            game_id: {{ $id }},
            team_id: 1,
            player_id: player,
            action: lastHomePoints,
            home_score: hScore,
            away_score: aScore
        },
        success: function(response) {
            console.log('gamelog saved to database');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
};

// Toggle full Screen
$('#screen-toggle').click(function(e) {
  $('#myDiv').toggleClass('w-full h-full fixed top-0 left-0 z-50');
});

</script>

<style>
    @font-face {
        font-family: 'CustomFont';
        src: url('/fonts/fs-sevegment.woff2') format('woff2');
    }
</style>