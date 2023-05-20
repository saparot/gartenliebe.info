<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    @env('GTM_IDENTIFIER')
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer',{{ env('GTM_IDENTIFIER') }});</script>
    @endenv

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="bg-white text-black dark:bg-gray-900 dark:text-gray-300 debug-screens dark:gradient-corner">
@env('GTM_IDENTIFIER')
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GTM_IDENTIFIER') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endenv
@inertia
</body>
</html>
