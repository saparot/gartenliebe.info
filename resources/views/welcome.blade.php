<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>
    <style>
        html{-webkit-text-size-adjust:100%;font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}body{margin:0}a{background-color:transparent;color:inherit;text-decoration:inherit}[hidden]{display:none}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}svg{display:block;vertical-align:middle}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity:1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.flex{display:flex}.items-center{align-items:center}.justify-center{justify-content:center}.text-sm{font-size:.875rem}.text-xl{font-size:2rem}.mx-auto{margin-left:auto;margin-right:auto}.mt-2{margin-top:.5rem}.ml-12{margin-left:3rem}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.pt-8{padding-top:2rem}.relative{position:relative}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}@media (min-width:640px){.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:border-t-0{border-top-width:0}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}}
    </style>

    <style>
        .text-green {
            color: #606c38;
        }

        .text-blue-grey {
            color: #547BA8;
        }

        .text-bold {
            font-weight: bold;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 title">
            <div class="p-6 border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l sm:border-t-0">
                <div class="flex items-center">

                    <svg width="100%" height="100%" viewBox="0 0 2700 2287" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xml:space="preserve"
                         style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
    <path id="_6311096" d="M796.878,974.513c-102.205,221.351 -443.048,243.86 -560.059,91.229c127.525,-186.7 431.091,-237.803 560.059,-91.229Z" style="fill:#606c38;"/>
                        <path id="_6308216" d="M1010.26,1481.04c-173.47,157.656 -494.15,27.466 -546.274,-164.243c184.208,-114.732 480.855,-27.255 546.274,164.243Z"
                              style="fill:#606c38;"/>
                        <path id="_6307424" d="M546.338,606.245c-173.616,157.615 -494.217,27.492 -546.338,-164.152c184.207,-114.758 480.868,-27.321 546.338,164.152Z"
                              style="fill:#606c38;"/>
                        <path id="_6311168" d="M655.209,617.22c-157.205,-177.406 -68.64,-542.693 99.182,-617.22c119.545,193.036 67.249,528.1 -99.182,617.22Z"
                              style="fill:#606c38;"/>
                        <path id="_6309440" d="M1188.78,309.346c70.562,226.68 -174.809,475.458 -366.665,447.156c-27.904,-219.389 169.586,-462.904 366.665,-447.156Z"
                              style="fill:#606c38;"/>
                        <path id="_6309512" d="M1337.91,823.657c-179.01,-151.027 -104.525,-496.748 71.557,-579.903c139.415,168.671 102.232,483.239 -71.557,579.903Z"
                              style="fill:#606c38;"/>
                        <path id="_6309560" d="M2047.66,1132.24c25.041,-189.192 297.11,-290.097 432.668,-205.921c-54.747,169.798 -288.826,282.634 -432.668,205.921Z"
                              style="fill:#606c38;"/>
                        <path id="_6309632" d="M2243.97,710.662c-18.453,-237.125 275.503,-422.142 456.025,-349.749c-21.395,220.145 -267.68,411.125 -456.025,349.749Z"
                              style="fill:#606c38;"/>
                        <path id="_6309680" d="M1954.65,951.367c-176.214,-154.606 -95.219,-498.669 82.321,-578.326c136.286,171.296 93.217,485.136 -82.321,578.326Z"
                              style="fill:#606c38;"/>
                        <path id="_6310568" d="M1582.98,1240.51c-176.214,-154.54 -95.298,-498.669 82.347,-578.391c136.233,171.362 93.231,485.307 -82.347,578.391Z"
                              style="fill:#606c38;"/>
                        <path id="_6309872" d="M1730.67,1539.09c25.81,-236.437 348.557,-360.659 512.456,-254.425c-61.681,211.992 -338.906,351.366 -512.456,254.425Z"
                              style="fill:#606c38;"/>
                        <path id="_6310640"
                              d="M557.525,617.989c350.028,153.905 612.594,688.113 773.271,1078.65c243.41,-86.775 76.21,-593.757 -202.832,-865.334c211.807,86.986 381.287,356.735 432.137,583.058c218.223,-295.468 482.922,-496.046 754.077,-661.349c-237.272,191.432 -466.02,452.486 -635.499,713.5c-67.792,104.418 -127.113,252.357 -93.231,382.905c42.434,156.634 254.255,191.392 279.639,348c-84.666,88.697 -262.591,69.582 -432.07,87.014c-144.041,8.735 -381.325,-17.432 -516.91,-52.256c180.694,-212.443 152.259,-780.07 50.161,-1017.02c-96.438,-223.525 -244.098,-440.025 -408.74,-597.163l-0.003,-0.005Z"
                              style="fill:#755941;"/>
</svg>


                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-xl text-green text-bold">
                            gartenliebe.info
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="text-sm text-blue-grey">
                page is in progress | Seite ist in Arbeit
            </div>

        </div>
    </div>
</body>
</html>
