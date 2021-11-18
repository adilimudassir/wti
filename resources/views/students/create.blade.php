<x-layouts.app>
    <x-slot name="title">
        Create Student
    </x-slot>
    {{
        html()
            ->form('POST', route('students.store'))
            ->acceptsFiles()
            ->class('form-horizontal')
        ->open() 
    }}
    <x-card>
        <x-slot name="body">
            <div class="row" id="form">
                <div class="form-group col-lg-12">
                    <x-form.file name="avatar" label="Avatar" />
                </div>
                <hr class="my-2">
                <div class="form-group col-lg-12">
                    <x-form.text name="name" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.email name="email" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.text name="phone" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.password name="password" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.confirm-password />
                </div>
                <div class="form form-group col-lg-12">
                    <x-form.select name="account_type" v-model="account_type" :options="$account_types" />
                </div>
                <div class="form form-group col-lg-12" v-if="isCorpsMember">
                    <x-form.select name="state" :options="$states" />
                </div>
                <div class="form form-group col-lg-12" v-if="isCorpsMember">
                    <x-form.text name="state_code" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.checkbox name="status" labelName="Active" :checked="true" value="Active" />
                </div>
                <div class="form-group col-lg-12">
                    <x-form.checkbox name="confirmed" labelName="Yes" :checked="true" value="True" />
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-form.actions :back-route="route('students.index')" label="Submit" />
        </x-slot>
    </x-card>
    {{ html()->form()->close() }}
    <x-slot name="scripts">
        <script src="https://unpkg.com/vue@next"></script>
        <script>
            const Form = {
                data() {
                    return {
                        account_type: "<?php echo old('account_type') ?? 'null' ?>",
                    }
                },
                computed: {
                    isCorpsMember() {
                        return this.account_type == 'CORPS MEMBER'
                    }
                },
            }

            Vue.createApp(Form).mount('#form')
        </script>
    </x-slot>
</x-layouts.app>