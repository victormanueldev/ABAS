<?php

namespace ABAS\Listeners;

use ABAS\Novedad;
use ABAS\User;
use Auth;
use ABAS\Events\NovedadCreada;
use ABAS\Notifications\NovedadPublicada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotificaUsuariosNovedadPublicada
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
     * @param  NovedadCreada  $event
     * @return void
     */
    public function handle(NovedadCreada $event)
    {
        if($event->novedad->area_id != 3){
            $users = User::where('area_id', $event->novedad->area_id)
                        ->where('id','!=', Auth::user()->id)->get();
        }else{
            $users = User::where('id','!=', Auth::user()->id)->get();
        }
        //
        Notification::send($users, new NovedadPublicada($event->novedad));
    }
}
