@component('mail::message')
# Здравствуйте, {{ $contact->username }}!

Спасибо за ваше сообщение. Мы получили вашу заявку и рады сообщить следующее:

{{ $replyMessage }}

Если у вас есть дополнительные вопросы, не стесняйтесь обращаться к нам.

С уважением,<br>
{{ config('app.name') }}
@endcomponent
