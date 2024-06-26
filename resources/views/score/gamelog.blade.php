<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="flex font-semibold text-xl leading-tight items-center">
                    {{ __('Scoreboard') }} 
                </h2> 
            </div>
            <div>
                <h3 class="font-semibold text-lg leading-tight flex gap-4">                    
                    <a href="../gamelog/{{ $gamelog[0]->game_id }}" class="flex"><x-iconpark-timeline-o class="w-6 h-6 opacity-70 text-green-500 hover:text-green-600" /> {{ __('Gamelog') }}</a>
                    <a href="../stats/{{ $gamelog[0]->game_id }}" class="flex"><x-heroicon-s-document-chart-bar class="w-6 h-6 opacity-70 text-green-500 hover:text-green-600" /> {{ __('Statistics') }}</a>
                </h3> 
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-base-300 overflow-hidden shadow-md rounded-md">
                <div class="p-6 flex-grow overflow-auto">
                    @if($gamelog->isEmpty())
                    <p>
                        This game has no events
                    </p>
                    @else    
                    <ul class="timeline timeline-vertical">
                        <li>
                            <div class="flex timeline-start timeline-box font-semibold items-center gap-2">
                                {{ $homeTeam->team_name }}
                                <div class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="{{ asset('images/logos/' . $homeTeam->logo) }}" alt="Team Image">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col timeline-middle items-center">
                                vs
                            </div>
                            <div class="flex timeline-end timeline-box font-semibold items-center gap-2">                                
                                <div class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="{{ asset('images/logos/' . $guestTeam->logo) }}" alt="Team Image">
                                    </div>
                                </div>
                                {{ $guestTeam->team_name }}
                            </div>
                        </li>                     
                        
                    @foreach($gamelog as $log)  
                        @if ($log->game->home_team_id == $log->player->team_id)                      
                        <li>
                            <div class="flex timeline-start timeline-box">
                                <span class="h-6 w-6 flex justify-center items-center leading-5 transition duration-150 ease-in bg-base-300 rounded-full font-semibold mr-2">{{ $log->player->player_no }}</span> 
                                <div class="btn btn-ghost btn-circle min-h-6 h-6 w-6 mr-1 avatar">
                                    <div class="w-6 rounded-full hover:scale-[2.5]">
                                        <img src="{{ asset('images/players/' . $log->player->image) }}" alt="{{ $log->player->player_name }} Image">
                                    </div>
                                </div>
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
                            </div>
                            <div class="flex flex-col timeline-middle items-center">
                                <span class="text-xs opacity-50">{{ $log->created_at->format('H:i:s') }}</span>
                                <span class="text-xl"><strong>{{ $log->home_score}}</strong> : {{ $log->away_score}}</span>
                            </div>
                            <hr/>
                        </li>
                        @else
                        <li>
                            <hr/>
                            <div class="flex flex-col timeline-middle items-center">
                                <span class="text-xs opacity-50">{{ $log->created_at->format('H:i:s') }}</span>
                                <span class="text-xl">{{ $log->home_score}} : <strong>{{ $log->away_score}}</strong></span>
                            </div>
                            <div class="flex timeline-end timeline-box">
                                <span class="h-6 w-6 flex justify-center items-center leading-5 transition duration-150 ease-in bg-base-300 rounded-full font-semibold mr-2">{{ $log->player->player_no }}</span>
                                <div class="btn btn-ghost btn-circle min-h-6 h-6 w-6 mr-1 avatar">
                                    <div class="w-6 rounded-full hover:scale-[2.5]">
                                        <img src="{{ asset('images/players/' . $log->player->image) }}" alt="{{ $log->player->player_name }} Image">
                                    </div>
                                </div>
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
                            </div>
                            <hr/>
                          </li>
                        @endif
                    @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>