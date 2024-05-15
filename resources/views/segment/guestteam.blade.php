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
            <div class="grid grid-cols-3 gap-4">
                <div class="p-8 col-span-1">
                    <h1 class="mb-4 font-bold">Active Players:</h1>
                    @foreach($players as $player)
                    @if($player['status'] == 'active')
                        <p>{{ $player['player_no'] }} {{ $player['player_name'] }}</p>
                        <form action="{{ route('players.updateStatus', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <x-primary-button>Go and play</x-primary-button>
                        </form>
                    @endif
                    @endforeach
                </div>
                <div class="p-8 col-span-1">
                    <h1 class="mb-4 font-bold">In Game Players:</h1>
                        @foreach($players as $player)
                        @if($player['status'] == 'away_court')
                            <p>{{ $player['player_no'] }} {{ $player['player_name'] }}</p>
                            <form action="{{ route('players.updateStatusToBench', $player->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <x-primary-button>Go to bench</x-primary-button>
                            </form>
                            @endif
                        @endforeach
                </div>
                <div class="p-8 col-span-1">
                    <h1 class="mb-4 font-bold">Bench Players:</h1>
                    @foreach($players as $player)
                    @if($player['status'] == 'away_bench')
                        <p>{{ $player['player_no'] }} {{ $player['player_name'] }}</p>
                        <form action="{{ route('players.updateStatus', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <x-primary-button>Go and play</x-primary-button>
                        </form>
                        @endif
                    @endforeach
                </div>
            </div>
            <form action="{{ route('clear.session') }}" method="POST">
                @csrf
                <x-danger-button>Clear in game players</x-danger-button>
            </form>
        </div>
    </div>

</x-app-layout>
