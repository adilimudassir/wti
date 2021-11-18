@extends('students.show')
@section('student', $student)
@section('content')
{{
        html()
            ->modelForm($student, 'PATCH', route('students.update', $student->id))
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
                <x-form.checkbox name="status" :checked="$student->isActive()" labelName="Active" value="Active" />
            </div>
            <div class="form-group col-lg-12">
                <x-form.checkbox name="confirmed" :checked="$student->hasVerifiedEmail()" labelName="Yes" value="True" />
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-form.actions label="Update" :back-route="route('students.show', $student)" />
    </x-slot>
</x-card>
{{ html()->closeModelForm() }}
<script src="https://unpkg.com/vue@next"></script>
<script>
    const Form = {
        data() {
            return {
                account_type: "<?php echo $student->account_type ?? '' ?>",
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
@endsection