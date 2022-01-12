<x-layouts.guest>
    <x-slot name="title">
        Login
    </x-slot>
    <form class="form w-100" method="POST" action="{{ route('login') }}">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In</h1>
            <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
            </div>
        </div>
        <x-errors />
        @csrf
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>

            <input class="form-control form-control-lg  @error('email') is-invalid @enderror " type="text" name="email" autocomplete="off" id="email" />
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
            </div>
            <input class="form-control form-control-lg " type="password" name="password" autocomplete="off" id="password" />
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} id="flexCheckDefault" />
                    <label class="form-check-label" for="remenber">
                        Remember
                    </label>
                </div>
            </div>
            <br>
            <br>
            <div class="text-center">
                <x-form.actions hide-back-route label="Continue" />
            </div>
        </div>
    </form>
    <x-slot name="after_scripts">
        <script>
            document.querySelector("#email").value = "admin@admin.com"
            document.querySelector("#password").value = "secret"
        </script>
    </x-slot>
</x-layouts.guest>