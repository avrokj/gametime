<x-app-layout>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Game Stats') }}
                </h2> 
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-300 overflow-hidden shadow-md rounded-md">            
            <div class="p-6 flex-grow overflow-auto">
                @if($teamsStats->isEmpty())
                <p>
                    {{ __('This game has no stats') }}
                </p>
                @else
                <div class="container">
                    @foreach($teamsStats as $teamName => $players)
                        @php
                            $teamTotals = [
                                'free_throws' => 0,
                                'two_pointers' => 0,
                                'three_pointers' => 0,
                                'points' => 0,
                                'field_goals' => ['made' => 0, 'attempted' => 0]
                            ];

                            foreach ($players as $stats) {
                                $teamTotals['free_throws'] += $stats['actions'][1] ?? 0;
                                $teamTotals['two_pointers'] += $stats['actions'][2] ?? 0;
                                $teamTotals['three_pointers'] += $stats['actions'][3] ?? 0;
                                $teamTotals['points'] += $stats['total_points'] ?? 0;
                                $teamTotals['field_goals']['made'] += $stats['total_in'] ?? 0;
                                $teamTotals['field_goals']['attempted'] += $stats['total_shots'] ?? 0;
                            }
                        @endphp

                        <h2 class="font-semibold text-lg leading-tight !pb-4 !pt-6">{{ $teamName }}</h2>
                        <table id="statsTable-{{ $teamName }}" class="table table-striped !pt-1">
                            <thead class="bg-base-100">
                                <tr>
                                    <th>{{ __('Player Name') }}</th>
                                    <th class="text-center">{{ __('Free throws') }}</th>
                                    <th class="text-center">{{ __('2 pointers') }}</th>
                                    <th class="text-center">{{ __('3 pointers') }}</th>
                                    <th class="text-center">{{ __('Points') }}</th>
                                    <th class="text-center">{{ __('Field goals') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($players as $stats)
                                    <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                        <td class="flex items-center">
                                            <div class="btn btn-ghost btn-circle avatar">
                                                <div class="w-8 rounded-full hover:scale-[2.5]">
                                                    @if(isset($stats['player']->image))
                                                        <img src="{{ asset('images/players/' . $stats['player']->image) }}" alt="{{ $stats['player']->player_name }} image">
                                                    @else
                                                        <img src="{{ asset('images/players/default.png') }}" alt="default image">
                                                    @endif
                                                </div>
                                            </div>
                                            <span class="font-semibold pr-1">{{ $stats['player']->player_no }}</span> {{ $stats['player']->player_name }}
                                        </td>
                                        <td class="text-center">{{ $stats['actions'][1] ?? 0 }}</td>
                                        <td class="text-center">{{ $stats['actions'][2] ?? 0 }}</td>
                                        <td class="text-center">{{ $stats['actions'][3] ?? 0 }}</td>
                                        <td class="text-center">{{ $stats['total_points'] ?? 0 }}</td>
                                        <td class="text-center">{{ $stats['total_in'] ?? 0 }}/{{ $stats['total_shots'] ?? 0 }} ({{ isset($stats['shooting_percentage']) ? number_format($stats['shooting_percentage'], 0) . '%' : 'N/A' }})</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-base-100">
                                <tr>
                                    <th>{{ __('Total') }}</th>
                                    <th class="text-center">{{ $teamTotals['free_throws'] }}</th>
                                    <th class="text-center">{{ $teamTotals['two_pointers'] }}</th>
                                    <th class="text-center">{{ $teamTotals['three_pointers'] }}</th>
                                    <th class="text-center">{{ $teamTotals['points'] }}</th>
                                    <th class="text-center">
                                        {{ $teamTotals['field_goals']['made'] }}/{{ $teamTotals['field_goals']['attempted'] }}
                                        ({{ $teamTotals['field_goals']['attempted'] != 0 ? number_format(($teamTotals['field_goals']['made'] / $teamTotals['field_goals']['attempted']) * 100, 0) . '%' : 'N/A' }})
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#statsTable-{{ $teamName }}').DataTable({
                                    "order": [[ 4, "desc" ]]
                                });
                            });
                        </script>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>