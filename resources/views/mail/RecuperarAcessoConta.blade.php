@component('mail::message')
#Olá,
Recebemos uma solicitação para cadastrar uma nova senha associada a este e-mail. Se você fez essa solicitação, por favor, clique no botão abaixo:

Se você não fez esta solicitação, ignore este email e fique tranquilo, pois sua conta em nosso site está protegida.

@component('mail::button', ['url' => route('recuperar.conta')]);
Cadastrar nova senha
@endcomponent

Atenciosamente,
Equipe de atendimento ao cliente.
@endcomponent