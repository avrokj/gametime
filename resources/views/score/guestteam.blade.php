<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Guest team lineups') }}
                </h2> 
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-300 overflow-hidden shadow-md rounded-md">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
                <div class="bg-base-100 shadow-lg rounded-md p-4 transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)]">
                    <h1 class="mb-8 text-xl font-bold text-center">{{ __('Active Players') }}</h1>
                    <ul>
                    @foreach($guestTeamPlayers as $guestTeamPlayer)
                    @if($guestTeamPlayer['status'] == 'active')
                        <li class="odd:bg-base-300 even:bg-base-200 flex justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold my-1">
                            <span class="h-6 w-6 flex justify-center items-center leading-5 transition duration-150 ease-in bg-base-100 rounded-full font-semibold mr-2"> 
                                {{ $guestTeamPlayer->player->player_no }}
                            </span> 
                            <span class="text-left">{{ $guestTeamPlayer->player->player_name }}</span>
                            <form action="{{ route('players.updateAwayPlayerStatus', $guestTeamPlayer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <x-primary-button class="bg-green-500 hover:bg-green-600 border-green-600 hover:border-green-600">{{ __('Go and play') }}</x-primary-button>
                            </form>
                            </li>
                    @endif
                    @endforeach
                    </ul>
                </div>
                <div class="bg-base-200 shadow-lg rounded-md p-4 border-2 border-green-500 transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)]">
                    <h1 class="mb-8 text-xl font-bold text-center">{{ __('In Game Players') }}</h1>
                    <ul>
                        @foreach($guestTeamPlayers as $guestTeamPlayer)
                        @if($guestTeamPlayer['status'] == 'guest_court')
                            <li class="odd:bg-base-300 even:bg-base-100 flex justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold my-1">
                                <span class="h-6 w-6 flex justify-center items-center leading-5 transition duration-150 ease-in bg-base-200 rounded-full font-semibold mr-2"> 
                                    {{ $guestTeamPlayer->player->player_no }}
                                </span> 
                                <span class="text-left">{{ $guestTeamPlayer->player->player_name }}</span>
                                <form action="{{ route('players.updateAwayPlayerStatusToBench', $guestTeamPlayer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <x-primary-button>{{ __('Go to bench') }}</x-primary-button>
                                </form>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="bg-base-100 shadow-lg rounded-md p-4 transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)]">
                    <h1 class="mb-8 text-xl font-bold text-center">{{ __('Bench Players') }}</h1>
                    @foreach($guestTeamPlayers as $guestTeamPlayer)
                    @if($guestTeamPlayer['status'] == 'guest_bench')                        
                        <li class="odd:bg-base-300 even:bg-base-200 flex justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold my-1">
                            <span class="h-6 w-6 flex justify-center items-center leading-5 transition duration-150 ease-in bg-base-100 rounded-full font-semibold mr-2"> 
                                {{ $guestTeamPlayer->player->player_no }}
                            </span> 
                            <span class="text-left">{{ $guestTeamPlayer->player->player_name }}</span>
                            <form action="{{ route('players.updateAwayPlayerStatus', $guestTeamPlayer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <x-primary-button class="bg-green-500 hover:bg-green-600 border-green-600 hover:border-green-600">{{ __('Go and play') }}</x-primary-button>
                            </form>
                        </li>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="p-4">
                <form action="{{ route('clear.clearAwayLineup') }}" method="POST">
                    @csrf
                    <x-danger-button>{{ __('Clear in game players') }}</x-danger-button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
