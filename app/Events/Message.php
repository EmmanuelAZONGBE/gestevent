<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $first_name;
    public $last_name;
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($first_name, $last_name, $message)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->message = $message;
    }


    public function broadcastOn(): array
    {
        return [
            new Channel('chat'),
        ];
    }

    public function broadcastAs(): array
    {
        return [
             'message',
        ];
    }
}
