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
class CardsScanned implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $card_uids = []; // strings containing nfc uids.

    /**
     * Create a new event instance.
     *
     * @param string $card_uids_json
     * @return void
     */
    public function __construct(string $card_uids_json)
    {
        $this->card_uids = json_decode($card_uids_json, true);
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
        return ['card_uids' => $this->card_uids];
    }
}
