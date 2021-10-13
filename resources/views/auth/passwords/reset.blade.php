<x-layouts.guest>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <form method="POST" action="{{ route('password.update') }}" class="form w-100">
        @csrf
        <input type="hidden" name="token" value="{{ request()->token }}" />
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Setup New Password</h1>
            <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
            </div>
        </div>
        <x-errors />
        <div class="form-group mb-3">
            <x-form.email name="email" />
        </div>
        <div class="mb-7 fv-row">
            <x-form.password name="password" />
        </div>
        <div class="fv-row mb-5">
            <x-form.confirm-password />
        </div>
        <div class="fv-row mb-10">
            <div class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <label class="form-check-label fw-bold text-gray-700 fs-6">I Agree &amp;
                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</label>
            </div>
        </div>
        <x-form.actions :back-route="route('login')" />
    </form>
</x-layouts.guest>