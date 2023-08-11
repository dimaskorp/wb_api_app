<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use Illuminate\Support\Facades\Http;

class IncomesController extends Controller
{
    public function incomes()
    {
        $response = Http::get('89.108.115.241:6969/api/incomes', [
            'dateFrom' => '2023-08-01',
            'dateTo' => '2023-08-10',
            'page' => 1,
            'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
            'limit' => 100,

        ]);

        $incomes = $response->json();
        //dd($incomes);
        if (array_key_exists('data', $incomes)) {
            if (empty($incomes['data'])) {
                return 'list is empty.';
            } else
                foreach ($incomes['data'] as $index) {
                    Incomes::insert([
                        $index
                    ]);
                }
        }

        return 'Incomes synced successfully';
    }
}
