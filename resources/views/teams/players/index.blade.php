<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Players') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('players.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search players here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_player').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add player') }}
                </x-primary-button>

                <dialog id="add_player" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="font-bold text-lg text-left">{{ __('Add Player') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Player Name -->
                        <div>
                            <label class="input input-bordered flex items-center gap-2" for="player_name" :value="{{__('Player Name')}}" >
                                <x-heroicon-m-user-circle class="w-4 h-4 opacity-70" />
                                <x-text-input id="player_name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Player Name')}}" type="text" name="player_name" :value="old('player_name')" required autofocus autocomplete="player_name" />
                            </label>
                            <x-input-error :messages="$errors->get('player_name')" class="mt-2" />
                        </div>

                        <!-- Player No -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="player_name" :value="{{__('Player Number')}}" >
                                <x-tabler-shirt-sport class="w-4 h-4 opacity-70" />
                                <x-text-input id="player_no" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Player Number')}}" type="text" name="player_no" :value="old('player_no')" required autofocus autocomplete="player_no" />
                            </label>
                            <x-input-error :messages="$errors->get('player_no')" class="mt-2" />
                        </div>

                        <!-- Birthday -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="player_name" :value="{{__('Date of birth yyyy-mm-dd')}}" >
                                <x-tabler-calendar-month class="w-4 h-4 opacity-70" />
                                <x-text-input id="dob" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Date of birth yyyy-mm-dd')}}" type="text" name="dob" :value="old('dob')" required autofocus autocomplete="dob" />
                            </label>
                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                        </div>
                
                        <!-- Teams name -->
                        <div class="mt-4">
                            <x-select name="team_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select team') }}</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>
                
                        <!-- Position name -->
                        <div class="mt-4">
                            <x-select name="position_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select position') }}</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>

                        <!-- Country name -->
                        <div class="mt-4">
                            <x-select name="country_id" class="!max-w-full country-select">
                                <option disabled selected value="">{{ __('Select Country') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-image="{{ asset('vendor/blade-flags/country-'.strtolower($country->code).'.svg') }}">
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach                          
                            </x-select>
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="logo" :value="{{__('Player image')}}" >
                                <x-feathericon-image class="w-4 h-4 opacity-70" />
                                <input type="file" name="image" id="image">
                            </label>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <div class="mt-4 space-x-2 text-save">
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
                    <th class="border-b-2 border-base-300">{{ __('Image') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('No') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Player Name') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Birthday') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Teams') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Position') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Country') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $player)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">                                    
                                    <div class="btn btn-ghost btn-circle avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->player_no }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->player_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->format('d.m.Y') }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->diffInYears(\Carbon\Carbon::now()) }}) 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->team->teams_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->position->position_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <img src="{{ asset('vendor/blade-flags/country-'.strtolower($player->country->code).'.svg') }}" class="w-6 h-6" />{{ $player->country->country_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_player{{ $player->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_player{{ $player->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg">{{ __('Edit Player') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('players.update', $player) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <!-- Player Name -->
                                            <div>
                                                <label class="input input-bordered flex items-center gap-2" for="player_name" :value="old('player_name', $player->player_name)" >
                                                    <x-heroicon-c-user-group class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="player_name" type="text" class="grow border-none focus:outline-none" type="text" name="player_name" :value="old('player_name', $player->player_name)" required autofocus autocomplete="player_name" />
                                                </label>
                                                <x-input-error :messages="$errors->get('player_name')" class="mt-2" />
                                            </div>
                                    
                                            <!-- Teams name -->
                                            <div class="mt-4">
                                                <x-select name="team_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Teams') }}</option>
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $team->id }}" {{ (old('team_id', $player->team_id) == $team->id) ? 'selected' : '' }}>
                                                            {{ $team->teams_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>
                                        
                                            <!-- Position name -->
                                            <div class="mt-4">
                                                <x-select name="position_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Position') }}</option>
                                                    @foreach ($positions as $position)
                                                        <option value="{{ $team->id }}" {{ (old('position_id', $player->position_id) == $position->id) ? 'selected' : '' }}>
                                                            {{ $position->position_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>

                                            <!-- Image -->
                                            <div class="mt-4">
                                                <label class="input input-bordered flex items-center gap-2" for="new_image" :value="{{__('Player Image')}}" >
                                                    <div class="rounded-full">
                                                        <img src="{{ asset('images/players/' . $player->logo) }}" alt="Current player image" class="w-10 rounded-full">
                                                    </div>
                                                    <input type="file" name="new_image" id="new_image">
                                                </label>
                                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
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
                                    
                                <form method="POST" action="{{ route('players.destroy', $player) }}">
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
                        @foreach ($players as $player)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">                                    
                                    <div class="btn btn-ghost btn-circle avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->player_no }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->player_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->format('d.m.Y') }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->diffInYears(\Carbon\Carbon::now()) }}) 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="w-10 rounded-full">
                                        <img src="{{ asset('images/logos/' . $player->team->logo) }}" alt="{{ $player->team->team_name }} image"> {{ $player->team->team_name }}
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $player->position->position_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <img src="{{ asset('vendor/blade-flags/country-'.strtolower($player->country->code).'.svg') }}" class="w-6 h-6" />{{ $player->country->country_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $player->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $player->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">{{ __('Edit Player') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('players.update', $player) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <!-- Player name -->
                                                <div>
                                                    <label class="input input-bordered flex items-center gap-2" for="player_name" :value="old('player_name', $player->player_name)" >
                                                        <x-heroicon-c-user-group class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="player_name" type="text" class="grow border-none focus:outline-none" type="text" name="player_name" :value="old('player_name', $player->player_name)" required autofocus autocomplete="player_name" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('player_name')" class="mt-2" />
                                                </div>

                                                <!-- Player No -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="player_name" :value="old('player_no', $player->player_no)" >
                                                        <x-tabler-shirt-sport class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="player_no" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Player Number')}}" type="text" name="player_no" :value="old('player_no', $player->player_no)" required autofocus autocomplete="player_no" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('player_no')" class="mt-2" />
                                                </div>
                        
                                                <!-- Birthday -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="dob" :value="old('player_no', $player->dob)" >
                                                        <x-tabler-calendar-month class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="dob" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Date of birth')}}" type="text" name="dob" :value="old('dob', $player->dob)" required autofocus autocomplete="dob" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                                </div>
                                        
                                                <!-- Teams name -->
                                                <div class="mt-4">
                                                    <x-select name="team_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Teams') }}</option>
                                                        @foreach ($teams as $team)
                                                            <option value="{{ $team->id }}" {{ (old('team_id', $player->team_id) == $team->id) ? 'selected' : '' }}>
                                                                {{ $team->team_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>
                                        
                                                <!-- Position name -->
                                                <div class="mt-4">
                                                    <x-select name="position_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Position') }}</option>
                                                        @foreach ($positions as $position)
                                                            <option value="{{ $team->id }}" {{ (old('position_id', $player->position_id) == $position->id) ? 'selected' : '' }}>
                                                                {{ $position->position_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>                                               
            
                                                <!-- Country name -->
                                                <div class="mt-4">
                                                    <x-select name="country_id" class="!max-w-full">
                                                        <option disabled value="">{{ __('Select Country') }}</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}" {{ (old('country_id', $player->country_id) == $country->id) ? 'selected' : '' }}>
                                                                <img src="{{ asset('vendor/blade-flags/country-'.strtolower($country->code).'.svg') }}" class="w-6 h-6" /> {{ $country->country_name }}
                                                            </option>
                                                        @endforeach                               
                                                    </x-select>
                                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                                </div>

                                                <!-- Image -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="new_image" :value="{{__('Player Image')}}" >
                                                        <div class="rounded-full">
                                                            <img src="{{ asset('images/players/' . $player->image) }}" alt="Current player image" class="w-10 rounded-full">
                                                        </div>
                                                        <input type="file" name="new_image" id="new_image">
                                                    </label>
                                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
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
                                            
                                        <form method="POST" action="{{ route('players.destroy', $player) }}">
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
                {{ $players->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
    <style>
        .country-select {
    appearance: none;
    background-image: url('path/to/arrow-icon.png'); /* Arrow icon for select box */
    background-position: right center;
    background-repeat: no-repeat;
    padding-right: 20px; /* Adjust as needed */
}

.country-select option {
    padding-left: 30px; /* Adjust as needed */
    background-repeat: no-repeat;
}

/* Styling each option */
.country-select option[data-image] {
    background-size: 24px; /* Adjust as needed */
    background-image: url('path/to/transparent.png'); /* Transparent image for spacing */
}

/* Set image for each option */
@foreach ($countries as $country)
    .country-select option[value="{{ $country->id }}"][data-image] {
        background-image: url('{{ asset('vendor/blade-flags/country-'.strtolower($country->code).'.svg') }}');
    }
@endforeach
</style>
</x-app-layout>