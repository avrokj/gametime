<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add Sport') }} <!-- __( tähendab tõlke funktsiooni. Topelt nibudega sulud tähendavad php koodi -->
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex-grow overflow-auto">
          <form method="POST" action="{{ route('sports.store') }}">
              @csrf
              @method('post')
              <x-text-input name="sports_name" />
              <x-input-error :messages="$errors->get('sports_name')" class="mt-2" />
              <div class="mt-4 space-x-2">
                  <x-primary-button>{{ __('Save') }}</x-primary-button>
                  <a href="{{ route('sports.index') }}">{{ __('Cancel') }}</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>