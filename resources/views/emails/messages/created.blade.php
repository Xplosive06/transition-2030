@component('mail::message')
# Introduction

- {{ $msg->name }}
- {{ $msg->email }}

@component('mail::button', ['url' => ''])
Button Text
    {{ $msg->message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
