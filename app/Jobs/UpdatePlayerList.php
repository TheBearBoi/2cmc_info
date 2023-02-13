<?php

namespace App\Jobs;

use App\Models\Card;
use App\Models\Player;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Job to update the internal player list using a manually imported csv
 *
 * @package App\Jobs
 */
class UpdatePlayerList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Update the player list using the manually imported csv
     *
     * @return void
     */
    public function handle(): void
    {
        $handle = fopen("storage/app/player_list.csv", "r");
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                echo $line[1] . PHP_EOL;
                Player::updateOrCreate(
                    ['player_id' => $line[0]],
                    [
                        'player_name' => $line[1],
                        'pronouns' => $line[2]
                    ]
                );
            }
        }
        fclose($handle);
    }
}
