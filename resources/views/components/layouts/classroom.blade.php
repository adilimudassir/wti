@props(['title', 'asset_url' => config('app.url') . "/assets/", 'aside' => 'off', 'styles' => $styles ?? null, 'scripts' => $scripts ?? null,])
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
    {{ $styles ?? null }}
    <link href="{{ mix('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <livewire:styles>
        <script src="{{ mix('js/app.js') }}"></script>

</head>

<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" data-kt-aside-minimize="{{ $aside }}">
    <div class="page-loader flex-column">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-muted fs-6 fw-bold mt-5">Loading...</span>
    </div>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('partials.aside')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('partials.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @include('partials.toolbar', ['title' => $title])
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-fluid">
                            @include('sweetalert::alert')
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <script>
        var hostUrl = '{{ $asset_url }}';
    </script>
    {{ $before_scripts ?? null }}
    <script src="{{ mix('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ mix('assets/js/scripts.bundle.js') }}"></script>

    {{ $after_scripts ?? null }}
    <livewire:scripts>
        @stack('scripts')

</body>

</html>