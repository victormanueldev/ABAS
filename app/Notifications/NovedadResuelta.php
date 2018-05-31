<?php

namespace ABAS\Notifications;

use ABAS\Novedad;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NovedadResuelta extends Notification
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
        $novedad = Novedad::where('id', $this->novedad->id)->with('user2')->get();
        return [
            'id' => $this->novedad->id,
            'descripcion' => $this->novedad->descripcion,
            'user2_id' => $this->novedad->user2_id,
            'nombres' => $novedad[0]['user2']['nombres'],
            'apellidos' => $novedad[0]['user2']['apellidos'],
            'foto' => $novedad[0]['user2']['foto']
        ];
    }
}
