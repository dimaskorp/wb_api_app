<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Support\Facades\Http;

class StocksController extends Controller
{
    public function stocks()
    {
        $response = Http::get('89.108.115.241:6969/api/stocks', [
            'dateFrom' => '2023-08-11',
            'dateTo' => '2023-08-11',
            'page' => 1,
            'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
            'limit' => 100,

        ]);

        $stocks = $response->json();
        //dd($stocks);
        if (array_key_exists('dateFrom', $stocks)) {
            return $stocks['dateFrom'][0];
        }
        if (array_key_exists('data', $stocks)) {
            if (empty($stocks['data'])) {
                return 'list is empty.';
            } else
                foreach ($stocks['data'] as $index) {
                    Stocks::create([
                        $index
                    ]);
                }

        }
        return 'Stocks synced successfully';
    }
}
