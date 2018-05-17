<?php

namespace ABAS\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'ABAS\Events\NovedadCreada' => [
            'ABAS\Listeners\NotificaUsuariosNovedadPublicada',
        ],
        'ABAS\Events\NovedadActualizada' => [
            'ABAS\Listeners\NotificaUsuariosNovedadActualizada',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
