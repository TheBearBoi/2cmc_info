<?php

namespace App\Jobs;

use App\Models\Card;
use App\Models\CardFace;
use App\Models\CardRuling;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
/**
 * Job to update the internal card database using the scryfall api
 *
 * @package App\Jobs
 */
class UpdateCardDatabases implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Card layouts we want to store
    private array $CardLayouts = [
        "normal",
        "meld",
        "leveler",
        "class",
        "saga",
        "split",
        "flip",
        "transform",
        "modal_dfc",
        "adventure"
    ];

    /**
     * Execute the job.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle(): void
    {
        $client = new Client();

        // Grab information about where to download the bulk data
        $res = $client->request('GET', 'https://api.scryfall.com/bulk-data');

        $result = json_decode($res->getBody());
        $card_download_data = $result->data[0];
        $rulings_download_data = $result->data[4];

        // Download the bulk data
        $card_download_url = $card_download_data->download_uri;
        $rulings_download_url = $rulings_download_data->download_uri;
        $client->request('GET', $card_download_url, ['sink' => 'storage/app/card_database.json']);
        $client->request('GET', $rulings_download_url, ['sink' => 'storage/app/rulings_database.json']);


        // Go through the card json line by line, and store information about the cards
        $handle = fopen("storage/app/card_database.json", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (strlen($line) < 3) {
                    continue;
                }
                preg_match('/{.+}/', $line, $card_json_array);
                $card_json = json_decode($card_json_array[0], true);
                if (!in_array($card_json["layout"], $this->CardLayouts)) {
                    continue;
                }
                echo $card_json["name"] . PHP_EOL;
                Card::updateOrCreate(
                    ['oracle_id' => $card_json["oracle_id"]],
                    [
                        'name' => $card_json["name"],
                        'layout' => $card_json["layout"],
                        'cmc' => $card_json["cmc"],
                        'is_basic' => str_starts_with($card_json["type_line"], "Basic")
                    ]);
                $card_faces = array_map(function ($key, $value) use ($card_json) {
                    return [
                        'oracle_id' => $card_json['oracle_id'],
                        'face_number' => $key,
                        'name' => $value["name"],
                        'mana_cost' => $value["mana_cost"],
                        'type_line' => $value["type_line"],
                        'oracle_text' => $value["oracle_text"],
                        'power' => $value["power"] ?? null,
                        'toughness' => $value["toughness"] ?? null,
                        'small_image_uri' => $value["image_uris"]["small"] ?? $card_json["image_uris"]["small"],
                        'normal_image_uri' => $value["image_uris"]["normal"] ?? $card_json["image_uris"]["normal"],
                        'large_image_uri' => $value["image_uris"]["large"] ?? $card_json["image_uris"]["large"],
                        'png_uri' => $value["image_uris"]["png"] ?? $card_json["image_uris"]["png"],
                        'art_crop_uri' => $value["image_uris"]["art_crop"] ?? $card_json["image_uris"]["art_crop"],
                        'border_crop_uri' => $value["image_uris"]["border_crop"] ?? $card_json["image_uris"]["border_crop"],
                        'color' => isset($value["colors"]) ? join($value["colors"]) : join($card_json["colors"])
                    ];
                },
                    array_keys($card_json["card_faces"] ?? [0]), ($card_json['card_faces'] ?? [$card_json]));


                CardFace::upsert(
                    $card_faces,
                    ['oracle_id', 'face_number'],
                    [
                        'oracle_id',
                        'face_number',
                        'name',
                        'mana_cost',
                        'oracle_text',
                        'power',
                        'toughness',
                        'small_image_uri',
                        'normal_image_uri',
                        'large_image_uri',
                        'png_uri',
                        'art_crop_uri',
                        'border_crop_uri'
                    ]
                );
            }
        }

        fclose($handle);

        // Go through the rulings json line by line, and store all the rulings
        $handle = fopen("storage/app/rulings_database.json", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (strlen($line) < 3) {continue;}
                preg_match('/{.+}/',$line,$ruling_json_array);
                $ruling_json = json_decode($ruling_json_array[0], true);
                echo 'ruling for card ' . $card_json["oracle_id"] . PHP_EOL;
                CardRuling::updateOrCreate(
                    ['oracle_id' => $ruling_json["oracle_id"], 'ruling_text' => $ruling_json["comment"]],
                    ['ruling_date' => $ruling_json["published_at"]]
                );
            }
        }
        fclose($handle);
    }
}
