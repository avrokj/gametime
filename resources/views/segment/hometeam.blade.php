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
                    @foreach($homeTeamPlayers as $homeTeamPlayer)
                    @if($homeTeamPlayer->status == 'active')
                        <p>{{ $homeTeamPlayer->player_no }} {{ $homeTeamPlayer->player_name }}</p>
                        <form action="{{ route('players.updateHomePlayerStatus', $homeTeamPlayer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <x-primary-button>Go and play</x-primary-button>
                        </form>
                    @endif
                    @endforeach
                </div>
                <div class="p-8 col-span-1">
                    <h1 class="mb-4 font-bold">In Game Players:</h1>
                        @foreach($homeTeamPlayers as $homeTeamPlayer)
                        @if($homeTeamPlayer['status'] == 'home_court')
                            <p>{{ $homeTeamPlayer['player_no'] }} {{ $homeTeamPlayer['player_name'] }}</p>
                            <form action="{{ route('players.updateHomePlayerStatusToBench', $homeTeamPlayer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <x-primary-button>Go to bench</x-primary-button>
                            </form>
                            @endif
                        @endforeach
                </div>
                <div class="p-8 col-span-1">
                    <h1 class="mb-4 font-bold">Bench Players:</h1>
                    @foreach($homeTeamPlayers as $homeTeamPlayer)
                    @if($homeTeamPlayer['status'] == 'home_bench')
                        <p>{{ $homeTeamPlayer['player_no'] }} {{ $homeTeamPlayer['player_name'] }}</p>
                        <form action="{{ route('players.updateHomePlayerStatus', $homeTeamPlayer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <x-primary-button>Go and play</x-primary-button>
                        </form>
                        @endif
                    @endforeach
                </div>
            </div>
            <form action="{{ route('clear.clearHomeSession') }}" method="POST">
                @csrf
                <x-danger-button>Clear in game players</x-danger-button>
            </form>
        </div>
    </div>

</x-app-layout>
