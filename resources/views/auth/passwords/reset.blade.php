<x-layouts.guest>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <form method="POST" action="{{ route('password.update') }}" class="form w-100" novalidate="novalidate" id="kt_new_password_form">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Setup New Password</h1>
            <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
            </div>
        </div>
        <div class="form-group mb-3">
            <x-forms.email name="email" />
        </div>
        <div class="mb-7 fv-row">
            <x-forms.password name="password" />
        </div>
        <div class="fv-row mb-5">
            <x-forms.confirm-password />
        </div>
        <div class="fv-row mb-10">
            <div class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <label class="form-check-label fw-bold text-gray-700 fs-6">I Agree &amp;
                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</label>
            </div>
        </div>
        <div class="text-center">
            <button type="button" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</x-layouts.guest>