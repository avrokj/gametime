<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Roles') }}
                </h2> 
            </div>
            <div>       
                <x-primary-button onclick="document.getElementById('add_role').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add role') }}
                </x-primary-button>

                <dialog id="add_role" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box !w-auto">
                        <h3 class="font-bold text-lg">{{ __('Add Role') }}</h3>
                        <div class="modal-action flex flex-col justify-start">
                            @if ($errors->any())
                                <div class="text-red-500 text-sm mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('roles.store') }}" method="POST" class="w-full">
                                @csrf
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input name="name" id="name" value="{{ old('name') }}" />
                                </div>

                                @if ($permissions->count())
                                <div class="mt-4">
                                    <x-input-label :value="__('Permissions')" />
                                    @foreach ($permissions as $id => $name)
                                        <input type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('permissions', [])))>
                                        <label class="text-sm font-medium text-gray-700" for="permission-{{ $id }}">{{ $name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                                @endif

                                <div class="mt-4 space-x-2">
                                    <x-save-button> {{ __('Save') }}</x-save-button>
                                    <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
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
                            <th class="border-b-2 border-base-300">
                                {{ __('Role') }}</th>
                            <th class="border-b-2 border-base-300">
                                {{ __('Permissions') }}
                            </th>
                            <th class="border-b-2 border-base-300 text-right" scope="col">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $role)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $role->name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $role->permissions_count }}
                                </td>
                                <td class="border-b-2 border-base-300 text-right">                                    
                                    <div class="flex justify-end">
                                        <!-- Open the modal using ID.showModal() method -->
                                        <x-edit-button onclick="document.getElementById('edit_role{{ $role->id }}').showModal()">                      
                                        </x-edit-button>

                                        <dialog id="edit_role{{ $role->id }}" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                            <h3 class="font-bold text-lg">{{ __('Edit role') }}</h3>
                                            <div class="modal-action flex flex-col justify-start text-left">                          
                                                @if ($errors->any())
                                                    <div class="text-red-500 text-sm mb-4">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                        
                                                <form action="{{ route('roles.update', $role) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <x-input-label for="name" :value="__('Role')" />
                                                        <x-text-input name="name" id="name" value="{{ $role->name ?? old('name') }}" />
                                                    </div>
                        
                                                    @if ($permissions->count())
                                                    <div class="mt-4">
                                                        <x-input-label :value="__('Permissions')" />
                        
                                                        @foreach ($permissions as $id => $name)
                                                            <input type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('permissions', [])) || $role->permissions->contains($id))>
                                                            <label class="text-sm font-medium" for="permission-{{ $id }}">{{ $name }}</label>
                                                            <br />
                                                        @endforeach
                                                    </div>
                                                    @endif

                                                    <div class="mt-4 space-x-2">
                                                        <x-save-button> {{ __('Save') }}</x-save-button>
                                                        <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
                                                            {{ __('Cancel') }}
                                                        </x-cancel-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </dialog>

                                        <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                            </x-delete-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td colspan="3"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6">
                                    No roles found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>