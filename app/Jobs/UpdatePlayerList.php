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

class UpdatePlayerList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
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
