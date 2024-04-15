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
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New User</a>
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
                            <th class="border-b-2 border-base-300 text-right" scope="col">
                                {{ __('Action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($users as $user)
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
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
                                <td class="border-b-2 border-base-300 text-right">                                    
                                    <div class="flex justify-end">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                                @if (Auth::user()->hasRole('Super Admin'))
                                                    <!-- Open the modal using ID.showModal() method -->
                                                    {{-- <x-edit-button onclick="document.getElementById('edit_user{{ $user->id }}').showModal()">                      
                                                    </x-edit-button>

                                                    <dialog id="edit_user{{ $user->id }}" class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box !w-auto text-left hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                        <h3 class="font-bold text-lg">{{ __('Edit User') }}</h3>
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
                                                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")

                                                                <div>
                                                                    <x-input-label for="name" :value="__('Name')" />
                                                                    <x-text-input name="name" id="name" value="{{ $user->name ?? old('name') }}" />
                                                                        @if ($errors->has('name'))
                                                                            <span class="text-red-500 text-sm mb-4">{{ $errors->first('name') }}</span>
                                                                        @endif
                                                                </div>
                                            
                                                                <div class="mb-3 row">
                                                                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                                                                    <div class="col-md-6">
                                                                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                                                                        @if ($errors->has('email'))
                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="mb-3 row">
                                                                    <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                                                                    <div class="col-md-6">
                                                                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                                                        @if ($errors->has('password'))
                                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="mb-3 row">
                                                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                                                                    <div class="col-md-6">
                                                                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="mb-3 row">
                                                                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
                                                                    <div class="col-md-6">           
                                                                        <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                                                                            @forelse ($roles as $role)
                                            
                                                                                @if ($role!='Super Admin')
                                                                                <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                                                                    {{ $role }}
                                                                                </option>
                                                                                @else
                                                                                    @if (Auth::user()->hasRole('Super Admin'))   
                                                                                    <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                                                                        {{ $role }}
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
                                                                    <x-save-button> {{ __('Save') }}</x-save-button>
                                                                    <x-cancel-button onclick="window.location='{{ route('roles.index') }}'">
                                                                        {{ __('Cancel') }}
                                                                    </x-cancel-button>
                                                                </div>                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </dialog> --}}

                                                    
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                                                @endif
                                            @else
                                                @can('edit-user')
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a> 
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
                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50 hover:text-slate-500 hover:font-semibold">
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