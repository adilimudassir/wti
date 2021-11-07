<x-layouts.guest>
    <x-slot name="title">
        Confirm Password
    </x-slot>
    <form method="POST" action="{{ route('password.confirm') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Confirm Password</h1>
            <div class="text-gray-400 fw-bold fs-4">Please confirm your password before continuing.</div>
        </div>
        <div class="form-group mb-3">
            <x-form.password name="password" />
        </div>
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <x-form.actions hide-back-route />

            <a href="{{ route('password.request') }}" class="btn btn-lg btn-light-primary fw-bolder">Forgot Your Password</a>
        </div>
    </form>
</x-layouts.guest>