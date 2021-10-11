@props(['title', 'asset_url' => config('app.url') . "/assets/"])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title }} | {{ config('app.name', 'Laravel Starter') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    {{ $before_styles ?? null }}
    <link href="{{ mix('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{ $after_styles ?? null }}
    <livewire:styles>
</head>

<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="page-loader flex-column">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-muted fs-6 fw-bold mt-5">Loading...</span>
    </div>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <x-partials.aside />
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <x-partials.header />
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <x-partials.toolbar :title="$title" />
                    @include('partials.messages')
                    @include('partials.impersonate')
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-fluid">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <x-partials.footer />
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
    <livewire:scripts>

</body>

</html>