@component('mail::message')
# Restablece tu contraseña en ArtTemoaya

Hola,

Recibiste este correo electrónico porque solicitaste un restablecimiento de contraseña para tu cuenta de ArtTemoaya.

Haz clic en el siguiente botón para restablecer tu contraseña:

@component('mail::button', ['url' => $resetLink])
Restablecer Contraseña
@endcomponent

Si no solicitaste un restablecimiento de contraseña, puedes ignorar este correo electrónico. No se realizará ningún cambio en tu cuenta.

Gracias,
El equipo de ArtTemoaya
@endcomponent
