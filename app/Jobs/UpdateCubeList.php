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

class UpdateCubeList implements ShouldQueue
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
        $handle = fopen("storage/app/cube_list.csv", "r");
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                echo $line[1] . PHP_EOL;
                echo $line[0] . PHP_EOL;
                echo $line[2] . PHP_EOL;
                echo $line[3] . PHP_EOL;
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
