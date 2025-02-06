<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://kit.fontawesome.com/3a7e8b6e65.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
</head>
    <div class="relative"> 
        {{ $slot }}
    </div>

    @stack('scripts')
</html>