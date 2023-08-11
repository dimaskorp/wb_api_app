<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function sales()
    {
        $response = Http::get('89.108.115.241:6969/api/sales', [
            'dateFrom' => '2023-08-01',
            'dateTo' => '2023-08-10',
            'page' => 1,
            'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
            'limit' => 100,

        ]);
        $sales = $response->json();
        //dd($sales);
        if (array_key_exists('data', $sales)) {
            if (empty($sales['data'])) {
                return 'list is empty.';
            } else
                foreach ($sales['data'] as $index) {
                    Sales::insert([
                        $index
                    ]);
                }


        }
        return 'Sales synced successfully';
    }
}
