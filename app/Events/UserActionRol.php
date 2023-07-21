<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActionRol
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $rol;
    public $fecha;
    public $accion;

    public function __construct($user, $rol, $fecha, $accion)
    {
        $this->user = $user;
        $this->rol = $rol;
        $this->fecha = $fecha;
        $this->accion = $accion;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
