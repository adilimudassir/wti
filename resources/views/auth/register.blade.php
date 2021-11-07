<x-layouts.guest>
    <x-slot name="title">
        Register
    </x-slot>
    <form method="POST" action="{{ route('register') }}" class="form w-100" id="kt_sign_up_form">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">
                Create an Account
            </h1>
            <div class="text-gray-400 fw-bold fs-4">
                Already have an account?

                <a href="{{ route('login') }}" class="link-primary fw-bolder">
                    Sign in here
                </a>
            </div>
        </div>
        <div class="fv-row mb-7">
            <x-form.text name="name" />
        </div>
        <div class="fv-row mb-7">
            <x-form.email name="email" />
        </div>
        <div class="mb-7 fv-row">
            <x-form.password name="password" />
        </div>
        <div class="fv-row mb-5">
            <x-form.confirm-password />
        </div>
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <span class="form-check-label fw-bold text-gray-700 fs-6">
                    I Agree & <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                </span>
            </label>
        </div>
        <div class="text-center">
            <x-form.actions hide-back-route />
        </div>
    </form>
</x-layouts.guest>