<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="bg-white text-black dark:bg-gray-800 dark:text-gray-300 debug-screens">
@inertia
</body>
</html>
