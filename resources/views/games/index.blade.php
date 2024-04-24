<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Games') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('games.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search games here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_game').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add game') }}
                </x-primary-button>

                <dialog id="add_game" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="font-bold text-lg text-left">{{ __('Add Game') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
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
                                        
                        <!-- Home Team name -->
                        <div class="mt-4">
                            <x-select name="home_team_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Home Team') }}</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>                      
                                        
                        <!-- Away Team name -->
                        <div class="mt-4">
                            <x-select name="away_team_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Away Team') }}</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>            
                                        
                        <!-- Status -->
                        <div class="mt-4">
                            <x-select name="status" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Status') }}</option>
                                    <option value="0">
                                        {{ __('Created') }}
                                    </option>  
                                    <option value="1">
                                        {{ __('Live') }}
                                    </option> 
                                    <option value="2">
                                        {{ __('End') }}
                                    </option>                             
                            </x-select>
                        </div>            
                                        
                        <!-- Scoreboard ID -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="sb_id" :value="{{ __('Scoreboard Id') }}" >
                                <x-iconpark-scoreboard class="w-4 h-4 opacity-70" />
                                <x-text-input id="sb_id" type="text" class="grow border-none focus:outline-none" placeholder="{{ __('Scoreboard Id') }}" type="text" name="sb_id" :value="old('sb_id')" autocomplete="sb_id" />
                            </label>
                            <x-input-error :messages="$errors->get('sb_id')" class="mt-2" />
                        </div>

                        <div class="mt-4 space-x-2">
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
                    <th class="border-b-2 border-base-300">{{ __('Event') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Home Team') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Score') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Away Team') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('Status') }}</th>
                    <th class="border-b-2 border-base-300 text-center">{{ __('SB Id') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $game)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $game->event->event_name }} 
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $game->team->team_name }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $game->team->team_name }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $game->players->count() }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_game{{ $game->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_game{{ $game->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg">{{ __('Edit Game') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">
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
                                
                                            <!-- Home Team name -->
                                            <div class="mt-4">
                                                <x-select name="home_team_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Home Team') }}</option>
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $team->id }}" {{ (old('home_team_id', $game->home_team_id) == $team->id) ? 'selected' : '' }}>
                                                            {{ $team->team_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>
                                    
                                            <!-- Away Team name -->
                                            <div class="mt-4">
                                                <x-select name="away_team_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Away Team') }}</option>
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $team->id }}" {{ (old('away_team_id', $game->away_team_id) == $team->id) ? 'selected' : '' }}>
                                                            {{ $team->team_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>            
                                    
                                            <!-- Status -->
                                            <div class="mt-4">
                                                <x-select name="status" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Status') }}</option>
                                                        <option value="0" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                            {{ __('Created') }}
                                                        </option>  
                                                        <option value="1" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                            {{ __('Live') }}
                                                        </option> 
                                                        <option value="2" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                            {{ __('End') }}
                                                        </option>                             
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

                                            <div class="mt-4 space-x-2">
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
                                    
                                <form method="POST" action="{{ route('games.destroy', $game) }}">
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
                        @foreach ($games as $game)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $game->id }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    @if($game->event_id == 0)
                                        {{ __('No Event') }}
                                    @else
                                        {{ $game->event_id }}
                                    @endif
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    <div class="flex justify-center w-full">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ asset('images/logos/' . $game->homeTeam->logo) }}" alt="{{ $game->homeTeam->team_name }} image"> {{ $game->homeTeam->team_name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $game->home_score }} - {{ $game->away_score }}
                                </td>
                                <td class="border-b-2 border-base-300 text-center"> 
                                    <div class="flex justify-center w-full">                                   
                                        <div class="w-10 rounded-full">
                                            <img src="{{ asset('images/logos/' . $game->awayTeam->logo) }}" alt="{{ $game->awayTeam->team_name }} image"> {{ $game->awayTeam->team_name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300 text-center">
                                    @if($game->status == 0)
                                    
                                    <span class="badge badge-primary badge-outline">
                                        {{ __('Created') }} 
                                    </span>
                                    @elseif($game->status == 1)
                                        <span class="badge badge-accent badge-outline">
                                            {{ __('Live') }} 
                                        </span>
                                    @else
                                        <span class="badge badge-default badge-outline">
                                            {{ __('End') }} 
                                        </span>
                                    @endif
                                </td>                                
                                <td class="border-b-2 border-base-300 text-center">
                                    {{ $game->sb_id }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $game->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $game->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">{{ __('Edit Game') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">
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
                                    
                                                <!-- Home Team name -->
                                                <div class="mt-4">
                                                    <x-select name="home_team_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Home Team') }}</option>
                                                        @foreach ($teams as $team)
                                                            <option value="{{ $team->id }}" {{ (old('home_team_id', $game->home_team_id) == $team->id) ? 'selected' : '' }}>
                                                                {{ $team->team_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>
                                        
                                                <!-- Away Team name -->
                                                <div class="mt-4">
                                                    <x-select name="away_team_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Away Team') }}</option>
                                                        @foreach ($teams as $team)
                                                            <option value="{{ $team->id }}" {{ (old('away_team_id', $game->away_team_id) == $team->id) ? 'selected' : '' }}>
                                                                {{ $team->team_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>            
                                        
                                                <!-- Status -->
                                                <div class="mt-4">
                                                    <x-select name="status" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Status') }}</option>
                                                            <option value="0" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                                {{ __('Created') }}
                                                            </option>  
                                                            <option value="1" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                                {{ __('Live') }}
                                                            </option> 
                                                            <option value="2" {{ (old('status', $game->status) == $game->id) ? 'selected' : '' }}>
                                                                {{ __('End') }}
                                                            </option>                             
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

                                                <div class="mt-4 space-x-2">
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
                                            
                                        <form method="POST" action="{{ route('games.destroy', $game) }}">
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
                {{ $games->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>