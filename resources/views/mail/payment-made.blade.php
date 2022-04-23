@component('mail::message')
# Payment submitted

{{ $user->user->name }} has successfully submitted a payment

@component('mail::button', ['url' => $url])
View Payment Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent