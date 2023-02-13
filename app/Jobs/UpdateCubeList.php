<?php

namespace App\Jobs;

use App\Models\Card;
use App\Models\CubeList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Job to update the internal cube list using a manually imported csv
 *
 * @package App\Jobs
 */
class UpdateCubeList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Update the cube list using the manually imported csv
     *
     * @return void
     */
    public function handle(): void
    {
        $handle = fopen("storage/app/cube_list.csv", "r");
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                echo $line[0] . PHP_EOL;
                CubeList::updateOrCreate(
                    ['sleeve_id' => $line[1]],
                    [
                        'oracle_id' => Card::firstWhere('name', 'like',  $line[0] . '%')->oracle_id,
                        'layout_key_1' => $line[2],
                        'layout_key_2' => $line[3]
                    ]
                );
            }
        }
        fclose($handle);
    }
}
