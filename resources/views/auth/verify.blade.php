<x-layouts.guest>
    <x-slot name="title">
        Verify Email Address
    </x-slot>
    <div class="w-100">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">
                Verify Email
            </h1>
            <div class="text-gray-400 fw-bold fs-4">
                Thanks for signing up, <span class="text-primary fw-bold">{{ auth()->user()->name }}</span>! 
                <br>
                <br>
                Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>
            @if (session('status') === 'verification-link-sent')
            <p class="font-medium text-sm text-primary mt-4">
                A new verification link has been sent to the email address you provided during registration.
            </p>
            @endif
        </div>
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">Resend Verification Email</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-light-primary fw-bolder me-4">Log out</button>
            </form>
        </div>
    </div>
</x-layouts.guest>