<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Coaches') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('coaches.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search coaches here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_coach').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add coach') }}
                </x-primary-button>

                <dialog id="add_coach" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                    <h3 class="font-bold text-lg text-left">{{ __('Add Coach') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('coaches.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Coach Name -->
                        <div>
                            <label class="input input-bordered flex items-center gap-2" for="coach_name" :value="{{__('Coach Name')}}" >
                                <x-iconpark-whistling-o class="w-4 h-4 opacity-70" />
                                <x-text-input id="coach_name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Coach Name')}}" type="text" name="coach_name" :value="old('coach_name')" required autofocus autocomplete="coach_name" />
                            </label>
                            <x-input-error :messages="$errors->get('coach_name')" class="mt-2" />
                        </div>
                
                        <!-- Country name -->
                        <div class="mt-4">
                            <x-select name="country_id" class="!max-w-full">
                                <option disabled selected value="">{{ __('Select Country') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ country_flag($country->code) }} {{ $country->country_name }}</option>
                                @endforeach                                
                            </x-select>
                        </div>
                        <!-- Image -->
                        <div class="mt-4">
                            <label class="input input-bordered flex items-center gap-2" for="image" :value="{{__('Coach Image')}}" >
                                <x-feathericon-image class="w-4 h-4 opacity-70" />
                                <input type="file" name="image" id="image">
                            </label>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <div class="mt-4 space-x-2">
                            <x-save-button> {{ __('Save') }}</x-save-button>
                            <x-cancel-button onclick="window.location='{{ route('coaches.index') }}'">
                                {{ __('Cancel') }}
                            </x-cancel-button>
                        </div>
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
                    <th class="border-b-2 border-base-300">{{ __('Coach Name') }}</th>
                    <th class="border-b-2 border-base-300">{{ __('Country') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @if(count($results) > 0)
                        @foreach($results as $coach)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    <img src="{{ asset('images/' . $coach->image) }}" alt="Coach Image"> 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $coach->coach_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ country_flag($coach->country->code) }} {{ $coach->country->country_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_coach{{ $coach->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_coach{{ $coach->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                        <h3 class="font-bold text-lg">{{ __('Edit Coach') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('coaches.update', $coach) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <!-- Coach Name -->
                                            <div>
                                                <label class="input input-bordered flex items-center gap-2" for="coach_name" :value="old('coach_name', $coach->coach_name)" >
                                                    <x-iconpark-whistling-o class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="coach_name" type="text" class="grow border-none focus:outline-none" type="text" name="coach_name" :value="old('coach_name', $coach->coach_name)" required autofocus autocomplete="coach_name" />
                                                </label>
                                                <x-input-error :messages="$errors->get('coach_name')" class="mt-2" />
                                            </div>
                                    
                                            <!-- Country name -->
                                            <div class="mt-4">
                                                <x-select name="country_id" class="!max-w-full">
                                                    <option disabled selected value="">{{ __('Select Country') }}</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" {{ (old('country_id', $coach->country_id) == $country->id) ? 'selected' : '' }}>
                                                            {{ country_flag($country->code) }} {{ $country->country_name }}
                                                        </option>
                                                    @endforeach                                
                                                </x-select>
                                            </div>
                                            <!-- Image -->
                                            <div class="mt-4">
                                                <label class="input input-bordered flex items-center gap-2" for="new_image" :value="{{__('Coach Image')}}" >
                                                    <div class="rounded-full">
                                                        <img src="{{ asset('images/coaches/' . $coach->image) }}" alt="Current coach image" class="w-10 rounded-full">
                                                    </div>
                                                    <input type="file" name="new_image" id="new_image">
                                                </label>
                                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                            </div>

                                            <div class="mt-4 space-x-2">
                                                <x-save-button> {{ __('Save') }}</x-save-button>
                                                <x-cancel-button onclick="window.location='{{ route('coaches.index') }}'">
                                                    {{ __('Cancel') }}
                                                </x-cancel-button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </dialog>
                                    
                                <form method="POST" action="{{ route('coaches.destroy', $coach) }}">
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
                        @foreach ($coaches as $coach)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">                                    
                                    <div class="btn btn-ghost btn-circle avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ asset('images/coaches/' . $coach->image) }}" alt="Coach Image">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $coach->coach_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ country_flag($coach->country->code) }} {{ $coach->country->country_name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    <div class="flex justify-end">                    
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('my_modal_edit{{ $coach->id }}').showModal()">                      
                                        </x-edit-button>
                                        <dialog id="my_modal_edit{{ $coach->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <h3 class="font-bold text-lg">{{ __('Edit Coach') }}</h3>
                                            <div class="modal-action justify-start">                          
                                            <form method="POST" action="{{ route('coaches.update', $coach) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <!-- Coach name -->
                                                <div>
                                                    <label class="input input-bordered flex items-center gap-2" for="coach_name" :value="old('coach_name', $coach->coach_name)" >
                                                        <x-iconpark-whistling-o class="w-4 h-4 opacity-70" />
                                                        <x-text-input id="coach_name" type="text" class="grow border-none focus:outline-none" type="text" name="coach_name" :value="old('coach_name', $coach->coach_name)" required autofocus autocomplete="coach_name" />
                                                    </label>
                                                    <x-input-error :messages="$errors->get('coach_name')" class="mt-2" />
                                                </div>
                                        
                                                <!-- Country name -->
                                                <div class="mt-4">
                                                    <x-select name="country_id" class="!max-w-full">
                                                        <option disabled selected value="">{{ __('Select Country') }}</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}" {{ (old('country_id', $coach->country_id) == $country->id) ? 'selected' : '' }}>
                                                                {{ country_flag($country->code) }} {{ $country->country_name }}
                                                            </option>
                                                        @endforeach                                
                                                    </x-select>
                                                </div>
                                                <!-- Image -->
                                                <div class="mt-4">
                                                    <label class="input input-bordered flex items-center gap-2" for="new_image" :value="{{__('Coach Image')}}" >
                                                        <div class="rounded-full">
                                                            <img src="{{ asset('images/coaches/' . $coach->image) }}" alt="Current coach image" class="w-10 rounded-full">
                                                        </div>
                                                        <input type="file" name="new_image" id="new_image">
                                                    </label>
                                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                                </div>
                                                <div class="mt-4 space-x-2">
                                                    <x-save-button> {{ __('Save') }}</x-save-button>
                                                    <x-cancel-button onclick="window.location='{{ route('coaches.index') }}'">
                                                        {{ __('Cancel') }}
                                                    </x-cancel-button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </dialog>
                                            
                                        <form method="POST" action="{{ route('coaches.destroy', $coach) }}">
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
                {{ $coaches->links('pagination::tailwind') }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>