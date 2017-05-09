@component('mail::message')
# Novo usuário no Tracking Celebryts

Olá {{ $dataUser->name }}, tudo bem?

Parabéns você acaba de ser cadastrado na Tracking Celebryts, os seus dados acesso seguem abaixo:

E-mail: {{ $dataUser->email }}

Senha: Tracking2017$

Importante! 
Você poderá alterar sua senha no perfil do usuário na plataforma.

Att.
Equipe Tracking

@component('mail::button', ['url' => PATH_URL])
Ir para o Tracking Celebryts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
