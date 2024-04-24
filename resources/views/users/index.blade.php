<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Manage Users') }}
                </h2> 
            </div>
            <div>       
                @can('create-user')
                    <x-primary-button onclick="document.getElementById('add_user').showModal()">
                        <x-heroicon-c-plus-circle class="w-6"/> {{ __('Add New User') }}
                    </x-primary-button>
                    <!-- Open the modal using ID.showModal() method -->
                        <dialog id="add_user" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                            <div class="modal-action flex flex-col justify-start text-left">                          
                                <form action="{{ route('users.store') }}" method="post">
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
                                    
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                            <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
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
                                            
                                    <!-- Roles -->
                                    <div class="mt-4">
                                        <x-input-label :value="__('Roles')" />
                                        <div class="max-h-80 border input-bordered p-2 rounded-lg overflow-y-scroll">                        
                                            @foreach ($roles as $role)
                                                @if ($role->name != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                                                    <input type="radio" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->name }}" {{ $userRoles->contains('name', $role->name) ? 'checked' : '' }}>
                                                    <label class="text-sm font-medium" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                                    <br />
                                                @endif
                                            @endforeach                                                        
                                        </div>
                                        @if ($errors->has('roles'))
                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                        @endif
                                    </div>                                                                 
                                    <div class="mt-4 space-x-2">
                                        <x-save-button> {{ __('Create User') }}</x-save-button>
                                        <x-cancel-button onclick="window.location='{{ route('users.index') }}'">
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
                            <th class="border-b-2 border-base-300">
                                {{ __('Email') }}
                            </th>
                            <th class="border-b-2 border-base-300">
                                {{ __('Roles') }}
                            </th>                            
                            <th class="border-b-2 border-base-300">
                                {{ __('Approved') }}
                            </th>
                            <th class="border-b-2 border-base-300 text-right" scope="col">
                                {{ __('Action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($users as $user)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                <td class="border-b-2 border-base-300">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $user->name }}
                                </td>
                                <td class="border-b-2 border-base-300">
                                    {{ $user->email }}
                                </td>
                                <td class="border-b-2 border-base-300">                                    
                                    @forelse ($user->getRoleNames() as $role)
                                        <span class="badge bg-primary">{{ $role }}</span>
                                    @empty
                                    @endforelse
                                </td>                                
                                <td class="border-b-2 border-base-300">
                                    {{ $user->approved_at }}
                                </td>
                                <td class="border-b-2 border-base-300 text-right">                                    
                                    <div class="flex justify-end">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                                @if (Auth::user()->hasRole('Super Admin'))
                                                    <!-- Open the modal using ID.showModal() method -->
                                                    <x-edit-button onclick="document.getElementById('edit_user{{ $user->id }}').showModal()">                      
                                                    </x-edit-button>

                                                    <dialog id="edit_user{{ $user->id }}" class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                        <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                                                        <div class="modal-action flex flex-col justify-start text-left">                          
                                                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")
                                                                <!-- Name -->
                                                                <div>
                                                                    <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                                                        <x-heroicon-s-user class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                                                                    </label>
                                                                    @if ($errors->has('name'))
                                                                        <x-input-error messages="$errors->get('name')" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                                        <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="email" type="email" name="email" value="{{ $user->email }}" required autofocus autocomplete="username" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
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
                                                                        
                                                                <!-- Roles -->
                                                                <div class="mb-4">
                                                                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">{{__('Roles')}}</label>
                                                                    <div class="col-md-6">           
                                                                        <div class="mt-4">
                                                                            <x-input-label :value="__('Roles')" />
                                                                            <div class="max-h-80 border input-bordered p-2 rounded-lg overflow-y-scroll">                        
                                                                                @foreach ($roles as $role)
                                                                                    @if ($role->name != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                                                                                        <input type="radio" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->name }}" {{ $userRoles->contains('name', $role->name) ? 'checked' : '' }}>
                                                                                        <label class="text-sm font-medium" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                                                                        <br />
                                                                                    @endif
                                                                                @endforeach                                                        
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('roles'))
                                                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div> 
                                                                
                                                                <div class="mt-4">
                                                                    <x-input-label :value="__('Approved')" />
                                                                    <input type="checkbox" name="approved_at_checkbox" id="approved_at_checkbox" {{ $user->approved_at ? 'checked' : '' }} onchange="updateApproval()">
                                                                </div>
                                                                
                                                                <script>
                                                                    function updateApproval() {
                                                                        var userId = "{{ $user->id }}"; // Assuming $user is available in the view
                                                                        var isChecked = document.getElementById('approved_at_checkbox').checked;
                                                                
                                                                        // Send AJAX request to update approved_at timestamp
                                                                        $.ajax({
                                                                            url: '/update-approval/' + userId,
                                                                            type: 'POST',
                                                                            data: {
                                                                                approved: isChecked,
                                                                                _token: "{{ csrf_token() }}"
                                                                            },
                                                                            success: function(response) {
                                                                                console.log('Approval status updated successfully');
                                                                            },
                                                                            error: function(xhr) {
                                                                                console.error('Error updating approval status:', xhr.responseText);
                                                                            }
                                                                        });
                                                                    }
                                                                </script>                                                                 
                                                                <div class="mt-4 space-x-2">
                                                                    <x-save-button> {{ __('Update User') }}</x-save-button>
                                                                    <x-cancel-button onclick="window.location='{{ route('users.index') }}'">
                                                                        {{ __('Cancel') }}
                                                                    </x-cancel-button>
                                                                </div>                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </dialog>
                                                @endif
                                            @else
                                                @can('edit-user')
                                                <!-- Open the modal using ID.showModal() method -->
                                                <x-edit-button onclick="document.getElementById('edit_user{{ $user->id }}').showModal()">                      
                                                </x-edit-button>
                                                    <dialog id="edit_user{{ $user->id }}" class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                        <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
                                                        <div class="modal-action flex flex-col justify-start text-left">                          
                                                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")
                                                                <!-- Name -->
                                                                <div>
                                                                    <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                                                        <x-heroicon-s-user class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                                                                    </label>
                                                                    @if ($errors->has('name'))
                                                                        <x-input-error messages="$errors->get('name')" class="mt-2" />
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                                        <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                                        <x-text-input id="email" type="email" name="email" value="{{ $user->email }}" required autofocus autocomplete="username" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
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
                                                                        
                                                                <!-- Roles -->
                                                                <div class="mb-4">
                                                                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">{{__('Roles')}}</label>
                                                                    <div class="col-md-6">                                                                        
                                                                        <x-input-label :value="__('Roles')" />
                                                                        <div class="max-h-80 border input-bordered p-2 rounded-lg overflow-y-scroll">                        
                                                                            @foreach ($roles as $role)
                                                                                @if ($role->name != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                                                                                    <input type="radio" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->name }}" {{ $userRoles->contains('name', $role->name) ? 'checked' : '' }}>
                                                                                    <label class="text-sm font-medium" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                                                                    <br />
                                                                                @endif
                                                                            @endforeach                                                        
                                                                        </div>
                                                                        @if ($errors->has('roles'))
                                                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>                                                                    
                                                                <div class="mt-4 space-x-2">
                                                                    <x-save-button> {{ __('Update User') }}</x-save-button>
                                                                    <x-cancel-button onclick="window.location='{{ route('users.index') }}'">
                                                                        {{ __('Cancel') }}
                                                                    </x-cancel-button>
                                                                </div>                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </dialog> 
                                                @endcan

                                                @can('delete-user')
                                                    @if (Auth::user()->id!=$user->id)
                                                        <x-delete-button onclick="return confirm('Do you want to delete this user?'); event.preventDefault(); this.closest('form').submit();">
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
                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>