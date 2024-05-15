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

    <div class="grid grid-cols-3 gap-4">
        <div class="p-8">
            <h1 class="mb-4">Active Players:</h1>
            @foreach($players as $player)
            @if($player['status'] == 'active')
                <p>{{ $player['player_no'] }} {{ $player['player_name'] }}, {{ $player['status'] }}</p>
                <form action="{{ route('players.updateStatus', [$player->team_id, $player->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('POST')
                    <x-primary-button>Change Status</x-primary-button>
                </form>
            @endif
            @endforeach
        </div>
        <div class="p-8">
            <h1 class="mb-4">In Game Players:</h1>
                @foreach($players as $player)
                @if($player['status'] == 'away_court')
                    <p>{{ $player['player_no'] }} {{ $player['player_name'] }}, {{ $player['status'] }}</p>
                    <form action="{{ route('players.updateStatus', [$player->team_id, $player->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <x-primary-button>Change Status</x-primary-button>
                    </form>
                    @endif
                @endforeach
        </div>
        <div class="p-8">
            <h1 class="mb-4">Bench Players:</h1>
            @foreach($players as $player)
            @if($player['status'] == 'away_bench')
                <p>{{ $player['player_no'] }} {{ $player['player_name'] }}, {{ $player['status'] }}</p>
                <form action="{{ route('players.updateStatus', [$player->team_id, $player->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('POST')
                    <x-primary-button>Change Status</x-primary-button>
                </form>
                @endif
            @endforeach
        </div>
    </div>

</x-app-layout>
