<?php

namespace ABAS\Events;

use ABAS\Novedad;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NovedadCreada
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $novedad;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($novedad)
    {
        //
        $this->novedad = $novedad;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

}
