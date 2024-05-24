<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GameTime') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        @import url('https://fonts.cdnfonts.com/css/seven-segment');
    </style>
</head>

<body class="font-sans antialiased">
    <div class="[min-height:calc(100vh-80px-1rem)]">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-base-200 shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main> 
        @if(Request::is('dashboard'))
        @else
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">       
                <a href="{{ URL::previous() }}" class="btn btn-default btn-sm shadow-md"><x-heroicon-o-arrow-left-circle class="w-6"/>Back</a>
            </div>
        @endif
    </div>        
    <footer class="items-center p-4 mt-4 bg-base-300 base-content">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-12">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}">                        
                            <div class="w-12 hover:animate-spin mr-2">
                                <x-application-logo class="block max-h-6 fill-current" />
                            </div>
                        </a>
                        © {{ now()->year }} GameTime - All right reserved</div>

                        <div class="flex text-center items-center text-sm  sm:text-right sm:ml-0">
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        </div>
                    </div>
        </div>
      </footer>
    <script src="{{ mix('js/spaghetti.js') }}"></script>
</body>

</html>
