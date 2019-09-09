@component('mail::message')
# Introduction

- Nom : {{ $msg->name }}
- Email : {{ $msg->email }}
<hr>
<br>
<h2>Message :</h2>
{{ $msg->message }}

@component('mail::button', ['url' => ''])
Button Text

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
