@component('mail::message')
# Alteração da senha de acesso

Boa tarde {{ $dataUser->name }}, foi gerado uma senha temporária para possibilitar o seu acesso a plataforma. Você poderá alterar
a sua senha no peril de usuário.

Senha temporária: 123456

Obrigado :)

@component('mail::button', ['url' => 'http://localhost/tracking/public/'])
Ir para o Tracking Celebryts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
