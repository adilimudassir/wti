<x-layouts.guest>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <form method="POST" action="{{ route('password.email') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Forgot Password ?</h1>
            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
        </div>
        <div class="fv-row mb-10">
            <x-forms.email name="email" />
        </div>
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
        </div>
    </form>
</x-layouts.guest>