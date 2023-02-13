<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Event for when the user has opened or closed the automatic deck building popup
 *
 * @package App\Events
 */
class AutoDeckbuilderStateChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public bool $open;
    public int $seat_number;

    /**
     * Create a new event instance.
     *
     * @param bool $open
     * @param int $seat_number
     * @return void
     */
    public function __construct(bool $open, int $seat_number)
    {
        $this->open = $open;
        $this->seat_number = $seat_number;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel
     */
    public function broadcastOn(): Channel|PrivateChannel
    {
        return new PrivateChannel('scanner');
    }
}
