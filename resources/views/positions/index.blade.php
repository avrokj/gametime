<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Positions') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('positions.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search positions here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_position').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add position') }}
                </x-primary-button>

                <dialog id="add_position" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="font-bold text-lg text-left">{{ __('Add Position') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('positions.store') }}">
                        @csrf
                        @method('post')
                        <!-- Position Name -->
                        <div>
                            <label class="input input-bordered flex items-center gap-2" for="position_name" :value="{{__('Position Name')}}" >
                                <x-heroicon-c-cube-transparent class="w-4 h-4 opacity-70" />
                                <x-text-input id="position_name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Position Name')}}" type="text" name="position_name" :value="old('position_name')" required autofocus autocomplete="position_name" />
                            </label>
                            <x-input-error :messages="$errors->get('position_name')" class="mt-2" />
                        </div>
                
                        <!-- Sports name -->
                        <div class="mt-4">
                            <x-select name="sport_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Sports') }}</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}">{{ $sport->sports_name }}</option>
                                @endforeach                                
                            </x-select>
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
                    <th class="border-b-2 border-base-300">{{ __('Position') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Sport') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $position)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $position->position_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $position->sport->sports_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_position{{ $position->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_position{{ $position->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg">{{ __('Edit Position') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('positions.update', $position) }}">
                                            @csrf
                                            @method('patch')
                                            <!-- Position name -->
                                            <div>
                                                <label class="input input-bordered flex items-center gap-2" for="position_name" :value="old('position_name', $position->position_name)" >
                                                    <x-heroicon-c-cube-transparent class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="position_name" type="text" class="grow border-none focus:outline-none" type="text" name="position_name" :value="old('position_name', $position->position_name)" required autofocus autocomplete="position_name" />
                                                </label>
                                                <x-input-error :messages="$errors->get('position_name')" class="mt-2" />
                                            </div>                                                 
        
                                            <!-- Sport name -->
                                            <div class="mt-4">
                                                <x-select name="sport_id" class="!max-w-full">
                                                    <option disabled value="">{{ __('Select Sport') }}</option>
                                                    @foreach ($sports as $sport)
                                                        <option value="{{ $sport->id }}" {{ (old('sport_id', $position->sport_id) == $sport->id) ? 'selected' : '' }}>
                                                            {{ $sport->sports_name }}
                                                        </option>
                                                    @endforeach                               
                                                </x-select>
                                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
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
                                    
                                <form method="POST" action="{{ route('positions.destroy', $position) }}">
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
                        @foreach ($positions as $position)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $position->position_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $position->sport->sports_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $position->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $position->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h3 class="font-bold text-lg">{{ __('Edit Position') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('positions.update', $position) }}">
                                                @csrf
                                                @method('patch')
                                                <!-- Position name -->
                                                <div>
                                                    <label class="input input-bordered flex items-center gap-2" for="position_name" :value="old('position_name', $position->position_name)" >
                                                        <x-heroicon-c-cube-transparent class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="position_name" type="text" class="grow border-none focus:outline-none" type="text" name="position_name" :value="old('position_name', $position->position_name)" required autofocus autocomplete="position_name" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('position_name')" class="mt-2" />
                                                </div>                                                 
            
                                                <!-- Sport name -->
                                                <div class="mt-4">
                                                    <x-select name="sport_id" class="!max-w-full">
                                                        <option disabled value="">{{ __('Select Sport') }}</option>
                                                        @foreach ($sports as $sport)
                                                            <option value="{{ $sport->id }}" {{ (old('sport_id', $position->sport_id) == $sport->id) ? 'selected' : '' }}>
                                                                {{ $sport->sports_name }}
                                                            </option>
                                                        @endforeach                               
                                                    </x-select>
                                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
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
                                            
                                        <form method="POST" action="{{ route('positions.destroy', $position) }}">
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
                {{ $positions->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>