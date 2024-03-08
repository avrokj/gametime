<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GAMETIME</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                    <label class="swap swap-rotate">      
                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" id="darkModeCheckbox" />
                        
                        <!-- sun icon -->
                        <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                        
                        <!-- moon icon -->
                        <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
                        
                      </label>
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg version="1.1" id="gametime_x5F_logo" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.6 116.4" width="200"
                        height="200" style="enable-background:new 0 0 115.6 116.4; fill:#ed8600;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                clip-path: url(#SVGID_2_);
                            }

                            .st1 {
                                fill: #ed8600;
                            }
                        </style>
                        <g id="GAME_TIME">
                            <defs>
                                <path id="SVGID_1_" d="M107.7,58.2c0,6.6-1.3,12.9-3.6,18.6c-3.4,8.4-9,15.7-16.1,21.2c-0.7,0.5-1.3,1-2,1.5
                                    c-1.6,1.1-3.3,2.1-5.1,3.1c-2.8,1.5-5.7,2.7-8.8,3.6c-1.4,0.4-2.9,0.8-4.4,1.1c-2.5,0.5-5.1,0.8-7.7,1c-0.8,0-1.6,0.1-2.3,0.1
                                    c-1.1,0-2.2,0-3.2-0.1c-1-0.1-2.1-0.2-3.1-0.3c-2-0.3-3.9-0.6-5.9-1.1c-3.8-1-7.4-2.3-10.7-4.1h0c-2.3-1.2-4.4-2.5-6.4-4
                                    c-7.5-5.5-13.5-13-17-21.8c-1-2.4-1.8-4.9-2.3-7.4c-0.1-0.3-0.1-0.6-0.2-0.9c-0.2-0.9-0.4-1.7-0.5-2.6c-0.3-2-0.5-3.9-0.6-5.9
                                    c0-0.6,0-1.2,0-1.8c0-0.8,0-1.6,0.1-2.4c0.7-14.5,7.6-27.5,18.1-36.2c2.1-1.7,4.3-3.3,6.6-4.6c2.1-1.3,4.3-2.3,6.6-3.3
                                    c3.4-1.4,7-2.4,10.7-3c2.6-0.4,5.2-0.6,7.9-0.6c0.5,0,0.9,0,1.4,0c5,0.1,9.8,1,14.3,2.5c1.6,0.5,3.3,1.2,4.8,1.9c1,0.5,2,1,3,1.5
                                    c8.7,4.6,15.8,11.7,20.4,20.3c1.6,3,2.9,6.1,3.9,9.4c0.4,1.4,0.8,2.9,1.1,4.3c0.2,0.8,0.3,1.7,0.5,2.6c0,0.3,0.1,0.5,0.1,0.8
                                    c0.3,2,0.4,3.9,0.4,6v0C107.7,57.8,107.7,58,107.7,58.2z" />
                            </defs>
                            <clipPath id="SVGID_2_">
                                <use xlink:href="#SVGID_1_" style="overflow:visible;" />
                            </clipPath>
                            <g class="st0">
                                <path d="M7.8,67.9c1.9-1.3,4.3-2.9,7.1-4.4c3.5-1.9,7.6-3.8,12.2-5.4c-1.1-8.1-0.4-12.7-1.6-21c-2.5,1.9-6,5-8.4,7.3
                                    c-1.3,1.2-1.9,2.7-1.7,4.4c0.2,1.7,0.3,3.3,0.5,5c1.7-1,3.3-2,5.1-3c0.2,1.8,0.5,2.6,0.7,4.5c-2.4,1-4.8,2-7.2,3.1
                                    c-1,0.4-1.5,0.1-1.6-1.1c-0.3-3.8-0.5-6.6-0.8-10.4c-0.1-1.1,0.3-2.1,1-3.1c2.8-3.5,8.7-9.8,11.8-12.8c1.4-1.3,1.8-3.7,1.4-7.3
                                    c-0.1-0.7-0.2-2.3-0.3-4C15.4,28.4,8.5,41.3,7.8,55.9c0,1.4,0,2.8,0,4.2c0,0.6,0,1.2,0,1.8c0,1.4-1.6,2.5-0.6,3.5
                                    C7.4,65.5,7.6,66.9,7.8,67.9z" />
                                <path d="M29.7,57.4c1.8-0.5,3.7-0.9,5.6-1.3c0.9-10.6,1.6-19.5,2.2-32.3c2.4,5.8,3.9,9.9,6.4,16.2c-2.1,0.6-3.2,1.3-5.3,2
                                    c-0.3,3.8-0.5,6.5-0.8,10.2c3.7-0.9,5.5-1.8,9.2-2.6c0.6,1.4,1.8,3.8,2.9,6c2.4,0.3,4.9,0.7,7.4,1.4
                                    c-5.9-14.8-11.7-29.5-17.1-42.9c-0.3-0.8-0.6-1.5-1-2.1c-2.3,0.9-4.5,2-6.6,3.3c-0.8,14.7-1.8,25.2-3.1,37.5
                                    c-0.2,1.3-0.2,2.5,0,3.6C29.4,56.6,29.5,57,29.7,57.4z" />
                                <path d="M59.5,56.8c0.2,0.4,0.3,0.7,0.5,0.9c2.6,0.8,5.2,1.3,7.6,1.6c-1.6-8.7-5.9-19.2-7.4-27.8c2.7,6.4,5.4,12.7,8,18.9
                                    c1.7,4.4,3.4,6.3,4.9,6.1c1.4-0.2,2.3-1.9,2.6-4.8c0.7-8,1.3-15.4,2.1-22.1c1.3,6.8,1.5,16.7,2.8,23.6c0.2,1.3,0-0.7,0.1,0.3
                                    c0.3,2.6,1.3,4.2,1.9,4.9c2.1-0.5,4.2-1.2,6.2-1.9c-2.1-11.2-5.3-25.2-7.5-36.1c-0.3-1.5-0.6-2.8-1-4.1c-0.7-2.1-1.8-3.6-3.1-4.3
                                    c-0.9-0.5-1.7-1-2.6-1.4c-0.6-0.3-1.1-0.2-1.3,0.5c-0.3,0.7-0.4,1.6-0.6,2.7c-0.8,7.9-1.6,16.9-2.3,26.6
                                    c-4.1-9.6-6.3-19.8-10.5-30.1c-1.3-3.5-2.7-5.3-4.1-5.3c-1.2,0-5.5,0.1-6.7,0.2c2.7,15.7,6.3,31.4,8.9,47.1
                                    C58.5,54.1,58.9,55.6,59.5,56.8z" />
                                <path d="M91.6,55.2c2.6-1.1,4.9-2.4,7-3.7c4-2.5,7-5,8.8-6.6c-0.7-0.7-1.7-1.2-3-1.3c-3.4-0.3-7.9,1.4-11.3,1.2
                                    c-0.4-1.8-0.8-3.5-1.1-5.3c3.3,0.7,6.6,1.4,9.9,2.3c-0.5-1.9-1.1-3.7-1.6-5.6c-3.3-1.7-6.6-3.3-10-4.6c-0.4-1.7-0.8-3.4-1.1-5.1
                                    c4.6,2.5,9.1,5.4,13.5,8.6c-0.3-0.8-0.5-1.5-0.8-2.3c-0.6-1.6-1.8-3.4-3.6-5.2c-5.4-5.1-12-13.6-17.7-17.2c2.4,11.4,6.7,29,9,40.6
                                    C90,53.4,90.7,54.8,91.6,55.2z" />
                                <path d="M34.5,74.9c-0.6-2.1-2.1-7.3-2.7-9.4C31.2,63,29.6,62,27,62.4c-3.6,1.3-7,2.8-9.8,4.4c-3.5,1.9-6.3,3.8-8.3,5.3
                                    c0.2,1.3,0.3,2.6,0.7,3.4c0.6,1.2,2,1.9,4.2,1.9c1.5,0,4-1,5.6-1c2.6,6.9,5.3,12.9,8,20c1.1,3,2.5,4.9,4,5.7
                                    c1.3,0.7,2.6,1.3,3.9,1.9c-3-9.7-6-19.3-9-28.7C29,75.2,31.7,75.1,34.5,74.9z" />
                                <path d="M37.6,59.7c-1.7,0.3-3.4,0.6-5,1c3.2,12.7,8.3,29.4,11.4,42.2c0.8,3.1,1.9,4.8,3.3,5.2c1.4,0.3,2.9,0.6,4.3,0.8
                                    c-2.8-13-7.7-29-10.5-42C40.3,63.1,39.1,60.4,37.6,59.7z" />
                                <path
                                    d="M82.7,67.7c-0.1-1.6-0.4-3-0.6-4.3c-0.1-0.3-0.2-0.6-0.3-0.8c-2.7,0.5-5.4,0.9-8.3,0.9c-0.3,0.9-0.6,1.9-0.9,3.1
                                    c-1.9,9.7-3.5,15.8-4.8,25.7c-4.3-8.7-9.9-19.7-14.7-28.5c-0.8-1.5-1.8-3.2-3-4.3c-1.8-0.2-3.6-0.3-5.4-0.3c-0.8,0-1.6,0-2.4,0.1
                                    c2.9,13.5,7.6,30.8,10.4,44.2c0.3,1.5,0.8,2.9,1.5,4c0.1,0.2,0.3,0.5,0.4,0.6c1.1,0.1,2.1,0.1,3.2,0.1c0.8,0,1.6,0,2.3-0.1
                                    c-1.4-7.6-2.8-15.1-4.3-22.7c3,5.7,6,11.4,8.9,17.1c1.1,2.3,2.1,3.9,3.1,4.7c0.8,0.7,1.5,0.9,2.3,0.7c0.9-0.2,1.6-0.8,2.1-1.8
                                    c0.5-0.9,0.8-2,1-3.5c1.1-8.4,2.5-16.8,4-25c0.9,7.1,1.7,14.3,2.6,21.4c0.2,1.4,0.5,2.4,1,3.2c0,0.1,0.1,0.2,0.2,0.2
                                    c0.4,0.6,0.9,0.8,1.3,0.5c1.3-0.7,2.6-1.5,3.9-2.4c0-0.4-0.1-0.8-0.1-1.2C84.9,87.8,83.8,79.6,82.7,67.7z" />
                                <path d="M101,54.7c-4.5,2.8-10.3,5.7-17,7.4c1,11.6,2,20.2,3.1,32.4c0.3,3.5,1.2,4.7,2.6,3.6c5.4-4.2,10.4-9.5,14.7-15.4
                                    c0.1-1.2,0.3-2.3,0.4-3.5c0.3-2.6-0.4-3-2.3-1.3c-3.2,2.9-6.6,5.6-10.1,8c-0.1-2.1-0.2-4.2-0.3-6.3c3.5-2,7-4.2,10.3-6.6
                                    c0.2-2.6,0.4-5.2,0.5-7.8c-3.7,1.8-7.4,3.4-11.2,5c-0.1-2-0.2-2-0.3-4c5.4-1.7,10.8-5.5,16-7.4c0.2-1.1,0.3-2.2,0.5-3.4
                                    c0.3-1.9,1-4.9,0-5.8C106.2,51.2,103.9,52.9,101,54.7z" />
                            </g>
                        </g>
                        <g id="ring">
                            <path class="st1" d="M111.2,58.2h-1c0,6.9-1.3,13.5-3.8,19.6c-3.5,8.9-9.4,16.5-16.9,22.2l0,0l0,0c-0.7,0.5-1.4,1.1-2.1,1.6l0,0
                                l0,0c-1.7,1.2-3.5,2.2-5.3,3.2l0,0c-2.9,1.5-6,2.8-9.2,3.7l0,0c-1.5,0.5-3,0.8-4.6,1.2l0,0c-2.6,0.5-5.3,0.9-8.1,1l0,0l0,0
                                c-0.8,0-1.6,0.1-2.5,0.1c-1.1,0-2.3,0-3.4-0.1l0,0l0,0c-1.1-0.1-2.2-0.2-3.3-0.3c-2.1-0.3-4.1-0.7-6.2-1.2l0,0
                                c-4-1-7.7-2.4-11.3-4.3l-0.2-0.1h-0.3v1l0.5-0.9c-2.4-1.2-4.6-2.6-6.8-4.2C19,95,12.7,87.1,9,77.9l0,0c-1-2.5-1.8-5.1-2.5-7.8l0,0
                                l0,0c-0.1-0.3-0.1-0.6-0.2-0.9l0,0l0,0c-0.2-0.9-0.4-1.8-0.5-2.7l0,0l0,0c-0.3-2-0.5-4.1-0.6-6.2l0,0l0,0c0-0.6,0-1.2,0-1.9
                                c0-0.8,0-1.7,0.1-2.5l0,0c0.7-15.3,8-28.9,19-38l0,0c2.2-1.8,4.5-3.4,6.9-4.8l0,0c2.2-1.3,4.5-2.4,6.9-3.4
                                c3.6-1.4,7.3-2.5,11.3-3.1l0,0c2.7-0.4,5.5-0.7,8.3-0.7c0.5,0,1,0,1.5,0l0,0c5.2,0.1,10.2,1,15,2.6l0,0c1.7,0.6,3.4,1.2,5.1,2l0,0
                                l0,0c1.1,0.5,2.1,1,3.2,1.6l0,0c9.1,4.9,16.6,12.3,21.5,21.3c1.7,3.1,3.1,6.4,4.1,9.9l0,0c0.5,1.5,0.8,3,1.1,4.5l0,0l0,0
                                c0.2,0.9,0.3,1.8,0.5,2.7l0,0l0,0c0.1,0.3,0.1,0.5,0.1,0.8l0,0l0,0c0.3,2.1,0.4,4.1,0.5,6.3l0,0v0v0l0,0c0,0.2,0,0.5,0,0.7H111.2h1
                                c0-0.3,0-0.5,0-0.8l-1,0h1v0v0l0,0c0-2.2-0.2-4.4-0.5-6.5l-1,0.1l1-0.1c0-0.3-0.1-0.6-0.1-0.9l-1,0.2l1-0.1
                                c-0.1-0.9-0.3-1.9-0.5-2.8l0,0c-0.3-1.6-0.7-3.2-1.2-4.7l0,0c-1.1-3.6-2.5-7-4.3-10.2c-5.1-9.4-12.8-17.1-22.3-22.2l0,0
                                c-1.1-0.6-2.2-1.1-3.3-1.6l0,0c-1.7-0.8-3.5-1.5-5.3-2.1l0,0c-4.9-1.6-10.1-2.6-15.5-2.7l0,0c-0.5,0-1,0-1.5,0
                                c-2.9,0-5.8,0.2-8.6,0.7l0,0l0,0c-4.1,0.6-8,1.7-11.7,3.2c-2.5,1-4.9,2.2-7.2,3.5l0,0c-2.5,1.5-4.9,3.2-7.2,5l0,0
                                c-11.5,9.5-19,23.6-19.8,39.4l0,0c0,0.9-0.1,1.7-0.1,2.6c0,0.7,0,1.3,0,2l1,0l-1,0c0.1,2.2,0.3,4.4,0.6,6.5l1-0.2l-1,0.1
                                c0.1,1,0.3,1.9,0.5,2.9l1-0.2l-1,0.2c0.1,0.3,0.1,0.7,0.2,1l1-0.2l-1,0.2c0.6,2.8,1.5,5.5,2.6,8.1l0,0c3.8,9.5,10.3,17.8,18.5,23.7
                                c2.2,1.6,4.6,3.1,7,4.3l0.2,0.1h0.3v-1l-0.5,0.9c3.7,1.9,7.6,3.4,11.7,4.4l0,0c2.1,0.5,4.2,0.9,6.4,1.2c1.1,0.1,2.3,0.3,3.4,0.3
                                l0.1-1l-0.1,1c1.2,0.1,2.3,0.1,3.5,0.1c0.9,0,1.7,0,2.6-0.1l0,0c2.9-0.1,5.7-0.5,8.4-1l0,0c1.6-0.3,3.2-0.7,4.8-1.2l0,0
                                c3.3-1,6.5-2.3,9.5-3.9l0,0c1.9-1,3.8-2.1,5.5-3.3l-0.6-0.8l0.6,0.8c0.8-0.5,1.5-1.1,2.2-1.6l0,0c7.8-5.9,13.9-13.9,17.6-23.1
                                c2.5-6.3,3.9-13.1,3.9-20.3H111.2z" />
                        </g>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Documentation</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://test.gametime.ee/memory" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Memory Game</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Here is our first cool release for players to remember faces - Memory Game
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laravel-news.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">GameTime News</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    GameTime News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Forge</a>, <a href="https://vapor.laravel.com" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Vapor</a>, <a href="https://nova.laravel.com" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Nova</a>, and <a href="https://envoyer.io" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Telescope</a>, and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>        
        <script type="module" src="/js/spaghetti.js"></script>
    </body>
</html>
