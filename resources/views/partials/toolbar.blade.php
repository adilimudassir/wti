@props(['title'])

<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            @include('partials.page-title', ['title' => $title])
            <!--end::Title-->
            <!--end::Separator-->
            {{ Breadcrumbs::render() }}

        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>