<x-layouts.guest>
    <x-slot name="title">
        Reset Password
    </x-slot>
    <form method="POST" action="{{ route('password.email') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Forgot Password ?</h1>
            <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
        </div>
        <div class="fv-row mb-10">
            <x-form.email name="email" />
        </div>
        <x-form.actions :back-route="route('login')" />
    </form>
</x-layouts.guest>