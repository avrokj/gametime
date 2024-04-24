<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Manage Roles') }}
                </h2> 
            </div>
            <div>       
                <x-primary-button onclick="document.getElementById('add_role').showModal()">
                    <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add role') }}
                </x-primary-button>

                <dialog id="add_role" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box !w-auto">
                        <h3 class="font-bold text-lg">{{ __('Add New Role') }}</h3>
                        <div class="modal-action flex flex-col justify-start">

                            <form action="{{ route('roles.store') }}" method="POST" class="w-full">
                                @csrf
                                <!-- Name -->
                                <div>
                                    <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                        <x-heroicon-s-user class="w-4 h-4 opacity-70" />
                                        <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                    </label>
                                    @if ($errors->has('name'))
                                        <x-input-error messages="$errors->get('name')" class="mt-2" />
                                    @endif
                                </div>

                                @can('edit-role')
                                <div class="mt-4">
                                    <x-input-label :value="__('Permissions')" />
                                    <div class="max-h-80 border input-bordered p-2 rounded-lg overflow-y-scroll">
                                    @foreach ($permissions as $id => $name)
                                        <input type="checkbox" name="permissions[]" id="permission-{{ $name['id'] }}" value="{{ $name['id'] }}" @checked(in_array($name['id'], old('permissions', [])))>
                                        <label class="text-sm font-medium" for="permission-{{ $name['id'] }}">{{ $name['name'] }}</label>
                                        <br />
                                    @endforeach
                                    </div>
                                </div>
                                @endcan

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
                                {{ __('#') }}</th>
                            <th class="border-b-2 border-base-300">
                                {{ __('Name') }}
                            </th>
                            <th class="border-b-2 border-base-300 text-right" scope="col">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $role)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">                              
                                <td class="border-b-2 border-base-300">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $role->name }}
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
                                                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <x-input-label for="name" :value="__('Role')" />
                                                        <x-text-input name="name" id="name" value="{{ $role->name }}" />
                                                    </div>

                                                    {{-- @if ($role->name!='Super Admin')
                                                        @can('edit-role')
                                                        <div class="mb-3 row">
                                                            <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                                            <div class="col-md-6">           
                                                                <select name="permissions[]" id="permissions" multiple>
                                                                    @foreach ($permissions as $permission)
                                                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) || $role->permissions->contains($permission->id) ? 'selected' : '' }}>
                                                                            {{ $permission->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('permissions'))
                                                                    <span class="text-red-500 text-sm mb-4">{{ $errors->first('permissions') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endcan
                                                    @endif --}}

                                                    @if ($role->name!='Super Admin')
                                                        @can('edit-role')
                                                        <div class="mt-4">
                                                            <div class="max-h-80 border input-bordered p-2 rounded-lg overflow-y-scroll">
                                                            <x-input-label :value="__('Permissions')" />
                            
                                                            @foreach ($permissions as $id => $name)
                                                                <input type="checkbox" name="permissions[]" id="permission-{{ $name['id'] }}" value="{{ $name['id'] }}" @checked(in_array($name['id'], old('permissions', [])) || $role->permissions->contains($name['id']))>
                                                                <label class="text-sm font-medium" for="permission-{{ $name['id'] }}">{{ $name['name'] }}</label>
                                                                <br />
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                        @endcan
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
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            @if ($role->name!='Super Admin')
                                                @can('delete-role')
                                                    @if ($role->name!=Auth::user()->hasRole($role->name))
                                                        <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                                                        </x-delete-button>
                                                    @endif
                                                @endcan
                                            @endif
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td colspan="3"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6">
                                    No roles found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pt-4 col-span-2">
                        {{ $roles->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>