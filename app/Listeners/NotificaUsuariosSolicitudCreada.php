<?php

namespace ABAS\Listeners;

use ABAS\User;
use ABAS\Inspeccion;
use ABAS\Events\SolicitudCreada;
use ABAS\Notifications\SolicitudPublicada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotificaUsuariosSolicitudCreada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SolicitudCreada  $event
     * @return void
     */
    public function handle(SolicitudCreada $event)
    {
        //
        $users = User::where('area_id', '3')->get();
        Notification::send($users, new SolicitudPublicada($event->inspeccion));
    }
}
