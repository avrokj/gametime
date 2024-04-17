<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Manage Roles') }}
                </h2> 
            </div>
            <div>       
                @can('create-role')
                    <x-primary-button onclick="document.getElementById('add_role').showModal()">
                        <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add New Role') }}
                    </x-primary-button>
                    <!-- Open the modal using ID.showModal() method -->
                        <dialog id="add_role" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                            <div class="modal-action flex flex-col justify-start text-left">                          
                                <form action="{{ route('roles.store') }}" method="post">
                                    @csrf
                                    <!-- Name -->
                                    <div>
                                        <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                            <x-heroicon-s-role class="w-4 h-4 opacity-70" />
                                            <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                        </label>
                                        @if ($errors->has('name'))
                                            <x-input-error messages="$errors->get('name')" class="mt-2" />
                                        @endif
                                    </div>
                                    
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                            <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="rolename" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                        </label>
                                        @if ($errors->has('email'))
                                            <x-input-error messages="{{ $errors->first('email') }}" class="mt-2" />
                                        @endif
                                    </div>
                                            
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <label class="input input-bordered flex items-center gap-2" for="password" value="__('Password')" >
                                            <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                            <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                                                        type="password"
                                                        name="password"
                                                        autocomplete="current-password" />
                                        </label> 
                                        @if ($errors->has('password'))                           
                                            <x-input-error messages="{{ $errors->first('password') }}" class="mt-2" />
                                        @endif
                                    </div>
                                            
                                    <!-- Confirm Password -->
                                    <div class="mt-4">                                        
                                        <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Confirm Password')" >
                                            <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                            <x-text-input id="password_confirmation" class="grow border-none focus:outline-none" placeholder="{{__('Confirm Password')}}" 
                                                        type="password"
                                                        name="password_confirmation" autocomplete="new-password" />
                                        </label>                            
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start">{{__('Roles')}}</label>
                                        <div class="col-md-6">           
                                            <select class="select select-bordered w-full" multiple aria-label="Roles" id="roles" name="roles[]">
                                                @forelse ($roles as $role)

                                                    @if ($role->name != 'Super Admin')
                                                    <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                    @else
                                                        @if (Auth::role()->hasRole('Super Admin'))   
                                                        <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                        @endif
                                                    @endif

                                                @empty

                                                @endforelse
                                            </select>
                                            @if ($errors->has('roles'))
                                                <span class="text-danger">{{ $errors->first('roles') }}</span>
                                            @endif
                                        </div>
                                    </div>                                                                    
                                    <div class="mt-4 space-x-2">
                                        <x-save-button> {{ __('Create User') }}</x-save-button>
                                        <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
                                            {{ __('Cancel') }}
                                        </x-cancel-button>
                                    </div>                
                                </form>
                            </div>
                        </div>
                        </dialog>
                @endcan
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
                                {{ __('#') }}
                            </th>
                            <th class="border-b-2 border-base-300">
                                {{ __('Name') }}
                            </th>
                            <th class="border-b-2 border-base-300 text-right" scope="col">
                                {{ __('Action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($roles as $role)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $role->name }}
                                </td>
                                <td class="border-b-2 border-base-300 text-right">                                    
                                    <div class="flex justify-end">
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @if (in_array('Super Admin', $role->getRoleNames()->toArray() ?? []) )
                                                @if (Auth::role()->hasRole('Super Admin'))
                                                    <!-- Open the modal using ID.showModal() method -->
                                                    <x-edit-button onclick="document.getElementById('edit_role{{ $role->id }}').showModal()">                      
                                                    </x-edit-button>

                                                    <dialog id="edit_role{{ $role->id }}" class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                        <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                                                        <div class="modal-action flex flex-col justify-start text-left">                          
                                                            <form action="{{ route('roles.update', $role->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")
                                                                <!-- Name -->
                                                                <div>
                                                                    <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                                                        <x-heroicon-s-role class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ $role->name }}" required autofocus autocomplete="name" />
                                                                    </label>
                                                                    @if ($errors->has('name'))
                                                                        <x-input-error messages="$errors->get('name')" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                                        <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="email" type="email" name="email" value="{{ $role->email }}" required autofocus autocomplete="rolename" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                                                    </label>
                                                                    @if ($errors->has('email'))
                                                                        <x-input-error messages="{{ $errors->first('email') }}" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                        
                                                                <!-- Password -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="password" value="__('Password')" >
                                                                        <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                                                                                    type="password"
                                                                                    name="password"
                                                                                    autocomplete="current-password" />
                                                                    </label> 
                                                                    @if ($errors->has('password'))                           
                                                                        <x-input-error messages="{{ $errors->first('password') }}" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                        
                                                                <!-- Confirm Password -->
                                                                <div class="mt-4">                                        
                                                                    <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Confirm Password')" >
                                                                        <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="password_confirmation" class="grow border-none focus:outline-none" placeholder="{{__('Confirm Password')}}" 
                                                                                    type="password"
                                                                                    name="password_confirmation" autocomplete="new-password" />
                                                                    </label>                            
                                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">{{__('Roles')}}</label>
                                                                    <div class="col-md-6">           
                                                                        <select class="select select-bordered w-full" multiple aria-label="Roles" id="roles" name="roles[]">
                                                                            @forelse ($roles as $role)

                                                                                @if ($role->name != 'Super Admin')
                                                                                <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                                                    {{ $role->name }}
                                                                                </option>
                                                                                @else
                                                                                    @if (Auth::role()->hasRole('Super Admin'))   
                                                                                    <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                                                        {{ $role->name }}
                                                                                    </option>
                                                                                    @endif
                                                                                @endif

                                                                            @empty

                                                                            @endforelse
                                                                        </select>
                                                                        @if ($errors->has('roles'))
                                                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>                                                                    
                                                                <div class="mt-4 space-x-2">
                                                                    <x-save-button> {{ __('Update User') }}</x-save-button>
                                                                    <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
                                                                        {{ __('Cancel') }}
                                                                    </x-cancel-button>
                                                                </div>                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </dialog>
                                                @endif
                                            @else
                                                @can('edit-role')
                                                <!-- Open the modal using ID.showModal() method -->
                                                <x-edit-button onclick="document.getElementById('edit_role{{ $role->id }}').showModal()">                      
                                                </x-edit-button>
                                                    <dialog id="edit_role{{ $role->id }}" class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                        <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                                                        <div class="modal-action flex flex-col justify-start text-left">                          
                                                            <form action="{{ route('roles.update', $role->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")
                                                                <!-- Name -->
                                                                <div>
                                                                    <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                                                        <x-heroicon-s-role class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ $role->name }}" required autofocus autocomplete="name" />
                                                                    </label>
                                                                    @if ($errors->has('name'))
                                                                        <x-input-error messages="$errors->get('name')" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                                        <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="email" type="email" name="email" value="{{ $role->email }}" required autofocus autocomplete="rolename" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                                                    </label>
                                                                    @if ($errors->has('email'))
                                                                        <x-input-error messages="{{ $errors->first('email') }}" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                        
                                                                <!-- Password -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="password" value="__('Password')" >
                                                                        <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                                                                                    type="password"
                                                                                    name="password"
                                                                                    autocomplete="current-password" />
                                                                    </label> 
                                                                    @if ($errors->has('password'))                           
                                                                        <x-input-error messages="{{ $errors->first('password') }}" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                        
                                                                <!-- Confirm Password -->
                                                                <div class="mt-4">                                        
                                                                    <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Confirm Password')" >
                                                                        <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="password_confirmation" class="grow border-none focus:outline-none" placeholder="{{__('Confirm Password')}}" 
                                                                                    type="password"
                                                                                    name="password_confirmation" autocomplete="new-password" />
                                                                    </label>                            
                                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">{{__('Roles')}}</label>
                                                                    <div class="col-md-6">           
                                                                        <select class="select select-bordered w-full" multiple aria-label="Roles" id="roles" name="roles[]">
                                                                            @forelse ($roles as $role)

                                                                                @if ($role->name != 'Super Admin')
                                                                                <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                                                    {{ $role->name }}
                                                                                </option>
                                                                                @else
                                                                                    @if (Auth::role()->hasRole('Super Admin'))   
                                                                                    <option value="{{ $role->name }}" {{ $roleRoles->contains('name', $role->name) ? 'selected' : '' }}>
                                                                                        {{ $role->name }}
                                                                                    </option>
                                                                                    @endif
                                                                                @endif

                                                                            @empty

                                                                            @endforelse
                                                                        </select>
                                                                        @if ($errors->has('roles'))
                                                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>                                                                    
                                                                <div class="mt-4 space-x-2">
                                                                    <x-save-button> {{ __('Update User') }}</x-save-button>
                                                                    <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
                                                                        {{ __('Cancel') }}
                                                                    </x-cancel-button>
                                                                </div>                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </dialog> 
                                                @endcan

                                                @can('delete-role')
                                                    @if (Auth::role()->id!=$role->id)
                                                        <x-delete-button onclick="return confirm('Do you want to delete this role?'); event.preventDefault(); this.closest('form').submit();">
                                                        </x-delete-button>
                                                    @endif
                                                @endcan
                                            @endif

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
                {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>