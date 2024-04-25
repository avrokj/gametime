<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Events') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('events.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search events here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_event').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add Event') }}
                </x-primary-button>

                <dialog id="add_event" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="font-bold text-lg text-left">{{ __('Add Event') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Event -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="{{ __('Event Name') }}" >
                                <x-iconpark-scoreboard class="w-4 h-4 opacity-70" />
                                <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Event Name') }}" type="text" name="sb_id" :value="old('sb_id')" autocomplete="sb_id" />
                            </label>
                            <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="{{ __('Location') }}" >
                                <x-heroicon-c-map-pin class="w-4 h-4 opacity-70" />
                                <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Location') }}" type="text" name="sb_id" :value="old('sb_id')" autocomplete="sb_id" />
                            </label>
                            <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                        </div>

                        <!-- DateTime -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="{{ __('Datetime') }}" >
                                <x-heroicon-c-calendar-days class="w-4 h-4 opacity-70" />
                                <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Datetime') }}" type="text" name="sb_id" :value="old('sb_id')" autocomplete="sb_id" />
                            </label>
                            <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                        </div>

                        <!-- Sport name -->
                        <div class="mt-4">
                            <x-select name="sport_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Sports') }}</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sports_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>

                        <!-- Game name -->
                        <div class="mt-4">
                            <x-select name="game_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Game') }}</option>
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}" {{ (old('game_id', $game->game_id) == $game->id) ? 'selected' : '' }}>
                                        ({{ $game->id }}) {{ $game->home_team_id }} vs {{ $game->away_team_id }}
                                    </option>
                                @endforeach                                
                            </x-select>
                        </div>                      
                                        
                        <!-- Arena name -->
                        <div class="mt-4">
                            <x-select name="arena_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Arena') }}</option>
                                @foreach ($arenas as $arena)
                                    <option value="{{ $arena->id }}">{{ $arena->arena_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>

                        <div class="mt-4 space-x-2 text-left">
                            <x-save-button> {{ __('Save') }}</x-save-button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-action -mt-8">
                        <form method="dialog">
                            <x-cancel-button>
                                {{ __('Cancel') }}
                            </x-cancel-button>
                        </form>
                    </div>
                </div>
                </dialog>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-300 overflow-hidden shadow-md rounded-md">
            <div class="p-6 flex-grow overflow-auto">
            <table class="table min-w-full">            
                <thead class="text-base uppercase bg-base-100">
                <tr class="text-left py-4">
                    <th class="border-b-2 border-base-300">{{ __('ID') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Event name') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Location') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Datetime') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Sports') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Game') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Arena') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $event)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $event->event_id }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $event->event_name }} 
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $event->location }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $event->datetime }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $event->players->count() }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_event{{ $event->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_event{{ $event->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg">{{ __('Edit Game') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <!-- Event name -->
                                            <div class="mt-4">
                                                <x-select name="event_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Event') }}</option>
                                                    @foreach ($events as $event)
                                                        <option value="{{ $team->id }}" {{ (old('event_id', $event->event_id) == $event->id) ? 'selected' : '' }}>
                                                            {{ $event->event_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>            
                                                            
                                            <!-- Scoreboard ID -->
                                            <div class="mt-4">
                                                <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="old('sb_id', $game->sb_id)" >
                                                    <x-iconpark-scoreboard class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Scoreboard Id') }}" type="text" name="sb_id" :value="old('sb_id', $game->sb_id)" autocomplete="sb_id" />
                                                </label>
                                                <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                                            </div>

                                            <div class="mt-4 space-x-2 text-left">
                                                <x-save-button> {{ __('Save') }}</x-save-button>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="modal-action -mt-8">
                                            <form method="dialog">
                                                <x-cancel-button>
                                                    {{ __('Cancel') }}
                                                </x-cancel-button>
                                            </form>
                                        </div>
                                    </div>
                                    </dialog>
                                    
                                <form method="POST" action="{{ route('events.destroy', $event) }}">
                                    @csrf
                                    @method('delete')
                                    <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                    </x-delete-button>
                                </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                        @else                            
                            <tr>
                                <td class="pt-4 col-span-2">
                                    {{ __('No results found.') }}
                                </td>
                            </tr>
                        @endif

                    @else 
                        @foreach ($events as $event)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $event->event_id }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $event->event_name }} 
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $event->location }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $event->datetime }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $event->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $event->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">{{ __('Edit Game') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <!-- Event name -->
                                                <div class="mt-4">
                                                    <x-select name="event_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Event') }}</option>
                                                        @foreach ($events as $event)
                                                            <option value="{{ $team->id }}" {{ (old('event_id', $event->event_id) == $event->id) ? 'selected' : '' }}>
                                                                {{ $event->event_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>            
                                                                
                                                <!-- Scoreboard ID -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="old('sb_id', $game->sb_id)" >
                                                        <x-iconpark-scoreboard class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Scoreboard Id') }}" type="text" name="sb_id" :value="old('sb_id', $game->sb_id)" autocomplete="sb_id" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                                                </div>

                                                <div class="mt-4 space-x-2 text-left">
                                                    <x-save-button> {{ __('Save') }}</x-save-button>
                                                </div>
                                            </form>
                                            </div>
                                            <div class="modal-action -mt-8">
                                                <form method="dialog">
                                                    <x-cancel-button>
                                                        {{ __('Cancel') }}
                                                    </x-cancel-button>
                                                </form>
                                            </div>
                                        </div>
                                        </dialog>
                                            
                                        <form method="POST" action="{{ route('events.destroy', $event) }}">
                                            @csrf
                                            @method('delete')
                                            <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                            </x-delete-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif           
                </tbody>
            </table>
            <div class="pt-4 col-span-2">
                {{ $events->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>