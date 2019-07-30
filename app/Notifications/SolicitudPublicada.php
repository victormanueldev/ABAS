<?php

namespace ABAS\Notifications;

use ABAS\Inspeccion;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class SolicitudPublicada extends Notification
{
    use Queueable;
    protected $inspeccion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Inspeccion $inspeccion)
    {
        //
        $this->inspeccion = $inspeccion;
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
        $cliente = Inspeccion::with([
            'cliente' => function($query){
                $query->select('id','nombre_cliente');
                $query->where('id', $this->inspeccion->cliente_id);
            },
            'sede' => function($query){
                $query->select('id','nombre');
                $query->where('id', $this->inspeccion->sede_id);
            }
        ])
        ->where('id', $this->inspeccion->id)->get();
        return [
            'codigo' => $this->inspeccion->codigo,
            'cliente' => $cliente[0]->cliente->nombre_cliente,
            'sede' => isset($cliente[0]->sede->nombre) ? $cliente[0]->sede->nombre : 'Sede Unica',
        ];

        var_dump(['cliente' => $cliente]);
    }
}
