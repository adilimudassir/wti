@impersonating
<div class="container-fluid">
    <div class="alert alert-warning fs-3 justify-content-center text-center">
        You are currently logged in as <span class="text-info fw-bolder">{{ auth()->user()->name }}</span> <a href="{{ route('impersonate.leave') }}">Return to your account</a>.
    </div>
</div>
<!--alert alert-warning-->
@endImpersonating