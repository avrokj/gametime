<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div>
        <h2 class="font-semibold text-xl leading-tight">
          {{ __('Sports') }}
        </h2> 
      </div>
      <div>   
        <form action="{{ route('searchsports') }}" method="GET">
          <x-text-input type="text" name="searchsports" placeholder="Search sports here..." value="{{ request('searchsports') }}" required/>
          <x-primary-button type="submit">Search</x-primary-button>
        </form>
      </div>
      <div>       
        <x-primary-button onclick="document.getElementById('my_modal_add').showModal()">
          {{ __('Create sport') }}
        </x-primary-button>

        <dialog id="my_modal_add" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box !w-auto">
            <h3 class="font-bold text-lg">{{ __('Add Sport') }}</h3>
            <!-- <p class="py-4">Press ESC key or click the button below to close</p> -->
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
      <div class="bg-base-300 overflow-hidden shadow-md sm:rounded-lg">
        <div class="p-6 flex-grow overflow-auto">
          <table class="table table-zebra">            
            <thead class="text-left">
              <tr class="text-left py-4">
                <th class="text-left py-2 rounded-t-md">Sport</th>
                <th class="text-right py-2 rounded-t-md">Action</th>
              </tr>
            </thead>
            <tbody>
          @foreach ($sports as $sport)
              <tr class="border-b justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50">
                <td>
                  {{ $sport->sports_name }} 
                </td>
                <td>
                  <div class="flex justify-end">                    
                    <!-- Open the modal using ID.showModal() method -->
                    <x-edit-button onclick="document.getElementById('my_modal_edit{{ $sport->id }}').showModal()">                      
                    </x-edit-button>
                    <dialog id="my_modal_edit{{ $sport->id }}" class="modal modal-bottom sm:modal-middle">
                      <div class="modal-box !w-auto">
                        <h3 class="font-bold text-lg">{{ __('Edit Sport') }}</h3>
                        <!-- <p class="py-4">Press ESC key or click the button below to close</p> -->
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