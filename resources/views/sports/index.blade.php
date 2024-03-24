<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap">
            <div class="w-1/2 sm:w-auto order-1 sm:order-1">
                <h2 class="font-semibold text-xl leading-tight">
                {{ __('Sports') }}
                </h2> 
            </div>
            <div class="w-full sm:w-auto order-3 mt-2 sm:mt-0 sm:order-2">   
                <form action="{{ route('sports.search') }}" method="GET">
                    <div style="position: relative;">
                        <x-text-input type="text" name="search" placeholder="Search sports here..." value="{{ request('search') }}" required class="!max-w-full !w-full"/>
                        <button type="submit" class="absolute right-2 top-0 h-full">
                            <x-feathericon-search />
                        </button>
                    </div>
                </form>                
            </div>
            <div class="w-1/2 sm:w-auto order-2 sm:order-3 text-right">       
                <x-primary-button onclick="document.getElementById('add_sport').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add sport') }}
                </x-primary-button>

                <dialog id="add_sport" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box !w-auto">
                    <h3 class="font-bold text-lg text-left">{{ __('Add Sport') }}</h3>
                    <div class="modal-action justify-start">
                    <form method="POST" action="{{ route('sports.store') }}">
                        @csrf
                        @method('post')
                        <x-text-input name="sports_name" />
                        <x-input-error :messages="$errors->get('sports_name')" class="mt-2" />
                        <div class="mt-4 space-x-2">
                            <x-save-button> {{ __('Save') }}</x-save-button>
                            <x-cancel-button onclick="window.location='{{ route('sports.index') }}'">
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
            <div class="p-6 flex-grow overflow-auto rounded-md">
            <table class="table min-w-full rounded-md">            
                <thead class="text-base uppercase bg-base-100">
                <tr class="text-left py-4">
                    <th class="border-b-2 border-base-300">{{ __('Sport') }}</th>
                    <th class="text-right border-b-2 border-base-300">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="sm:rounded-lg">
                    @if(isset($results))
                        @foreach($results as $result)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $sport->sports_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                            
                                    <x-edit-button onclick="document.getElementById('edit_sport{{ $sport->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="edit_sport{{ $sport->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto">
                                        <h3 class="font-bold text-lg">{{ __('Edit Sport') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('sports.update', $sport) }}">
                                            @csrf
                                            @method('patch')
                                            <x-text-input name="sports_name" value="{{ old('sports_name', $sport->sports_name) }}" />
                                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                            <div class="mt-4 space-x-2">
                                            <x-save-button> {{ __('Save') }}</x-save-button>
                                            <x-cancel-button onclick="window.location='{{ route('sports.index') }}'">
                                                {{ __('Cancel') }}
                                            </x-cancel-button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </dialog>
                                    
                                <form method="POST" action="{{ route('sports.destroy', $sport) }}">
                                    @csrf
                                    @method('delete')
                                    <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                    <x-heroicon-s-trash class="w-6 text-white" />
                                    </x-delete-button>
                                </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    @else 
                        @foreach ($sports as $sport)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $sport->sports_name }} 
                                </td>
                                <td class="border-b-2 border-base-300">
                                <div class="flex justify-end">                    
                                    <!-- Open the modal using ID.showModal() method -->
                                    <x-edit-button onclick="document.getElementById('my_modal_edit{{ $sport->id }}').showModal()">                      
                                    </x-edit-button>
                                    <dialog id="my_modal_edit{{ $sport->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto">
                                        <h3 class="font-bold text-lg">{{ __('Edit Sport') }}</h3>
                                        <div class="modal-action justify-start">                          
                                        <form method="POST" action="{{ route('sports.update', $sport) }}">
                                            @csrf
                                            @method('patch')
                                            <x-text-input name="sports_name" value="{{ old('sports_name', $sport->sports_name) }}" />
                                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                            <div class="mt-4 space-x-2">
                                            <x-save-button> {{ __('Save') }}</x-save-button>
                                            <x-cancel-button onclick="window.location='{{ route('sports.index') }}'">
                                                {{ __('Cancel') }}
                                            </x-cancel-button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </dialog>
                                    
                                <form method="POST" action="{{ route('sports.destroy', $sport) }}">
                                    @csrf
                                    @method('delete')
                                    <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                    <x-heroicon-s-trash class="w-6 text-white" />
                                    </x-delete-button>
                                </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif           
                </tbody>
            </table>
            <div class="pt-4">
            {{ $sports->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>