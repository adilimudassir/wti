@props(['title', 'scripts', 'styles', 'asset_url' => config('app.url') . "/assets/"])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title }} | {{ config('app.name', 'Laravel Starter') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ mix('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{ $scripts ?? null }}
    {{ $styles ?? null }}
    <script src="{{ mix('js/app.js') }}"></script>


</head>

<body id="kt_body" class="">
    <!-- <div class="page-loader flex-column">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-muted fs-6 fw-bold mt-5">Loading...</span>
    </div> -->
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed bg-red" style="background-image: url({{ asset('assets/media/illustrations/sigma-1/14.png') }})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="{{ config('app.url') }}" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo.png')}}" class="h-60px" />
                </a>
                <div class="w-lg-{{ Route::is('register') ? '1000' : '500' }}px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    {{ $slot }}
                </div>
                <div class="d-flex flex-center flex-column-auto p-10">
                    <div class="d-flex align-items-center d-grid row fw-bold fs-6">
                        <p class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                            &copy; Copyright {{ date('Y') }} &nbsp;
                        </p>
                        <p class="fw-bolder text-primary col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">{{ config('app.name') }}</p>
                        <p class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                            All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = '{{ $asset_url }}';
    </script>
    {{ $before_scripts ?? null }}
    <script src="{{ mix('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ mix('assets/js/scripts.bundle.js') }}"></script>
    {{ $after_scripts ?? null }}

</body>

</html>