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
            @if($gamelog->isEmpty())
            <p>
                This game has no events
            </p>
            @else
            @foreach($gamelog as $log)
            
            <p>
                Mangija id: {{ $log->player_id }} sooritas viske {{ $log->action}} ja mangu seis on {{ $log->home_score}} : {{ $log->away_score}}
            </p>
            @endforeach
            @endif
        </div>
    </div>

</x-app-layout>