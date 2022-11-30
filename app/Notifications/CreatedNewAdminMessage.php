<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class CreatedNewAdminMessage extends Notification
{
    use Queueable;
    private $newUserData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newUserData)
    {
        $this->newUserData = $newUserData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Acesso ao ' .config("app.name")))
            ->greeting('Olá, '.$this->newUserData['name'])
            ->line(Lang::get("Segue seus dados de acesso ao sistema:"))
            ->line(new HtmlString(
                "<strong>Usuário: </strong>".$this->newUserData['cpf']
                ."<br>".
                "<strong>Senha Temp: </strong>" .$this->newUserData['password']
                ))
            ->line(Lang::get("Para acessar o sistema utilize o botão abaixo."))
            ->action(Lang::get("Acessar o sistema"), url(config('app.url')));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
