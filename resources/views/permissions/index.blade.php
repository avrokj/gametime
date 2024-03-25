<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Permissions') }}
                </h2> 
            </div>
            <div>       
                <x-primary-button onclick="document.getElementById('permissions.create').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add permission') }}
                </x-primary-button>
    
                <dialog id="add_permission" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box !w-auto">
                        <h3 class="font-bold text-lg">{{ __('Add permission') }}</h3>
                        <div class="modal-action justify-start">
                            @if ($errors->any())
                                <div class="text-red-500 text-sm mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('permissions.store') }}" method="POST" class="w-full">
                                @csrf
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input name="name" id="name" value="{{ old('name') }}" />
                                </div>

                                @if ($roles->count())
                                <div class="mt-4">
                                    <x-input-label :value="__('Roles')" />
                                    @foreach ($roles as $id => $name)
                                        <input type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('roles', []))) />
                                        <label class="text-sm font-medium text-gray-700" for="role-{{ $id }}">{{ $name }}</label>
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
                <div class="p-6 flex-grow overflow-auto rounded-md">
                    <table class="table min-w-full rounded-md">            
                        <thead class="text-base uppercase bg-base-100">
                        <tr class="text-left py-4">
                            <th class="border-b-2 border-base-300">{{ __('Name') }}</th>
                            <th class="text-right border-b-2 border-base-300">{{ __('Roles') }}
                            </th>
                            <th class="border-b-2 border-base-300" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($permissions as $permission)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $permission->name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $permission->roles->implode('name', ', ') }}
                                </td>
                                <td class="border-b-2 border-base-300 text-right">
                                    <x-edit-button onclick="document.getElementById('edit_permission{{ $permission->id }}').showModal()">                      
                                    </x-edit-button>

                                    <dialog id="edit_permission{{ $permission->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box !w-auto">
                                        <h3 class="font-bold text-lg">{{ __('Edit role') }}</h3>
                                        <div class="modal-action justify-start">                          
                                            @if ($errors->any())
                                                <div class="text-red-500 text-sm mb-4">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                    
                                            <form action="{{ route('permissions.update', $permission) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input name="name" id="name" value="{{ $permission->name ?? old('name') }}" />
                                                </div>
                    
                                                @if ($roles->count())
                                                <div class="mt-4">
                                                    <x-input-label :value="__('Roles')" />
                    
                                                    @foreach ($roles as $id => $name)
                                                        <input type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('role', [])) || $permission->roles->contains($id)) />
                                                        <label class="text-sm font-medium text-gray-700" for="role-{{ $id }}">{{ $name }}</label>
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

                                    <form method="POST" action="{{ route('permissions.destroy', $permission) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                        </x-delete-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td colspan="3"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6">
                                    No permissions found.
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