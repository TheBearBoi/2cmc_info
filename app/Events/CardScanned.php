<?php

namespace App\Events;

use App\Models\Card;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Event for when a user has scanned a new card using the NFC reader.
 *
 * @package App\Events
 */
class CardScanned implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $card; // Card model object

    /**
     * Create a new event instance.
     *
     * @param string $oracle_id
     * @return void
     */
    public function __construct(string $oracle_id)
    {
        $this->card = Card::find($oracle_id);//
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

    /**
     * Specify the paramaters to be brodcasted
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return ['oracle_id' => $this->card->oracle_id];
    }
}
