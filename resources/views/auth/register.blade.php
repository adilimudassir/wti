<x-layouts.guest>
    <x-slot name="title">
        Register
    </x-slot>
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
    </x-slot>
    <form method="POST" action="{{ route('register') }}" class=" w-100" id="kt_sign_up_form">
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
        <div class="row">
            <div class="fv-row mb-5">
                <x-form.text name="name" label="Full Name" />
            </div>
            <div class="fv-row col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                <x-form.email name="email" />
            </div>
            <div class="fv-row col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                <x-form.text name="phone" />
            </div>
            <div class="mb-5 form-group col-lg-12">
                <x-form.select name="account_type" v-model="account_type" :options="$account_types" />
            </div>
            <div class="mb-5 form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12" v-if="isCorpsMember">
                <x-form.select name="state" :options="$states" />
            </div>
            <div class="mb-5 form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12" v-if="isCorpsMember">
                <x-form.text name="state_code" />
            </div>
            <div class="mb-5 fv-row col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12">
                <x-form.password name="password" />
            </div>
            <div class="fv-row mb-5 col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12">
                <x-form.confirm-password />
            </div>
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
            <x-form.actions label="Create" hide-back-route />
        </div>
    </form>
    <script>
        Vue.createApp({
            data() {
                return {
                    account_type: "<?php echo old('account_type') ?? '' ?>",
                }
            },
            computed: {
                isCorpsMember() {
                    return this.account_type == 'CORPS MEMBER'
                }
            },
        }).mount('#kt_sign_up_form')
    </script>
</x-layouts.guest>r