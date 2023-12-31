@extends('master.layout')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="{{ asset('css/mycustom.css') }}" rel="stylesheet">
          @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>


    <body> 

        <div class="w3-container">
            @livewire('navigation-menu')
            <header class="">
                <div class="">
                    {{ $header }}
                </div>
            </header>

           
            
            <main>
                {{ $slot }}
            </main>

        </div>


        @stack('modals')
        @livewireScripts
    </body>
</html>