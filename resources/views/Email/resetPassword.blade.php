@component('mail::message')
# Introduction

Please click on the below button to reset your password

@component('mail::button', ['url' => 'http://localhost:4200/response-reset-password?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
