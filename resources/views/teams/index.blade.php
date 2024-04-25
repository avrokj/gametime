<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Teams') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('teams.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search teams here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_team').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add team') }}
                </x-primary-button>

                <dialog id="add_team" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="font-bold text-lg text-left">{{ __('Add Team') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Team Name -->
                        <div>
                            <label class="input input-bordered flex items-center gap-2" for="team_name" :value="{{__('Team Name')}}" >
                                <x-heroicon-c-user-group class="w-4 h-4 opacity-70" />
                                <x-text-input id="team_name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Team Name')}}" type="text" name="team_name" :value="old('team_name')" required autofocus autocomplete="team_name" />
                            </label>
                            <x-input-error :messages="$errors->get('team_name')" class="mt-2" />
                        </div>
                
                        <!-- Sports name -->
                        <div class="mt-4">
                            <x-select name="sport_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select sports') }}</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sports_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>
                
                        <!-- Coach name -->
                        <div class="mt-4">
                            <x-select name="coach_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select coach') }}</option>
                                @foreach ($coaches as $coach)
                                    <option value="{{ $coach->id }}">{{ $coach->coach_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>
                        <!-- Logo -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="logo" :value="{{__('Team logo')}}" >
                                <x-feathericon-image class="w-4 h-4 opacity-70" />
                                <input type="file" name="logo" id="logo">
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
                    <th class="border-b-2 border-base-300">{{ __('Logo') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Team Name') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Sports') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Coach') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Players') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $team)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">                                    
                                    <a href="/players">
                                        <div class="btn btn-ghost btn-circle avatar">
                                            <div class="w-10 rounded-full">
                                                <img src="{{ asset('images/logos/' . $team->logo) }}" alt="Team Image">
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->team_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->sport->sports_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->coach->coach_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->players->count() }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_team{{ $team->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_team{{ $team->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg">{{ __('Edit Team') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('teams.update', $team) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <!-- Team Name -->
                                            <div>
                                                <label class="input input-bordered flex items-center gap-2" for="team_name" :value="old('team_name', $team->team_name)" >
                                                    <x-heroicon-c-user-group class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="team_name" type="text" class="grow border-none focus:outline-none" type="text" name="team_name" :value="old('team_name', $team->team_name)" required autofocus autocomplete="team_name" />
                                                </label>
                                                <x-input-error :messages="$errors->get('team_name')" class="mt-2" />
                                            </div>
                                    
                                            <!-- Sports name -->
                                            <div class="mt-4">
                                                <x-select name="sport_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Sports') }}</option>
                                                    @foreach ($sports as $sport)
                                                        <option value="{{ $sport->id }}" {{ (old('sport_id', $team->sport_id) == $sport->id) ? 'selected' : '' }}>
                                                            {{ $sport->sports_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>
                                        
                                            <!-- Coach name -->
                                            <div class="mt-4">
                                                <x-select name="coach_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Coach') }}</option>
                                                    @foreach ($coaches as $coach)
                                                        <option value="{{ $sport->id }}" {{ (old('coach_id', $team->coach_id) == $coach->id) ? 'selected' : '' }}>
                                                            {{ $coach->coach_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>

                                            <!-- Image -->
                                            <div class="mt-4">
                                                <label class="input input-bordered flex items-center gap-2" for="new_logo" :value="{{__('Team Image')}}" >
                                                    <div class="rounded-full">
                                                        <img src="{{ asset('images/logos/' . $team->logo) }}" alt="Current team image" class="w-10 rounded-full">
                                                    </div>
                                                    <input type="file" name="new_logo" id="new_logo">
                                                </label>
                                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                            </div>

                                            <div class="mt-4 space-x-2 text-left">
                                                <x-save-button> {{ __('Save') }}</x-save-button>
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
                                    
                                <form method="POST" action="{{ route('teams.destroy', $team) }}">
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
                        @foreach ($teams as $team)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">                                    
                                    <a href="{{ route('teams.players', ['teamId' => $team->id]) }}">
                                        <div class="btn btn-ghost btn-circle avatar">
                                            <div class="w-10 rounded-full">
                                                <img src="{{ asset('images/logos/' . $team->logo) }}" alt="Team Image">
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->team_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->sport->sports_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $team->coach->coach_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <a href="{{ route('teams.players', ['teamId' => $team->id]) }}">
                                        {{ $team->players->count() }}
                                    </a>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $team->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $team->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">{{ __('Edit Team') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('teams.update', $team) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <!-- Team name -->
                                                <div>
                                                    <label class="input input-bordered flex items-center gap-2" for="team_name" :value="old('team_name', $team->team_name)" >
                                                        <x-heroicon-c-user-group class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="team_name" type="text" class="grow border-none focus:outline-none" type="text" name="team_name" :value="old('team_name', $team->team_name)" required autofocus autocomplete="team_name" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('team_name')" class="mt-2" />
                                                </div>
                                        
                                                <!-- Sports name -->
                                                <div class="mt-4">
                                                    <x-select name="sport_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Sports') }}</option>
                                                        @foreach ($sports as $sport)
                                                            <option value="{{ $sport->id }}" {{ (old('sport_id', $team->sport_id) == $sport->id) ? 'selected' : '' }}>
                                                                {{ $sport->sports_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>
                                        
                                                <!-- Coach name -->
                                                <div class="mt-4">
                                                    <x-select name="coach_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Coach') }}</option>
                                                        @foreach ($coaches as $coach)
                                                            <option value="{{ $sport->id }}" {{ (old('coach_id', $team->coach_id) == $coach->id) ? 'selected' : '' }}>
                                                                {{ $coach->coach_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>

                                                <!-- Image -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="new_logo" :value="{{__('Team Image')}}" >
                                                        <div class="rounded-full">
                                                            <img src="{{ asset('images/logos/' . $team->logo) }}" alt="Current team image" class="w-10 rounded-full">
                                                        </div>
                                                        <input type="file" name="new_logo" id="new_logo">
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
                                            
                                        <form method="POST" action="{{ route('teams.destroy', $team) }}">
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
                {{ $teams->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>