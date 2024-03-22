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
        <!-- Open the modal using ID.showModal() method -->
        <x-primary-button onclick="my_modal_add.showModal()">{{ __('Create sport') }}</x-primary-button>
        <dialog id="my_modal_add" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box">
            <h3 class="font-bold text-lg">{{ __('Add Sport') }}</h3>
            <!-- <p class="py-4">Press ESC key or click the button below to close</p> -->
            <div class="modal-action justify-start">
              <form method="POST" action="{{ route('sports.store') }}">
                @csrf
                @method('post')
                <x-text-input name="sports_name" />
                <x-input-error :messages="$errors->get('sports_name')" class="mt-2" />
                <div class="mt-4 space-x-2">
                    <x-save-button>{{ __('Save') }}</x-save-button>
                    <a href="{{ route('sports.index') }}">{{ __('Cancel') }}</a>
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
                    <x-edit-button onclick="my_modal_edit.showModal()">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </x-edit-button>
                    <dialog id="my_modal_edit" class="modal modal-bottom sm:modal-middle">
                      <div class="modal-box">
                        <h3 class="font-bold text-lg">{{ __('Edit Sport') }}</h3>
                        <!-- <p class="py-4">Press ESC key or click the button below to close</p> -->
                        <div class="modal-action justify-start">                          
                          <form method="POST" action="{{ route('sports.update', $sport) }}">
                            @csrf
                            @method('patch')
                            <x-text-input name="sports_name" value="{{ old('sports_name', $sport->sports_name) }}" />
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <div class="mt-4 space-x-2">
                              <x-save-button>{{ __('Save') }}</x-save-button>
                              <a href="{{ route('sports.index') }}">{{ __('Cancel') }}</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </dialog>
                  <form method="POST" action="{{ route('sports.destroy', $sport) }}">
                    @csrf
                    @method('delete')
                    <x-delete-button onclick="return confirm('Are you sure?'); event.preventDefault(); this.closest('form').submit();">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>                      
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