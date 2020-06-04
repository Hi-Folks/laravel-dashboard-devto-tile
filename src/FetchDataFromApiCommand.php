<?php

namespace HiFolks\DevtoTile;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class FetchDataFromApiCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-devto-api';

    protected $description = 'Fetch data from DEV.to API for tile';

    public function handle()
    {
        $this->info('Fetching DEVto articles...');

        $endpoint = "https://dev.to/api/articles/me/published";


        $token = config('dashboard.tiles.devto.configurations.default.api_key');
        $response = Http::withHeaders([
            'api-key' => $token,

        ])->get($endpoint);

        $myData = $response->json();
        $sorted=[];
        if ($response->status() === 200) {
            $sorted = array_reverse(Arr::sort($myData, function ($value) {
                return $value['page_views_count'];
            }));
            DevtoStore::make()->setData($sorted);
        }

        $this->info('All done, HTTP status:'. $response->status());
    }
}
