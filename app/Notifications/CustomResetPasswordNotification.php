<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    protected $token;
    protected $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetUrl = url('/alterar-senha/' . $this->token . '?email=' . urlencode($this->email));

        return (new MailMessage)
            ->view('vendor.mail.reset', [
                'resetUrl' => $resetUrl,
            ])
            ->subject('Redefinição de Senha');
    }

    // Você pode adicionar métodos para outras formas de entrega se necessário
}
