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
                {{ $log->player->player_name }} 
                @switch($log->action)
                                @case(0)
                                    viskas ässa
                                    @break
                                @case(1)
                                    tabas vabaviske
                                    @break
                                @case(2)
                                    tabas kahepuntki viske
                                    @break
                                @case(3)
                                    tabas kolmese
                                    @break
                                @default
                                    ladus tellise
                            @endswitch
                 ,seis on <b>{{ $log->home_score}} : {{ $log->away_score}}</b>
            </p>
            @endforeach
            @endif
        </div>
    </div>

</x-app-layout>