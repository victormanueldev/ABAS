<?php

namespace ABAS\Listeners;

use ABAS\Novedad;
use ABAS\User;
use ABAS\Events\NovedadActualizada;
use ABAS\Notifications\NovedadResuelta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotificaUsuariosNovedadActualizada
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
     * @param  NovedadActualizada  $event
     * @return void
     */
    public function handle(NovedadActualizada $event)
    {
        //
        $user = User::find($event->novedad->user_id);
        Notification::send($user, new NovedadResuelta($event->novedad));
    }
}
