@component('mail::message')
# Nofication

This is an example email from us.

@component('mail::button', ['url' => ''])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
