<x-layouts.classroom aside="on">
    <x-slot name="title">
        Class Room
    </x-slot>
    Welcome, {{ auth()->user()->name }}

    <div class="row mt-5">
        @foreach($courses as $course)
        @if (!$course->topics->count())
        @continue
        @endif

        <div class="col-md-12 col-xl-12 col-lg-12 g-2 col-sm-12 col-xs-12">
            <a href="{{ route('classroom.show', [$course->slug, $course->levels()->first()->title, $course->levels()->first()->topics()->first()]) }}" class="card border-hover-primary">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-9">
                    <!--begin::Card Title-->
                    <div class="card-title m-0">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px w-50px bg-light">
                            <img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                        </div>
                        <!--end::Avatar-->
                    </div>
                    <!--end::Car Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end:: Card header-->
                <!--begin:: Card body-->
                <div class="card-body p-9">
                    <!--begin::Name-->
                    <div class="fs-3 fw-bolder text-dark">{{ $course->title }}</div>
                    <!--end::Name-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap mb-5">
                        <!--begin::Due-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bolder">Feb 21, 2021</div>
                            <div class="fw-bold text-gray-400">Due Date</div>
                        </div>
                        <!--end::Due-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Progress-->
                    <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="" data-bs-original-title="This project 50% completed">
                        <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end::Progress-->
                </div>
                <!--end:: Card body-->
            </a>
            <!--end::Card-->
        </div>
        @endforeach
    </div>
</x-layouts.classroom>