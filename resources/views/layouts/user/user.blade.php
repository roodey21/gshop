<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard Arsenik</title>
    <link rel="shortcut icon" href="{{ asset('shop/images/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('shop/images/favicon/favicon.ico') }}" type="image/x-icon">
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <!-- Navbar -->
        @include('layouts.user._includes.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            @stack('header')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    {{ $slot }}
                </div>
            </div>
            @include('layouts.user._includes.footer')
        </div>
    </div>

    <!-- Libs JS -->
    @stack('lib-js')
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('js/demo.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    @stack('js')
</body>

</html>
