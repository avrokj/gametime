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
            @if($playersStats->isEmpty())
            <p>
                This game has no stats
            </p>
            @else
            <div class="container">
                <h1>Game Stats</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Player Name</th>
                            <th>Missed Shots</th>
                            <th>Made Freethrows</th>
                            <th>Made 2-point Shots</th>
                            <th>Made 3-pointers</th>
                            <th>Total Points</th>
                            <th>Total Shots</th>
                            <th>Shooting Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($playersStats as $stats)
                            <tr>
                                <td>{{ $stats['player']->player_name }}</td>
                                <td>{{ $stats['actions'][0] }}</td>
                                <td>{{ $stats['actions'][1] }}</td>
                                <td>{{ $stats['actions'][2] }}</td>
                                <td>{{ $stats['actions'][3] }}</td>
                                <td>{{ $stats['total_points'] }}</td>
                                <td>{{ $stats['total_actions'] }}</td>
                                <td>{{ number_format($stats['shooting_percentage'], 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>