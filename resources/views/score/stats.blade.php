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
            @if($stats->isEmpty())
            <p>
                This game has no stats
            </p>
            @else
            @foreach($stats as $stat)
            
            <p>
                Mangija id: {{ $stat->player_id }} sooritas viske {{ $stat->action}} ja mangu seis on {{ $stat->home_score}} : {{ $stat->away_score}}
            </p>
            @endforeach
            @endif
        </div>
    </div>
    
</x-app-layout>