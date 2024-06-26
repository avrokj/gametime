<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GAMETIME</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            function toggleModal(modalId) {
                // Get all dialogs
                const dialogs = document.querySelectorAll('dialog');
        
                // Loop through each dialog
                dialogs.forEach(dialog => {
                    // Close all dialogs except the one with the specified modalId
                    if (dialog.id !== modalId) {
                        dialog.close();
                    }
                });
        
                // Open the dialog associated with the clicked button
                document.getElementById(modalId).showModal();
            }
        </script>
    </head>
    <body>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
            @guest
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <button class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" onclick="toggleModal('login')">Log in</button>
                            <dialog id="login" class="modal">
                            <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-lg text-left">{{ __('Log in') }}</h3>
                                <div class="modal-action justify-start text-left">
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}" class="w-full">
                                        @csrf
                                
                                        <!-- Email Address -->
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                            </label>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Password')" >
                                                <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />
                                            </label>                            
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                
                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                
                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="toggleModal('forgot')">
                                                    {{ __('Forgot your password?') }}
                                                </button>
                                            @endif
                                
                                            <x-primary-button class="ms-3">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </dialog>

                            
                            @if (Route::has('password.request'))
                            <dialog id="forgot" class="modal">
                                <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>                                
                                    <div class="mb-4 text-sm text-left">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>
                                    <div class="modal-action justify-start text-left">
                                    
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                    
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                    
                                            <!-- Email Address -->
                                            <div>
                                                <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                    <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                    <x-text-input id="email"  type="email" name="email" :value="old('email')" required autofocus class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                                </label>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                    
                                            <div class="flex items-center justify-end mt-4">
                                                <x-primary-button>
                                                    {{ __('Email Password Reset Link') }}
                                                </x-primary-button>
                                            </div>
                                        </form>    
                                    </div>
                                </div>
                            </dialog>                            
                            @endif



                            @if (Route::has('register'))                            
                            <button class="ml-4 font-semibold  hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" onclick="toggleModal('register')">
                                {{ __('Register') }}
                            </button>

                            <dialog id="register" class="modal">
                            <div class="modal-box !w-auto hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-lg text-left">{{ __('Register') }}</h3>
                                <div class="modal-action justify-start text-left">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                
                                        <!-- Name -->
                                        <div>
                                            <label class="input input-bordered flex items-center gap-2" for="name" :value="{{__('Name')}}" >
                                                <x-heroicon-s-user class="w-4 h-4 opacity-70" />
                                                <x-text-input id="name" type="text" class="grow border-none focus:outline-none" placeholder="{{__('Name')}}" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </label>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                
                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <label class="input input-bordered flex items-center gap-2" for="email" :value="__('Email')" >
                                                <x-heroicon-c-envelope class="w-4 h-4 opacity-70" />
                                                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="grow border-none focus:outline-none" placeholder="{{__('Email')}}" />
                                            </label>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Password')" >
                                                <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                <x-text-input id="password" class="grow border-none focus:outline-none" placeholder="{{__('Password')}}" 
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />
                                            </label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                
                                        <!-- Confirm Password -->
                                        <div class="mt-4">                                        
                                            <label class="input input-bordered flex items-center gap-2" for="password" :value="__('Confirm Password')" >
                                                <x-heroicon-s-key class="w-4 h-4 opacity-70" />
                                                <x-text-input id="password_confirmation" class="grow border-none focus:outline-none" placeholder="{{__('Confirm Password')}}" 
                                                            type="password"
                                                            name="password_confirmation" required autocomplete="new-password" />
                                            </label>                            
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                
                                        <div class="flex items-center justify-end mt-4">                                                                    
                                            <button class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="toggleModal('login')">
                                                {{ __('Already registered?') }}
                                            </button>

                                            <x-primary-button class="ms-4">
                                                {{ __('Register') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </dialog>
                            @endif
                        @endauth                
                        <label class="swap swap-rotate px-2">
                            <input type="checkbox" id="darkModeCheckbox" class="hidden"/>
                            <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                            <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
                        </label>
                    </div>
                @endif            
            @endguest

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <div class="w-52 hover:animate-ping">
                        <x-application-logo class="block h-9 fill-current" />
                    </div>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        
                        <!-- Events -->
                        <div class="bg-base-200 scale-100 p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <h2 class="font-semibold text-xl flex items-center leading-tight w-full">
                                <div class="h-16 w-16 bg-base-300 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div> 
                                &nbsp;{{ __('Events') }}
                            </h2>

                            <div role="tablist" class="event-tabs tabs tabs-bordered mt-2">
                                <a role="tab" class="tab" href="#event-tab-future"> {{ __('Future Events') }}</a>
                                <a role="tab" class="tab font-semibold tab-active" href="#event-tab-ongoing"> {{ __('Ongoing Events') }}</a>
                                <a role="tab" class="tab" href="#event-tab-past">{{ __('Past Events') }}</a>
                            </div>

                            @php
                                $sortedEvents = $events->sortByDesc('datetime');
                            @endphp
                              
                            <div id="event-tab-future" role="eventtabpanel" class="hidden">                               
                                @php
                                    $futureEvents = false;
                                    foreach ($events as $event) {
                                        if (\Carbon\Carbon::parse($event->datetime)->isFuture()) {
                                            $futureEvents = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($futureEvents)
                                    @foreach ($sortedEvents as $event)
                                        @if (\Carbon\Carbon::parse($event->datetime)->isFuture())
                                            <div class="bg-base-100 scale-100 text-center p-6 my-2 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                {{-- <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image" class="object-cover w-full aspect-square rounded-full"> --}}
                                                <h2 class="text-2xl">{{ $event->event_name }}</h2>
                                                <p>{{ \Carbon\Carbon::parse($event->datetime)->format('d.m.Y') }} {{ __('at') }} {{ \Carbon\Carbon::parse($event->datetime)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="pt-4 col-span-2">
                                        {{ __('No future events.') }}
                                    </div>
                                @endif
                            </div>
                            <div id="event-tab-ongoing" role="eventtabpanel" class="tab-active">
                                @php
                                    $ongoingEvents = false;
                                    foreach ($sortedEvents as $event) {
                                        if (\Carbon\Carbon::parse($event->datetime)->isPast() && \Carbon\Carbon::parse($event->end_datetime)->isFuture()) {
                                            $ongoingEvents = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($ongoingEvents)
                                    @foreach ($sortedEvents as $event)                                        
                                        @if (\Carbon\Carbon::parse($event->datetime)->isPast() && \Carbon\Carbon::parse($event->end_datetime)->isFuture())
                                            <div class="bg-base-100 scale-100 text-center p-6 my-2 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                                                {{-- <img src="{{ asset('images/players/' . $player->image) }}" alt="{{ $player->player_name }} image" class="object-cover w-full aspect-square rounded-full"> --}}
                                                <h2 class="text-2xl">{{ $event->event_name }}</h2>
                                                <p>{{ \Carbon\Carbon::parse($event->datetime)->format('d.m.Y') }} {{ __('at') }} {{ \Carbon\Carbon::parse($event->datetime)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="pt-4 col-span-2">
                                        {{ __('No ongoing events.') }}
                                    </div>
                                @endif
                            </div>
                            <div id="event-tab-past" role="eventtabpanel" class="hidden">
                                <table class="table min-w-full">  
                                    @foreach ($sortedEvents as $event)                                      
                                        @if (\Carbon\Carbon::parse($event->datetime)->isPast())
                                            <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                                <td class="border-b-2 border-base-300">
                                                    {{ \Carbon\Carbon::parse($event->datetime)->format('d.m.Y') }} {{ __('at') }} {{ \Carbon\Carbon::parse($event->datetime)->format('H:i') }}
                                                </td>
                                                <td class="border-b-2 border-base-300 text-left font-semibold">
                                                    {{ $event->event_name }}
                                                </td>
                                                <td class="border-b-2 border-base-300 text-right">
                                                    {{ $event->sport->sports_name }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <!-- Games -->
                        <div class="bg-base-200 scale-100 p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <h2 class="font-semibold text-xl flex items-center leading-tight w-full">
                                <div class="h-16 w-16 bg-base-300 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div> 
                                &nbsp;{{ __('Games') }}
                            </h2>

                            <div role="tablist" class="game-tabs tabs tabs-bordered mt-2">
                                <a role="tab" class="tab" href="#game-tab-future"> {{ __('Future Games') }}</a>
                                <a role="tab" class="tab font-semibold tab-active" href="#game-tab-ongoing"> {{ __('Ongoing Games') }}</a>
                                <a role="tab" class="tab" href="#game-tab-past">{{ __('Past Games') }}</a>
                            </div>

                            @php
                                $sortedGames = $games->sortByDesc('datetime');
                            @endphp
                              
                            <div id="game-tab-future" role="gametabpanel" class="hidden">  
                                <table class="table min-w-full">                             
                                @php
                                    $futureGames = false;
                                    foreach ($games as $game) {
                                        if ($game->status == 0) {
                                            $futureGames = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($futureGames)
                                    @foreach ($sortedGames as $game)
                                        @if (\Carbon\Carbon::parse($game->datetime)->isFuture() || $game->status == 0)
                                        <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                            <td class="border-b-2 border-base-300">
                                                <p class="text-center text-xs leading-5 mb-0">{{ \Carbon\Carbon::parse($game->datetime)->format('d.m.Y') }} {{ __('at') }} {{ \Carbon\Carbon::parse($game->datetime)->format('H:i') }}</p>
                                                <div class="flex justify-center">
                                                    <div class="flex w-2/5 items-center justify-end">
                                                        <span class="hidden md:block">{{ $game->homeTeam->team_name }}</span> 
                                                        <img src="./images/logos/{{ $game->homeTeam->logo }}" class="h-8 p-1" title="{{ $game->homeTeam->team_name }}" alt="{{ $game->homeTeam->team_name }}"/>
                                                    </div>
                                                    <div class="flex w-1/5 items-center justify-center font-bold text-lg">
                                                        {{ $game->home_score }}:{{ $game->away_score }}
                                                    </div>
                                                    <div class="flex w-2/5 items-center justify-start">
                                                        <img src="./images/logos/{{ $game->awayTeam->logo }}" class="h-8 p-1" title="{{ $game->awayTeam->team_name }}" alt="{{ $game->awayTeam->team_name }}"/> 
                                                        <span class="hidden md:block">{{ $game->awayTeam->team_name }}</span>
                                                    </div>
                                                </div>                                                  
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="pt-4 col-span-2">
                                        {{ __('No future games.') }}
                                    </div>
                                @endif
                                </table>
                            </div>
                            <div id="game-tab-ongoing" role="gametabpanel" class="tab-active">
                                @php
                                    $ongoingGames = false;
                                    $currentDate = now()->format('Y-m-d');
                                    $currentTime = now()->format('H:i:s');
                                    
                                    foreach ($sortedGames as $game) {
                                        $gameStart = \Carbon\Carbon::parse($game->datetime);
                                        
                                        if ($gameStart->format('Y-m-d') == $currentDate &&
                                            $gameStart->lte(now())) {
                                            $ongoingGames = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($ongoingGames)
                                    <table class="table min-w-full">
                                        @foreach ($sortedGames as $game)
                                            @php
                                                $gameStart = \Carbon\Carbon::parse($game->datetime);
                                            @endphp
                                            @if ($gameStart->format('Y-m-d') == $currentDate &&
                                                $gameStart->lte(now()) &&
                                                $game->status == 1)
                                                <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                                    <td class="border-b-2 border-base-300">
                                                        <p class="text-center text-xs leading-5 mb-0">{{ $gameStart->format('d.m.Y') }} {{ __('at') }} {{ $gameStart->format('H:i') }}</p>
                                                        <div class="flex justify-center">
                                                            <div class="flex w-2/5 items-center justify-end">
                                                                <span class="hidden md:block">{{ $game->homeTeam->team_name }}</span> 
                                                                <img src="./images/logos/{{ $game->homeTeam->logo }}" class="h-8 p-1" title="{{ $game->homeTeam->team_name }}" alt="{{ $game->homeTeam->team_name }}"/>
                                                            </div>
                                                            <div class="flex w-1/5 items-center justify-center font-bold text-lg">
                                                                {{ $game->home_score }}:{{ $game->away_score }}
                                                            </div>
                                                            <div class="flex w-2/5 items-center justify-start">
                                                                <img src="./images/logos/{{ $game->awayTeam->logo }}" class="h-8 p-1" title="{{ $game->awayTeam->team_name }}" alt="{{ $game->awayTeam->team_name }}"/> 
                                                                <span class="hidden md:block">{{ $game->awayTeam->team_name }}</span>
                                                            </div>
                                                        </div>                                                  
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                @else
                                    <div class="pt-4 col-span-2">
                                        {{ __('No ongoing games.') }}
                                    </div>
                                @endif
                            </div>
                            <div id="game-tab-past" role="gametabpanel" class="hidden">
                                <table class="table min-w-full">  
                                    @foreach ($sortedGames as $game)                                      
                                    @if ($game->status == 2)
                                    <tr class="odd:bg-base-200 even:bg-base-100 justify-between items-center transition duration-300 ease-in-out hover:scale-[1.01] hover:shadow-[0_9px_4px_-6px_rgba(0,0,0,0.3)] hover:font-semibold">
                                        <td class="border-b-2 border-base-300">
                                            <p class="text-center text-xs leading-5 mb-0">{{ \Carbon\Carbon::parse($game->datetime)->format('d.m.Y') }} {{ __('at') }} {{ \Carbon\Carbon::parse($game->datetime)->format('H:i') }}</p>
                                            <div class="flex justify-center">
                                                <div class="flex w-2/5 items-center justify-end">
                                                    <span class="hidden md:block">{{ $game->homeTeam->team_name }}</span> 
                                                    <img src="{{ asset('images/logos/' . $game->homeTeam->logo) }}" class="h-8 p-1" title="{{ $game->homeTeam->team_name }}" alt="{{ $game->homeTeam->team_name }}"/>
                                                </div>
                                                <div class="flex w-1/5 items-center justify-center font-bold text-lg">
                                                    {{ $game->home_score }}:{{ $game->away_score }}
                                                </div>
                                                <div class="flex w-2/5 items-center justify-start">
                                                    <img src="{{ asset('images/logos/' . $game->awayTeam->logo) }}" class="h-8 p-1" title="{{ $game->awayTeam->team_name }}" alt="{{ $game->awayTeam->team_name }}"/> 
                                                    <span class="hidden md:block">{{ $game->awayTeam->team_name }}</span>
                                                </div>
                                            </div>                                                  
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </table>
                            </div>
                        </div>

                        <a href="https://laravel.com/docs" class="bg-base-200 scale-100 p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg flex motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <div>
                                <div class="h-16 w-16 bg-base-300 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-amber-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold">Documentation</h2>

                                <p class="mt-4  text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-amber-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://test.gametime.ee/memory" class="bg-base-200 scale-100 p-6 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-lg flex motion-safe:hover:scale-[1.01] transition-all duration-250 hover:shadow-[0_16px_36px_rgba(237,_134,_0,_0.5)]">
                            <div>
                                <div class="h-16 w-16 bg-base-300 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-amber-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold">Memory Game</h2>

                                <p class="mt-4  text-sm leading-relaxed">
                                    Here is our first cool release for players to remember faces - Memory Game
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-amber-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm  sm:text-right sm:ml-0">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>        
        <script type="module" src="{{ asset('js/spaghetti.js') }}"></script>
    </body>
</html>
