<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Search sport') }} <!-- __( tähendab tõlke funktsiooni. Topelt nibudega sulud tähendavad php koodi -->
        </h2> 
      </div>
      <div>   
        <form action="{{ route('searchsports') }}" method="GET">
          <x-text-input type="text" name="searchsports" placeholder="Search sports here..." value="{{ request('searchsports') }}" required/>
          <x-primary-button type="submit">Search</x-primary-button>
        </form>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex-grow overflow-auto">
          <table class="relative w-full">            
            <thead class="bg-neutral-100 text-left">
              <tr class="text-left py-4">
                <th class="text-left py-2 rounded-t-md">Sports</th>
                <th class="text-left py-2 rounded-t-md">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($sports->isNotEmpty())
          @foreach ($sports as $sport)
              <tr class="border-b justify-between items-center transition duration-300 ease-in-out hover:bg-neutral-50">
                <td>
                  {{ $sport->sports_name }} 
                </td>
                <td>
                  <div class="flex">
                  <a href="{{route('sports.edit', $sport)}}"  class="text-white bg-blue-500 hover:bg-blue-600 rounded-md text-sm px-2 py-1 mr-2 focus:outline-none uppercase font-semibold tracking-widest text-xs">
                      {{ __('Edit') }}
                  </a>
                  <form method="POST" action="{{ route('sports.destroy', $sport) }}">
                    @csrf
                    @method('delete')
                    <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Delete') }}
                    </x-danger-button>
                  </form>
                  </div>
                </td>
              </tr>
              @endforeach
              @else 
                  <div>
                      <h2>No sports found, search again or turn back to <a href="/sports">sports page</a>.</h2>
                  </div>
              @endif         
              </tbody>
            </table> 
        </div>
      </div>
    </div>
  </div>
</x-app-layout>