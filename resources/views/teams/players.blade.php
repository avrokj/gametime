<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                    <div class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('images/logos/' . $team->logo) }}" alt="Team Image">
                        </div>
                    </div> {{ $team->team_name }} - {{ __('Players') }} <small>({{ $team->players->count() }})</small>
                </h2> 
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
                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
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
                            <x-select name="country_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Country') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"><x-flag-country-{{ $country->iso2_code }} class="w-6 h-6"/> {{ $country->country_name }}</option>
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
            <!-- Display active players -->            
            <h2 class="font-semibold text-xl leading-tight pl-4 pt-4">
                {{ __('Active') }} <small>({{ $team->players()->where('status', 'active')->count() }})</small>
            </h2>           
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 p-4 gap-8">
                @foreach ($players as $player)
                    @if ($player->status === 'active')
                        <div class="bg-base-200 scale-100 text-center p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image" class="object-cover w-full aspect-square rounded-full">
                            <h2 class="text-2xl">{{ $player->player_no }}</h2>
                            <h3 class="text-xl font-bold [word-spacing:100vw]">{{ $player->player_name }}</h3>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->format('d.m.Y') }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->diffInYears(\Carbon\Carbon::now()) }}) </p>
                            <div class="flex justify-end">
                                <x-edit-button onclick="window.location='../../players/search?search={{ $player->player_name }}'" class="mb-[-20px] mr-[-20px] !text-slate-400">                      
                                </x-edit-button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Display injured players --> 
            <h2 class="font-semibold text-xl leading-tight pl-4 pt-4">
                {{ __('Injured') }} <small>({{ $team->players()->where('status', 'injured')->count() }})</small>
            </h2>            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 p-4 gap-8">
                @foreach ($players as $player)
                    @if ($player->status === 'injured')
                        <div class="bg-base-100 scale-100 text-center p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image" class="object-cover w-full aspect-square rounded-full">
                            <h2 class="text-2xl">{{ $player->player_no }}</h2>
                            <h3 class="text-xl font-bold [word-spacing:100vw]">{{ $player->player_name }}</h3>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->format('d.m.Y') }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $player->dob)->diffInYears(\Carbon\Carbon::now()) }}) </p>
                            <div class="flex justify-end">
                                <x-edit-button onclick="window.location='../../players/search?search={{ $player->player_name }}'" class="mb-[-20px] mr-[-20px] !text-slate-400">                      
                                </x-edit-button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>