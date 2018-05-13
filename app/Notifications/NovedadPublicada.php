<?php

namespace ABAS\Notifications;

use ABAS\Novedad;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NovedadPublicada extends Notification
{
    use Queueable;
    protected $novedad;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Novedad $novedad)
    {
        //
        $this->novedad = $novedad;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $usuario = Novedad::with('user')->where('user_id', $this->novedad->user_id)->limit(1)->get();
        return [
          'id' => $this->novedad->id,
          'descripcion' => $this->novedad->descripcion,
          'user_id' => $this->novedad->user_id,
          'usuario' => $usuario[0]['user']['nombres'],
          'foto' => $usuario[0]['user']['foto']
        ];
        //var_dump($usuario);
    }
}
